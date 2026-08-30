/* =========================================================
   CERTIFIED — CONTACT
   SECTION 02 — COMMUNICATION FLOW
   Interactive Communication Pipeline
   ========================================================= */

(() => {
    'use strict';

    const initCommunicationFlow = () => {

        const section = document.querySelector(
            '[data-communication-flow]'
        );

        if (!section || section.dataset.initialized === 'true') {
            return;
        } 

        section.dataset.initialized = 'true';


        /* =================================================
           SECTION REVEAL
           ================================================= */

        if ('IntersectionObserver' in window) {

            const revealObserver = new IntersectionObserver(
                (entries, observerInstance) => {

                    entries.forEach((entry) => {

                        if (!entry.isIntersecting) {
                            return;
                        }

                        entry.target.classList.add('is-visible');

                        observerInstance.unobserve(entry.target);
                    });

                },
                {
                    threshold: 0.16,
                    rootMargin: '0px 0px -60px 0px'
                }
            );

            revealObserver.observe(section);

        } else {

            section.classList.add('is-visible');
        }


        /* =================================================
           FLOW STEPS
           ================================================= */

        const steps = Array.from(
            section.querySelectorAll('[data-flow-step]')
        );

        if (!steps.length) {
            return;
        }


        let activeIndex = 0;

        const activateStep = (index) => {

            steps.forEach((step, stepIndex) => {

                step.classList.toggle(
                    'is-active',
                    stepIndex === index
                );

            });

            activeIndex = index;
        };


        /* =================================================
           AUTOMATIC FLOW
           ================================================= */

        let flowTimer = null;

        const startFlow = () => {

            if (
                window.matchMedia(
                    '(prefers-reduced-motion: reduce)'
                ).matches
            ) {
                return;
            }

            flowTimer = window.setInterval(() => {

                activeIndex =
                    (activeIndex + 1) % steps.length;

                activateStep(activeIndex);

            }, 2600);
        };


        const stopFlow = () => {

            if (flowTimer !== null) {

                window.clearInterval(flowTimer);

                flowTimer = null;
            }
        };


        /* =================================================
           USER INTERACTION
           ================================================= */

        steps.forEach((step, index) => {

            step.addEventListener(
                'mouseenter',
                () => {

                    stopFlow();

                    activateStep(index);
                },
                { passive: true }
            );


            step.addEventListener(
                'mouseleave',
                () => {

                    stopFlow();
                    startFlow();
                },
                { passive: true }
            );


            step.addEventListener(
                'focusin',
                () => {

                    stopFlow();

                    activateStep(index);
                }
            );


            step.addEventListener(
                'focusout',
                () => {

                    stopFlow();
                    startFlow();
                }
            );

        });


        /* =================================================
           START
           ================================================= */

        activateStep(0);
        startFlow();


        /* =================================================
           VISIBILITY OPTIMIZATION
           ================================================= */

        document.addEventListener(
            'visibilitychange',
            () => {

                if (document.hidden) {
                    stopFlow();
                } else {
                    startFlow();
                }

            }
        );

    };


    /* =====================================================
       DOM READY
       ===================================================== */

    if (document.readyState === 'loading') {

        document.addEventListener(
            'DOMContentLoaded',
            initCommunicationFlow,
            { once: true }
        );

    } else {

        initCommunicationFlow();
    }

})();