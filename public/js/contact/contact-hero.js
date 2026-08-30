/* =========================================================
   CERTIFIED — CONTACT HERO
   Cinematic Motion System
   ========================================================= */

document.addEventListener('DOMContentLoaded', () => {

    const hero = document.querySelector('.contact-hero');

    if (!hero) {
        return;
    } 

    const content = hero.querySelector('.contact-hero__content');
    const visual = hero.querySelector('.contact-hero__visual');
    const signal = hero.querySelector('.contact-signal');

    if (!content || !visual || !signal) {
        return;
    }


    /* =====================================================
       HERO ENTRANCE
       ===================================================== */

    content.style.opacity = '0';
    content.style.transform = 'translateY(24px)';

    visual.style.opacity = '0';
    visual.style.transform =
        'translateY(28px) scale(.965)';


    requestAnimationFrame(() => {

        content.style.transition =
            'opacity 850ms cubic-bezier(.16,.84,.32,1), ' +
            'transform 850ms cubic-bezier(.16,.84,.32,1)';

        visual.style.transition =
            'opacity 950ms cubic-bezier(.16,.84,.32,1) 180ms, ' +
            'transform 950ms cubic-bezier(.16,.84,.32,1) 180ms';


        content.style.opacity = '1';
        content.style.transform =
            'translateY(0)';


        visual.style.opacity = '1';
        visual.style.transform =
            'translateY(0) scale(1)';

    });


    /* =====================================================
       MOUSE 3D PARALLAX
       Desktop only
       ===================================================== */

    const canHover =
        window.matchMedia('(hover: hover)').matches;

    if (canHover) {

        let frame = null;

        hero.addEventListener('pointermove', (event) => {

            const rect = signal.getBoundingClientRect();

            const x =
                (event.clientX - rect.left) / rect.width;

            const y =
                (event.clientY - rect.top) / rect.height;


            const rotateY =
                (x - 0.5) * 5;

            const rotateX =
                (0.5 - y) * 5;


            signal.style.setProperty(
                '--signal-mouse-x',
                `${x * 100}%`
            );

            signal.style.setProperty(
                '--signal-mouse-y',
                `${y * 100}%`
            );


            if (frame) {
                cancelAnimationFrame(frame);
            }


            frame = requestAnimationFrame(() => {

                signal.style.transform =
                    `perspective(1200px)
                     rotateX(${rotateX}deg)
                     rotateY(${rotateY}deg)
                     translateZ(0)`;

            });

        });


        hero.addEventListener('pointerleave', () => {

            signal.style.transform =
                'perspective(1200px) rotateX(0deg) rotateY(0deg)';

            signal.style.setProperty(
                '--signal-mouse-x',
                '50%'
            );

            signal.style.setProperty(
                '--signal-mouse-y',
                '50%'
            );

        });

    }


    /* =====================================================
       LIVE DIAGNOSTICS
       ===================================================== */

    const diagnosticRows =
        signal.querySelectorAll('.contact-signal__row');


    if (diagnosticRows.length) {

        let activeIndex = 0;

        const activateDiagnostic = () => {

            diagnosticRows.forEach((row) => {
                row.classList.remove('is-scanning');
            });


            diagnosticRows[activeIndex]
                .classList.add('is-scanning');


            activeIndex =
                (activeIndex + 1) %
                diagnosticRows.length;

        };


        setTimeout(() => {

            activateDiagnostic();

            setInterval(
                activateDiagnostic,
                1700
            );

        }, 1800);

    }

});