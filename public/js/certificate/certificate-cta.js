/*=====================================================================
#
#                    CERTIFICATE CTA
#
#======================================================================*/

(() => {
    "use strict";

    /* ================================================================
       SELECTORS
    ================================================================ */

    const SELECTORS = Object.freeze({
        section: ".cert-cta",

        card: ".cert-cta__card",

        certificate: ".cert-cta__certificate",

        primaryButton: ".cert-cta__button--primary",

        secondaryButton: ".cert-cta__button--secondary",
    });

    /* ================================================================
       CONFIG
    ================================================================ */

    const CONFIG = Object.freeze({
        maxRotate: 3.5,

        perspective: 1100,

        ease: 0.12,

        desktopBreakpoint: 992,
    });

    /* ================================================================
       STATE
    ================================================================ */

    const state = {
        initialized: false,

        reducedMotion: false,

        finePointer: false,

        cleanup: [],

        resizeTimer: null,
    };

    /* ================================================================
       HELPERS
    ================================================================ */

    const clamp = (value, min, max) => {
        return Math.min(Math.max(value, min), max);
    };

    const getReducedMotion = () => {
        return window.matchMedia("(prefers-reduced-motion: reduce)").matches;
    };

    const getFinePointer = () => {
        return window.matchMedia("(hover: hover) and (pointer: fine)").matches;
    };

    /* ================================================================
       CERTIFICATE 3D EFFECT
    ================================================================ */

    const initCertificateTilt = (section) => {
        if (
            state.reducedMotion ||
            !state.finePointer ||
            window.innerWidth <= CONFIG.desktopBreakpoint
        ) {
            return;
        }

        const card = section.querySelector(SELECTORS.card);

        const certificate = section.querySelector(SELECTORS.certificate);

        if (!card || !certificate) {
            return;
        }

        let targetX = 0;
        let targetY = 0;

        let currentX = 0;
        let currentY = 0;

        let raf = null;

        /* ------------------------------------------------------------
           Animation
        ------------------------------------------------------------ */

        const animate = () => {
            currentX += (targetX - currentX) * CONFIG.ease;

            currentY += (targetY - currentY) * CONFIG.ease;

            certificate.style.transform = `
                perspective(${CONFIG.perspective}px)
                rotateX(${currentX.toFixed(3)}deg)
                rotateY(${currentY.toFixed(3)}deg)
            `;

            const settled =
                Math.abs(targetX - currentX) < 0.01 &&
                Math.abs(targetY - currentY) < 0.01;

            if (!settled) {
                raf = requestAnimationFrame(animate);
            } else {
                raf = null;
            }
        };

        const startAnimation = () => {
            if (!raf) {
                raf = requestAnimationFrame(animate);
            }
        };

        /* ------------------------------------------------------------
           Pointer Move
        ------------------------------------------------------------ */

        const handlePointerMove = (event) => {
            const rect = card.getBoundingClientRect();

            if (!rect.width || !rect.height) {
                return;
            }

            const x = clamp(
                ((event.clientX - rect.left) / rect.width) * 2 - 1,
                -1,
                1,
            );

            const y = clamp(
                ((event.clientY - rect.top) / rect.height) * 2 - 1,
                -1,
                1,
            );

            targetY = x * CONFIG.maxRotate;

            targetX = y * -CONFIG.maxRotate;

            startAnimation();
        };

        /* ------------------------------------------------------------
           Reset
        ------------------------------------------------------------ */

        const reset = () => {
            targetX = 0;
            targetY = 0;

            startAnimation();
        };

        /* ------------------------------------------------------------
           Events
        ------------------------------------------------------------ */

        card.addEventListener("pointermove", handlePointerMove, {
            passive: true,
        });

        card.addEventListener("pointerleave", reset, {
            passive: true,
        });

        /* ------------------------------------------------------------
           Cleanup
        ------------------------------------------------------------ */

        state.cleanup.push(() => {
            card.removeEventListener("pointermove", handlePointerMove);

            card.removeEventListener("pointerleave", reset);

            if (raf) {
                cancelAnimationFrame(raf);
            }

            certificate.style.transform = "";
        });
    };

    /* ================================================================
       BUTTON MICRO INTERACTION
    ================================================================ */

    const initButtons = (section) => {
        const buttons = section.querySelectorAll(".cert-cta__button");

        buttons.forEach((button) => {
            const handleDown = () => {
                button.classList.add("is-pressed");
            };

            const handleUp = () => {
                button.classList.remove("is-pressed");
            };

            button.addEventListener("pointerdown", handleDown, {
                passive: true,
            });

            button.addEventListener("pointerup", handleUp, {
                passive: true,
            });

            button.addEventListener("pointerleave", handleUp, {
                passive: true,
            });

            state.cleanup.push(() => {
                button.removeEventListener("pointerdown", handleDown);

                button.removeEventListener("pointerup", handleUp);

                button.removeEventListener("pointerleave", handleUp);

                button.classList.remove("is-pressed");
            });
        });
    };


    /* ================================================================
   MOUSE GLOW
================================================================ */

const initMouseGlow = (section) => {

    if (
        state.reducedMotion ||
        !state.finePointer ||
        window.innerWidth <= CONFIG.desktopBreakpoint
    ) {
        return;
    }


    const glow =
        section.querySelector(
            ".cert-cta__mouse-glow"
        );


    if (!glow) {
        return;
    }


    let targetX = 50;
    let targetY = 50;

    let currentX = 50;
    let currentY = 50;

    let targetOpacity = 0;
    let currentOpacity = 0;

    let raf = null;


    const animate = () => {

        currentX +=
            (targetX - currentX) * 0.1;

        currentY +=
            (targetY - currentY) * 0.1;

        currentOpacity +=
            (targetOpacity - currentOpacity) * 0.1;


        glow.style.left =
            `${currentX}%`;

        glow.style.top =
            `${currentY}%`;

        glow.style.opacity =
            currentOpacity.toFixed(3);


        if (
            Math.abs(targetX - currentX) > 0.05 ||
            Math.abs(targetY - currentY) > 0.05 ||
            Math.abs(
                targetOpacity - currentOpacity
            ) > 0.01
        ) {

            raf =
                requestAnimationFrame(
                    animate
                );

        } else {

            raf = null;
        }
    };


    const startAnimation = () => {

        if (!raf) {

            raf =
                requestAnimationFrame(
                    animate
                );
        }
    };


    const handlePointerMove = (event) => {

        const rect =
            section.getBoundingClientRect();


        if (
            !rect.width ||
            !rect.height
        ) {
            return;
        }


        targetX =
            (
                (event.clientX - rect.left) /
                rect.width
            ) * 100;


        targetY =
            (
                (event.clientY - rect.top) /
                rect.height
            ) * 100;


        targetX =
            clamp(
                targetX,
                0,
                100
            );


        targetY =
            clamp(
                targetY,
                0,
                100
            );


        targetOpacity = 1;

        startAnimation();
    };


    const handlePointerLeave = () => {

        targetOpacity = 0;

        startAnimation();
    };


    section.addEventListener(
        "pointermove",
        handlePointerMove,
        {
            passive: true
        }
    );


    section.addEventListener(
        "pointerleave",
        handlePointerLeave,
        {
            passive: true
        }
    );


    state.cleanup.push(() => {

        section.removeEventListener(
            "pointermove",
            handlePointerMove
        );


        section.removeEventListener(
            "pointerleave",
            handlePointerLeave
        );


        if (raf) {

            cancelAnimationFrame(raf);
        }


        glow.style.left = "";
        glow.style.top = "";
        glow.style.opacity = "";
    });
};
    /* ================================================================
       INITIALIZATION
    ================================================================ */

    const init = () => {
        if (state.initialized) {
            return;
        }

        const sections = document.querySelectorAll(SELECTORS.section);

        if (!sections.length) {
            return;
        }

        state.reducedMotion = getReducedMotion();

        state.finePointer = getFinePointer();

        state.initialized = true;

        sections.forEach((section) => {
            initCertificateTilt(section);

            initButtons(section);
        });

        /* ------------------------------------------------------------
           Resize
        ------------------------------------------------------------ */

        const handleResize = () => {
            clearTimeout(state.resizeTimer);

            state.resizeTimer = setTimeout(() => {
                const previousPointer = state.finePointer;

                const previousMotion = state.reducedMotion;

                state.finePointer = getFinePointer();

                state.reducedMotion = getReducedMotion();

                if (
                    previousPointer !== state.finePointer ||
                    previousMotion !== state.reducedMotion
                ) {
                    cleanup();

                    state.initialized = false;

                    init();
                }
            }, 180);
        };

        window.addEventListener("resize", handleResize, {
            passive: true,
        });

        state.cleanup.push(() => {
            window.removeEventListener("resize", handleResize);
        });
    };

    /* ================================================================
       CLEANUP
    ================================================================ */

    const cleanup = () => {
        state.cleanup.forEach((destroy) => destroy());

        state.cleanup = [];

        if (state.resizeTimer) {
            clearTimeout(state.resizeTimer);

            state.resizeTimer = null;
        }
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
       BF CACHE SAFETY
    ================================================================ */

    window.addEventListener("pageshow", () => {
        if (!state.initialized) {
            init();
        }
    });
})();
