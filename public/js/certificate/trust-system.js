/*=====================================================================
#
#                    CERTIFICATE TRUST SYSTEM
#
#======================================================================*/

(() => {
    "use strict";

    /*
     * ================================================================
     * CERTIFICATE TRUST SYSTEM
     * ================================================================
     *
     * Responsibilities:
     *
     * 1. Verification Panel Mouse Glow
     * 2. Lightweight 3D Card Tilt
     * 3. Ambient Particles / Stars
     * 4. Verify Button Micro Interaction
     * 5. Responsive Safety
     * 6. Reduced Motion Support
     *
     * Important:
     * - Everything is scoped to .cert-trust.
     * - No global CSS manipulation.
     * - No forced section height.
     * - No overflow manipulation.
     * - No IntersectionObserver.
     * - No duplicate global variables.
     * - No layout calculations that create artificial scroll.
     *
     * ================================================================
     */

    /* ================================================================
       CONFIGURATION
       ================================================================ */

    const SELECTORS = Object.freeze({
        section: ".cert-trust",
        card: ".cert-trust__card",
        panel: ".cert-trust__panel",
        panelGlow: ".cert-trust__panel-mouse-glow",
        particle: ".cert-trust__particle",
        star: ".cert-trust__star",
        verifyButton: ".cert-trust__verify-btn",
    });

    const CONFIG = Object.freeze({
        tiltMax: 4,
        tiltPerspective: 1200,
        tiltLift: 4,
        mouseEase: 0.14,
        tiltEase: 0.12,
        desktopBreakpoint: 768,
    });

    const state = {
        initialized: false,
        reducedMotion: false,
        finePointer: false,
        cards: [],
        panels: [],
        buttons: [],
        resizeTimer: null,
    };

    /* ================================================================
       HELPERS
       ================================================================ */

    const clamp = (value, min, max) => {
        return Math.min(Math.max(value, min), max);
    };

    const getMotionPreference = () => {
        return window.matchMedia("(prefers-reduced-motion: reduce)").matches;
    };

    const getFinePointer = () => {
        return window.matchMedia("(hover: hover) and (pointer: fine)").matches;
    };

    /* ================================================================
       CARD 3D TILT
       ================================================================ */

    const initCardTilt = (section) => {
        /*
         * No tilt on:
         * - mobile
         * - touch-only devices
         * - reduced-motion users
         */

        if (
            state.reducedMotion ||
            !state.finePointer ||
            window.innerWidth <= CONFIG.desktopBreakpoint
        ) {
            return;
        }

        const cards = section.querySelectorAll(SELECTORS.card);

        cards.forEach((card) => {
            let targetRotateX = 0;
            let targetRotateY = 0;
            let targetLift = 0;

            let currentRotateX = 0;
            let currentRotateY = 0;
            let currentLift = 0;

            let animationFrame = null;

            /* --------------------------------------------------------
               Animation
               -------------------------------------------------------- */

            const animate = () => {
                currentRotateX +=
                    (targetRotateX - currentRotateX) * CONFIG.tiltEase;

                currentRotateY +=
                    (targetRotateY - currentRotateY) * CONFIG.tiltEase;

                currentLift += (targetLift - currentLift) * CONFIG.tiltEase;

                card.style.transform = `
                    perspective(${CONFIG.tiltPerspective}px)
                    rotateX(${currentRotateX.toFixed(3)}deg)
                    rotateY(${currentRotateY.toFixed(3)}deg)
                    translateY(${currentLift.toFixed(3)}px)
                `;

                const settled =
                    Math.abs(targetRotateX - currentRotateX) < 0.01 &&
                    Math.abs(targetRotateY - currentRotateY) < 0.01 &&
                    Math.abs(targetLift - currentLift) < 0.01;

                if (!settled) {
                    animationFrame = requestAnimationFrame(animate);
                } else {
                    animationFrame = null;
                }
            };

            const startAnimation = () => {
                if (!animationFrame) {
                    animationFrame = requestAnimationFrame(animate);
                }
            };

            /* --------------------------------------------------------
               Pointer Move
               -------------------------------------------------------- */

            const handlePointerMove = (event) => {
                const rect = card.getBoundingClientRect();

                if (!rect.width || !rect.height) {
                    return;
                }

                const normalizedX = clamp(
                    ((event.clientX - rect.left) / rect.width) * 2 - 1,
                    -1,
                    1,
                );

                const normalizedY = clamp(
                    ((event.clientY - rect.top) / rect.height) * 2 - 1,
                    -1,
                    1,
                );

                targetRotateY = normalizedX * CONFIG.tiltMax;

                targetRotateX = normalizedY * -CONFIG.tiltMax;

                targetLift = -CONFIG.tiltLift;

                startAnimation();
            };

            /* --------------------------------------------------------
               Reset
               -------------------------------------------------------- */

            const resetCard = () => {
                targetRotateX = 0;
                targetRotateY = 0;
                targetLift = 0;

                startAnimation();
            };

            /* --------------------------------------------------------
               Events
               -------------------------------------------------------- */

            card.addEventListener("pointermove", handlePointerMove, {
                passive: true,
            });

            card.addEventListener("pointerleave", resetCard, {
                passive: true,
            });

            /* --------------------------------------------------------
               Cleanup
               -------------------------------------------------------- */

            state.cards.push(() => {
                card.removeEventListener("pointermove", handlePointerMove);

                card.removeEventListener("pointerleave", resetCard);

                if (animationFrame) {
                    cancelAnimationFrame(animationFrame);
                }

                card.style.transform = "";
            });
        });
    };

    /* ================================================================
       VERIFICATION PANEL MOUSE GLOW
       ================================================================ */

    const initPanelGlow = (section) => {
        if (
            state.reducedMotion ||
            !state.finePointer ||
            window.innerWidth <= CONFIG.desktopBreakpoint
        ) {
            return;
        }

        const panels = section.querySelectorAll(SELECTORS.panel);

        panels.forEach((panel) => {
            const glow = panel.querySelector(SELECTORS.panelGlow);

            if (!glow) {
                return;
            }

            let targetX = 50;
            let targetY = 50;
            let targetOpacity = 0;

            let currentX = 50;
            let currentY = 50;
            let currentOpacity = 0;

            let animationFrame = null;

            /* --------------------------------------------------------
               Animation
               -------------------------------------------------------- */

            const animate = () => {
                currentX += (targetX - currentX) * CONFIG.mouseEase;

                currentY += (targetY - currentY) * CONFIG.mouseEase;

                currentOpacity +=
                    (targetOpacity - currentOpacity) * CONFIG.mouseEase;

                glow.style.left = `${currentX}%`;

                glow.style.top = `${currentY}%`;

                glow.style.opacity = currentOpacity.toFixed(3);

                const settled =
                    Math.abs(targetX - currentX) < 0.05 &&
                    Math.abs(targetY - currentY) < 0.05 &&
                    Math.abs(targetOpacity - currentOpacity) < 0.01;

                if (!settled) {
                    animationFrame = requestAnimationFrame(animate);
                } else {
                    animationFrame = null;
                }
            };

            const startAnimation = () => {
                if (!animationFrame) {
                    animationFrame = requestAnimationFrame(animate);
                }
            };

            /* --------------------------------------------------------
               Pointer Move
               -------------------------------------------------------- */

            const handlePointerMove = (event) => {
                const rect = panel.getBoundingClientRect();

                if (!rect.width || !rect.height) {
                    return;
                }

                targetX = clamp(
                    ((event.clientX - rect.left) / rect.width) * 100,
                    0,
                    100,
                );

                targetY = clamp(
                    ((event.clientY - rect.top) / rect.height) * 100,
                    0,
                    100,
                );

                targetOpacity = 1;

                startAnimation();
            };

            /* --------------------------------------------------------
               Pointer Leave
               -------------------------------------------------------- */

            const handlePointerLeave = () => {
                targetOpacity = 0;

                startAnimation();
            };

            /* --------------------------------------------------------
               Events
               -------------------------------------------------------- */

            panel.addEventListener("pointermove", handlePointerMove, {
                passive: true,
            });

            panel.addEventListener("pointerleave", handlePointerLeave, {
                passive: true,
            });

            /* --------------------------------------------------------
               Cleanup
               -------------------------------------------------------- */

            state.panels.push(() => {
                panel.removeEventListener("pointermove", handlePointerMove);

                panel.removeEventListener("pointerleave", handlePointerLeave);

                if (animationFrame) {
                    cancelAnimationFrame(animationFrame);
                }

                glow.style.opacity = "";
                glow.style.left = "";
                glow.style.top = "";
            });
        });
    };

    /* ================================================================
       AMBIENT PARTICLES / STARS
       ================================================================ */

    const initAmbientElements = (section) => {
        /*
         * Do not randomize anything if the visitor
         * requested reduced motion.
         */

        if (state.reducedMotion) {
            return;
        }

        /* ------------------------------------------------------------
           Particles
           ------------------------------------------------------------ */

        const particles = section.querySelectorAll(SELECTORS.particle);

        particles.forEach((particle, index) => {
            particle.style.setProperty(
                "--trust-particle-x",
                `${5 + Math.random() * 90}%`,
            );

            particle.style.setProperty(
                "--trust-particle-y",
                `${5 + Math.random() * 90}%`,
            );

            particle.style.setProperty(
                "--trust-particle-size",
                `${1.5 + Math.random() * 2.5}px`,
            );

            particle.style.setProperty(
                "--trust-particle-delay",
                `${-(index * 0.55 + Math.random() * 3)}s`,
            );

            particle.style.setProperty(
                "--trust-particle-duration",
                `${7 + Math.random() * 6}s`,
            );
        });

        /* ------------------------------------------------------------
           Stars
           ------------------------------------------------------------ */

        const stars = section.querySelectorAll(SELECTORS.star);

        stars.forEach((star, index) => {
            star.style.setProperty(
                "--trust-star-x",
                `${4 + Math.random() * 92}%`,
            );

            star.style.setProperty(
                "--trust-star-y",
                `${5 + Math.random() * 88}%`,
            );

            star.style.setProperty(
                "--trust-star-delay",
                `${-(index * 0.3 + Math.random() * 4)}s`,
            );

            star.style.setProperty(
                "--trust-star-duration",
                `${2.5 + Math.random() * 3}s`,
            );
        });
    };

    /* ================================================================
       VERIFY BUTTON MICRO INTERACTION
       ================================================================ */

    const initVerifyButton = (section) => {
        const buttons = section.querySelectorAll(SELECTORS.verifyButton);

        buttons.forEach((button) => {
            const press = () => {
                button.classList.add("is-pressed");
            };

            const release = () => {
                button.classList.remove("is-pressed");
            };

            button.addEventListener("pointerdown", press, {
                passive: true,
            });

            button.addEventListener("pointerup", release, {
                passive: true,
            });

            button.addEventListener("pointerleave", release, {
                passive: true,
            });

            state.buttons.push(() => {
                button.removeEventListener("pointerdown", press);

                button.removeEventListener("pointerup", release);

                button.removeEventListener("pointerleave", release);

                button.classList.remove("is-pressed");
            });
        });
    };

    /* ================================================================
       RESPONSIVE STATE
       ================================================================ */

    const updateState = () => {
        state.reducedMotion = getMotionPreference();

        state.finePointer = getFinePointer();

        const interactive =
            state.finePointer &&
            !state.reducedMotion &&
            window.innerWidth > CONFIG.desktopBreakpoint;

        document.querySelectorAll(SELECTORS.section).forEach((section) => {
            section.classList.toggle("cert-trust--interactive", interactive);

            section.classList.toggle(
                "cert-trust--reduced-motion",
                state.reducedMotion,
            );
        });
    };

    /* ================================================================
       CLEANUP
       ================================================================ */

    const cleanup = () => {
        state.cards.forEach((destroy) => destroy());

        state.panels.forEach((destroy) => destroy());

        state.buttons.forEach((destroy) => destroy());

        state.cards = [];
        state.panels = [];
        state.buttons = [];

        if (state.resizeTimer) {
            clearTimeout(state.resizeTimer);

            state.resizeTimer = null;
        }
    };

    /* ================================================================
       INITIALIZATION
       ================================================================ */

    const init = () => {
        /*
         * Prevent duplicate initialization.
         */

        if (state.initialized) {
            return;
        }

        const sections = document.querySelectorAll(SELECTORS.section);

        /*
         * Safe exit if the section isn't
         * present on the current page.
         */

        if (!sections.length) {
            return;
        }

        state.initialized = true;

        updateState();

        sections.forEach((section) => {
            initAmbientElements(section);

            initCardTilt(section);

            initPanelGlow(section);

            initVerifyButton(section);
        });

        /* ------------------------------------------------------------
           Resize
           ------------------------------------------------------------ */

        window.addEventListener(
            "resize",
            () => {
                clearTimeout(state.resizeTimer);

                state.resizeTimer = setTimeout(() => {
                    const previousMotion = state.reducedMotion;

                    const previousPointer = state.finePointer;

                    updateState();

                    /*
                     * Rebuild only when the
                     * interaction state actually changed.
                     */

                    if (
                        previousMotion !== state.reducedMotion ||
                        previousPointer !== state.finePointer
                    ) {
                        cleanup();

                        state.initialized = false;

                        init();
                    }
                }, 180);
            },
            {
                passive: true,
            },
        );
    };

    /* ================================================================
       DOM READY
       ================================================================ */

    if (document.readyState === "loading") {
        document.addEventListener("DOMContentLoaded", init, {
            once: true,
        });
    } else {
        init();
    }

    /* ================================================================
       BACK / FORWARD CACHE SAFETY
       ================================================================ */

    window.addEventListener("pageshow", () => {
        if (!state.initialized) {
            init();
        }
    });
})();
