/* ==========================================================
   CERTIFIED — HOME HERO JAVASCRIPT
   ==========================================================

   RESPONSIBILITY
   --------------
   Handles interactive behavior and animations for the Home
   Hero section.

   FEATURES
   --------
   1. Mouse-based parallax
   2. Floating card movement
   3. Animated statistics counters
   4. IntersectionObserver-based counter activation

   BACKEND
   -------
   No API request.
   No database query.
   No server-side dependency.

   DATA SOURCE
   -----------
   Counter values are defined directly in the Blade markup
   using data attributes:

   data-target
   data-suffix

   SCOPE
   -----
   JavaScript targets only:

   .hero-image-wrapper
   .hero-image
   .floating-card
   .hero-section .hero-counter

   PERFORMANCE
   -----------
   Counter animation uses requestAnimationFrame.
   IntersectionObserver prevents unnecessary counter
   execution before the section becomes visible.

   ========================================================== */

document.addEventListener("DOMContentLoaded", () => {

    /* ==========================================================
       HERO PARALLAX
       ========================================================== */

    const wrapper = document.querySelector(".hero-image-wrapper");

    if (wrapper) {

        const image = wrapper.querySelector(".hero-image");
        const cards = wrapper.querySelectorAll(".floating-card");

        wrapper.addEventListener("mousemove", (e) => {

            const rect = wrapper.getBoundingClientRect();

            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;

            const rotateX = (y / rect.height - 0.5) * -8;
            const rotateY = (x / rect.width - 0.5) * 8;

            image.style.transform = `
                rotateX(${rotateX}deg)
                rotateY(${rotateY}deg)
                translateZ(20px)
            `;

            cards.forEach((card, index) => {

                const depth = (index + 1) * 12;

                card.style.transform = `
                    translateX(${(rotateY * depth) / 8}px)
                    translateY(${(rotateX * depth) / 8}px)
                `;
            });
        });

        wrapper.addEventListener("mouseleave", () => {

            image.style.transform = "";

            cards.forEach((card) => {
                card.style.transform = "";
            });
        });
    }


    /* ==========================================================
       HERO COUNTERS
       ========================================================== */

    const counters = document.querySelectorAll(
        ".hero-section .hero-counter"
    );

    if (!counters.length) return;

    const observer = new IntersectionObserver(
        (entries) => {

            entries.forEach((entry) => {

                if (!entry.isIntersecting) return;

                const counter = entry.target;

                const target = Number(
                    counter.dataset.target
                );

                const suffix =
                    counter.dataset.suffix || "";

                let current = 0;

                const duration = 1800;

                const increment =
                    target / (duration / 16);

                const update = () => {

                    current += increment;

                    if (current < target) {

                        counter.textContent =
                            Math.floor(current) + suffix;

                        requestAnimationFrame(update);

                    } else {

                        counter.textContent =
                            target + suffix;
                    }
                };

                update();

                observer.unobserve(counter);
            });
        },
        {
            threshold: 0.55,
        }
    );

    counters.forEach((counter) => {
        observer.observe(counter);
    });

});