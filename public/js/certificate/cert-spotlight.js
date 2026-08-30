"use strict";

/* =====================================================================
#
#                    CERTIFICATE SPOTLIGHT JS
#
# ===================================================================== */

document.addEventListener("DOMContentLoaded", () => {

    const spotlight = document.querySelector("#certificate-spotlight");

    /* ================================================================
       SAFETY GUARD
       ================================================================ */

    if (!spotlight) {
        return;
    }


    /* ================================================================
       01. MOUSE GLOW
       ================================================================ */

    const initMouseGlow = () => {

        const mouseGlow = spotlight.querySelector(
            ".cert-spotlight__mouse-glow"
        );

        if (!mouseGlow) {
            return;
        }


        /* ------------------------------------------------------------
           Disable on touch devices
           ------------------------------------------------------------ */

        if (window.matchMedia("(hover: none)").matches) {
            return;
        }


        /* ------------------------------------------------------------
           State
           ------------------------------------------------------------ */

        let mouseX = spotlight.offsetWidth / 2;
        let mouseY = spotlight.offsetHeight / 2;

        let glowX = mouseX;
        let glowY = mouseY;

        let animationFrame = null;


        /* ------------------------------------------------------------
           Animate glow
           ------------------------------------------------------------ */

        const updateGlow = () => {

            glowX += (mouseX - glowX) * 0.14;
            glowY += (mouseY - glowY) * 0.14;


            mouseGlow.style.transform =
                `translate3d(
                    ${glowX - 170}px,
                    ${glowY - 170}px,
                    0
                )`;


            animationFrame = requestAnimationFrame(updateGlow);
        };


        /* ------------------------------------------------------------
           Mouse move
           ------------------------------------------------------------ */

        const handleMouseMove = (event) => {

            const rect = spotlight.getBoundingClientRect();

            mouseX = event.clientX - rect.left;
            mouseY = event.clientY - rect.top;

        };


        /* ------------------------------------------------------------
           Mouse enter
           ------------------------------------------------------------ */

        const handleMouseEnter = () => {

            mouseGlow.classList.add(
                "cert-spotlight__mouse-glow--active"
            );

        };


        /* ------------------------------------------------------------
           Mouse leave
           ------------------------------------------------------------ */

        const handleMouseLeave = () => {

            mouseGlow.classList.remove(
                "cert-spotlight__mouse-glow--active"
            );

            mouseX = spotlight.offsetWidth / 2;
            mouseY = spotlight.offsetHeight / 2;

        };


        /* ------------------------------------------------------------
           Events
           ------------------------------------------------------------ */

        spotlight.addEventListener(
            "mouseenter",
            handleMouseEnter,
            { passive: true }
        );


        spotlight.addEventListener(
            "mousemove",
            handleMouseMove,
            { passive: true }
        );


        spotlight.addEventListener(
            "mouseleave",
            handleMouseLeave,
            { passive: true }
        );


        /* ------------------------------------------------------------
           Start animation
           ------------------------------------------------------------ */

        animationFrame = requestAnimationFrame(updateGlow);


        /* ------------------------------------------------------------
           Cleanup
           ------------------------------------------------------------ */

        window.addEventListener(
            "pagehide",
            () => {

                if (animationFrame !== null) {

                    cancelAnimationFrame(
                        animationFrame
                    );

                    animationFrame = null;
                }

            },
            { once: true }
        );

    };


    /* ================================================================
       02. FLOATING CARDS
       ================================================================ */

    const initFloatingCards = () => {

        const floatingCards = spotlight.querySelectorAll(
            ".cert-spotlight__floating"
        );

        if (!floatingCards.length) {
            return;
        }


        floatingCards.forEach((card) => {

            card.addEventListener(
                "mouseenter",
                () => {

                    card.classList.add(
                        "cert-spotlight__floating--active"
                    );

                }
            );


            card.addEventListener(
                "mouseleave",
                () => {

                    card.classList.remove(
                        "cert-spotlight__floating--active"
                    );

                }
            );

        });

    };


    /* ================================================================
       03. CERTIFICATE HOVER
       ================================================================ */

    const initCertificateHover = () => {

        const certificate = spotlight.querySelector(
            ".cert-spotlight__certificate"
        );

        if (!certificate) {
            return;
        }


        certificate.addEventListener(
            "mouseenter",
            () => {

                certificate.classList.add(
                    "cert-spotlight__certificate--active"
                );

            }
        );


        certificate.addEventListener(
            "mouseleave",
            () => {

                certificate.classList.remove(
                    "cert-spotlight__certificate--active"
                );

            }
        );

    };


    /* ================================================================
       04. SECONDARY BUTTON
       ================================================================ */

    const initSmoothScroll = () => {

        const secondaryButton = spotlight.querySelector(
            ".cert-spotlight__button--secondary"
        );

        if (!secondaryButton) {
            return;
        }


        secondaryButton.addEventListener(
            "click",
            (event) => {

                const targetSelector =
                    secondaryButton.getAttribute("href");


                if (!targetSelector) {
                    return;
                }


                if (!targetSelector.startsWith("#")) {
                    return;
                }


                const target =
                    document.querySelector(targetSelector);


                if (!target) {
                    return;
                }


                event.preventDefault();


                target.scrollIntoView({
                    behavior: "smooth",
                    block: "start"
                });

            }
        );

    };


    /* ================================================================
       05. REDUCED MOTION
       ================================================================ */

    const initReducedMotionSupport = () => {

        const reducedMotion = window.matchMedia(
            "(prefers-reduced-motion: reduce)"
        );


        if (!reducedMotion.matches) {
            return;
        }


        spotlight.classList.add(
            "cert-spotlight--reduced-motion"
        );

    };


    /* ================================================================
       INITIALIZE
       ================================================================ */

    initMouseGlow();

    initFloatingCards();

    initCertificateHover();

    initSmoothScroll();

    initReducedMotionSupport();

});