/* ==========================================================================
   ABOUT HERO
   Certified — About Page
   Scoped exclusively to #about-hero
   ========================================================================== */

(() => {
    'use strict';

    const aboutHero = document.getElementById('about-hero');

    if (!aboutHero) {
        return;
    }

    const reduceMotion = window.matchMedia(
        '(prefers-reduced-motion: reduce)'
    ).matches;

    const isTouchDevice =
        window.matchMedia('(pointer: coarse)').matches;

    /*
    |--------------------------------------------------------------------------
    | Mouse Parallax
    |--------------------------------------------------------------------------
    */

    if (!reduceMotion && !isTouchDevice) {

        let frameRequested = false;

        const updateAboutHeroParallax = (event) => {

            if (frameRequested) {
                return;
            }

            frameRequested = true;

            window.requestAnimationFrame(() => {

                const rect = aboutHero.getBoundingClientRect();

                const x =
                    (event.clientX - rect.left) /
                    rect.width -
                    0.5;

                const y =
                    (event.clientY - rect.top) /
                    rect.height -
                    0.5;

                const stars = aboutHero.querySelectorAll(
                    '.about-hero__star'
                );

                const visual = aboutHero.querySelector(
                    '.about-hero__visual'
                );

                const ambientGlow = aboutHero.querySelector(
                    '.about-hero__ambient-glow'
                );

                /*
                |--------------------------------------------------------------------------
                | Visual movement
                |--------------------------------------------------------------------------
                */

                if (visual) {

                    visual.style.transform = `
                        translate3d(
                            ${x * 10}px,
                            ${y * 7}px,
                            0
                        )
                    `;

                }

                /*
                |--------------------------------------------------------------------------
                | Stars movement
                |--------------------------------------------------------------------------
                */

                stars.forEach((star, index) => {

                    const depth = (index + 1) * 1.8;

                    star.style.marginLeft =
                        `${x * depth}px`;

                    star.style.marginTop =
                        `${y * depth}px`;

                });

                /*
                |--------------------------------------------------------------------------
                | Ambient glow follows cursor
                |--------------------------------------------------------------------------
                */

                if (ambientGlow) {

                    ambientGlow.style.transform = `
                        translate(
                            ${x * 45}px,
                            calc(-50% + ${y * 35}px)
                        )
                    `;

                }

                frameRequested = false;

            });

        };

        aboutHero.addEventListener(
            'pointermove',
            updateAboutHeroParallax,
            { passive: true }
        );

        /*
        |--------------------------------------------------------------------------
        | Reset when pointer leaves
        |--------------------------------------------------------------------------
        */

        aboutHero.addEventListener(
            'pointerleave',
            () => {

                const visual = aboutHero.querySelector(
                    '.about-hero__visual'
                );

                const ambientGlow = aboutHero.querySelector(
                    '.about-hero__ambient-glow'
                );

                if (visual) {

                    visual.style.transform =
                        'translate3d(0, 0, 0)';

                }

                if (ambientGlow) {

                    ambientGlow.style.transform =
                        'translateY(-50%)';

                }

            },
            { passive: true }
        );

    }


    /*
    |--------------------------------------------------------------------------
    | Smooth Scroll
    |--------------------------------------------------------------------------
    */

    const internalLinks = aboutHero.querySelectorAll(
        'a[href^="#"]'
    );

    internalLinks.forEach((link) => {

        link.addEventListener('click', (event) => {

            const targetId =
                link.getAttribute('href');

            if (!targetId || targetId === '#') {
                return;
            }

            const target =
                document.querySelector(targetId);

            if (!target) {
                return;
            }

            event.preventDefault();

            target.scrollIntoView({
                behavior: reduceMotion
                    ? 'auto'
                    : 'smooth',
                block: 'start'
            });

        });

    });

})();