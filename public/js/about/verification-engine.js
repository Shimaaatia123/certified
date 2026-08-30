/* =========================================================
   CERTIFIED — VERIFICATION ENGINE
   About Page / Section 3
   ========================================================= */

(() => {
    "use strict";


    /* =====================================================
       CONFIG
       ===================================================== */

    const CONFIG = {
        selector: ".verification-engine",
        stepDuration: 1500,
        pauseDuration: 1800
    }; 


    /* =====================================================
       INIT
       ===================================================== */

    const initVerificationEngine = () => {

        const section = document.querySelector(
            CONFIG.selector
        );

        if (!section) {
            return;
        }


        /* -----------------------------------------------
           Reduced motion
           ----------------------------------------------- */

        const reducedMotion = window.matchMedia(
            "(prefers-reduced-motion: reduce)"
        ).matches;

        if (reducedMotion) {
            return;
        }


        /* -----------------------------------------------
           Steps
           ----------------------------------------------- */

        const steps = section.querySelectorAll(
            ".verification-engine__step"
        );

        if (!steps.length) {
            return;
        }


        /* -----------------------------------------------
           Prevent duplicate initialization
           ----------------------------------------------- */

        if (
            section.dataset.verificationReady === "true"
        ) {
            return;
        }

        section.dataset.verificationReady = "true";


        /* -----------------------------------------------
           Step animation
           ----------------------------------------------- */

        let currentStep = 0;

        const activateStep = (index) => {

            steps.forEach((step, stepIndex) => {

                step.classList.toggle(
                    "is-active",
                    stepIndex === index ||
                    stepIndex < index
                );

            });
        };


        const runPipeline = () => {

            activateStep(currentStep);

            currentStep =
                (currentStep + 1) % steps.length;

            window.setTimeout(
                runPipeline,
                CONFIG.stepDuration +
                CONFIG.pauseDuration
            );
        };


        /* -----------------------------------------------
           Start
           ----------------------------------------------- */

        window.setTimeout(
            runPipeline,
            CONFIG.pauseDuration
        );


        /* -----------------------------------------------
           Certificate pointer interaction
           ----------------------------------------------- */

        const certificate =
            section.querySelector(
                ".verification-engine__certificate"
            );

        if (certificate) {

            certificate.addEventListener(
                "pointermove",
                (event) => {

                    if (
                        event.pointerType === "touch"
                    ) {
                        return;
                    }

                    const rect =
                        certificate.getBoundingClientRect();

                    const x =
                        event.clientX - rect.left;

                    const y =
                        event.clientY - rect.top;

                    const centerX =
                        rect.width / 2;

                    const centerY =
                        rect.height / 2;

                    const rotateX =
                        ((y - centerY) / centerY) * -1.2;

                    const rotateY =
                        ((x - centerX) / centerX) * 1.2;

                    certificate.style.transform =
                        `
                        perspective(1200px)
                        rotateX(${rotateX}deg)
                        rotateY(${rotateY}deg)
                        translateY(-3px)
                        `;
                }
            );


            certificate.addEventListener(
                "pointerleave",
                () => {
                    certificate.style.transform = "";
                }
            );
        }
    };


    /* =====================================================
       DOM READY
       ===================================================== */

    if (
        document.readyState === "loading"
    ) {

        document.addEventListener(
            "DOMContentLoaded",
            initVerificationEngine,
            {
                once: true
            }
        );

    } else {

        initVerificationEngine();

    }

})();