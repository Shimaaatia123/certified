
/* =========================================================
   STATS SECTION JAVASCRIPT
   ---------------------------------------------------------
   Purpose:
   Controls all interactive behavior inside the Stats section.

   Responsibilities:
   1. Animated statistics counters.
   2. Scroll-based reveal animation.
   3. Mouse-follow glow effect.

   Isolation:
   All elements are queried from `.stats-section` to prevent
   this script from affecting other sections.
========================================================= */
document.addEventListener("DOMContentLoaded", () => {
    const section = document.querySelector(".stats-section");
    const counters = document.querySelectorAll(".counter");
    const revealItems = document.querySelectorAll(".reveal-up");
    const glow = document.querySelector(".mouse-glow");

    /* ==========================================
                Counter Animation
    ========================================== */

    function animateCounter(counter) {
        const target = Number(counter.dataset.target);
        const suffix = counter.dataset.suffix || "";

        const duration = 2200; 

        let start = null;

        function step(timestamp) {
            if (!start) {
                start = timestamp;
            }

            const progress = Math.min((timestamp - start) / duration, 1);

            const eased = 1 - Math.pow(1 - progress, 3);

            const value = Math.floor(eased * target);

            if (suffix === "K+") {
                counter.textContent =
                    (value / 1000)
                        .toFixed(value >= 10000 ? 0 : 1)
                        .replace(".0", "") + "K+";
            } else {
                counter.textContent = value + suffix;
            }

            if (progress < 1) {
                requestAnimationFrame(step);
            } else {
                if (suffix === "K+") {
                    counter.textContent =
                        (target / 1000)
                            .toFixed(target >= 10000 ? 0 : 1)
                            .replace(".0", "") + "K+";
                } else {
                    counter.textContent = target + suffix;
                }
            }
        }

        requestAnimationFrame(step);
    }

    /* ==========================================
                Observer
    ========================================== */

    const counterObserver = new IntersectionObserver(
        (entries, observer) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) return;

                animateCounter(entry.target);

                observer.unobserve(entry.target);
            });
        },
        {
            threshold: 0.35,
        },
    );

    counters.forEach((counter) => {
        counterObserver.observe(counter);
    });

    /* ==========================================
                Reveal
    ========================================== */

    const revealObserver = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("show");
                }
            });
        },
        {
            threshold: 0.2,
        },
    );

    revealItems.forEach((item) => {
        revealObserver.observe(item);
    });

    /* ==========================================
                Mouse Glow
    ========================================== */
if (section && glow) {
    section.addEventListener("mousemove", (e) => {
        const rect = section.getBoundingClientRect();

        glow.style.left = `${e.clientX - rect.left}px`;
        glow.style.top = `${e.clientY - rect.top}px`;
        glow.style.opacity = "1";
    });

    section.addEventListener("mouseleave", () => {
        glow.style.opacity = "0";
    });
}

   
});
