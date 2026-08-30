/* ==========================================================
   CTA SECTION
   Reveal + 3D Tilt + Magnetic Movement + Mouse Glow
========================================================== */

document.addEventListener("DOMContentLoaded", () => {

    const ctaSection = document.querySelector(".cta-section");

    if (!ctaSection) {
        return;
    }


    /* ======================================================
       ELEMENTS
    ====================================================== */

    const ctaContent = ctaSection.querySelector(".cta-content");
    const ctaGlow = ctaSection.querySelector(".cta-glow");

    if (!ctaContent) {
        return;
    }


    /* ======================================================
       REVEAL ANIMATION
    ====================================================== */

    const revealObserver = new IntersectionObserver(
        (entries, observer) => {

            entries.forEach((entry) => {

                if (!entry.isIntersecting) {
                    return;
                }

                entry.target.classList.add("active");

                observer.unobserve(entry.target);
            });

        },
        {
            threshold: 0.25,
        }
    );

    const revealElement = ctaSection.querySelector(".reveal-cta");

    if (revealElement) {
        revealObserver.observe(revealElement);
    }


    /* ======================================================
       INTERACTION SETTINGS
    ====================================================== */

    const strength = 25;
    const tiltStrength = 8;

    let animationFrame = null;


    /* ======================================================
       MOUSE MOVE
       Magnetic + 3D Tilt + Glow
    ====================================================== */

    ctaContent.addEventListener("mousemove", (event) => {

        if (animationFrame) {
            cancelAnimationFrame(animationFrame);
        }

        animationFrame = requestAnimationFrame(() => {

            const rect = ctaContent.getBoundingClientRect();

            const x = event.clientX - rect.left;
            const y = event.clientY - rect.top;

            const centerX = rect.width / 2;
            const centerY = rect.height / 2;


            /* ==============================================
               MAGNETIC MOVEMENT
            ============================================== */

            const moveX = (x - centerX) / strength;
            const moveY = (y - centerY) / strength;


            /* ==============================================
               3D TILT
            ============================================== */

            const rotateX =
                ((y - centerY) / centerY) * -tiltStrength;

            const rotateY =
                ((x - centerX) / centerX) * tiltStrength;


            ctaContent.style.transform = `
                perspective(1200px)
                translate3d(
                    ${moveX}px,
                    ${moveY}px,
                    0
                )
                rotateX(${rotateX}deg)
                rotateY(${rotateY}deg)
                scale(1.03)
            `;


            /* ==============================================
               MOUSE GLOW
            ============================================== */

            if (ctaGlow) {

                ctaGlow.style.left = `${x}px`;
                ctaGlow.style.top = `${y}px`;

            }

        });

    });


    /* ======================================================
       MOUSE LEAVE
       Smooth Reset
    ====================================================== */

    ctaContent.addEventListener("mouseleave", () => {

        if (animationFrame) {
            cancelAnimationFrame(animationFrame);

            animationFrame = null;
        }

        ctaContent.style.transform = `
            perspective(1200px)
            translate3d(0, 0, 0)
            rotateX(0deg)
            rotateY(0deg)
            scale(1)
        `;

    });


    /* ======================================================
       CLEANUP
    ====================================================== */

    window.addEventListener("beforeunload", () => {

        revealObserver.disconnect();

        if (animationFrame) {
            cancelAnimationFrame(animationFrame);
        }

    });

});