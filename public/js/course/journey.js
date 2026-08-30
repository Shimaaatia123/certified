"use strict";

document.addEventListener("DOMContentLoaded", () => {
    const section = document.querySelector(".course-journey-section");

    if (!section) return;

    const cards = section.querySelectorAll(".course-journey-card");

    const prefersReducedMotion = window.matchMedia(
        "(prefers-reduced-motion: reduce)",
    ).matches;

    /* ======================================
                Reveal Animation
    ====================================== */

    if (!prefersReducedMotion) {
        const observer = new IntersectionObserver(
            (entries, observer) => {
                entries.forEach((entry) => {
                    if (!entry.isIntersecting) return;

                    entry.target.classList.add("show");

                    observer.unobserve(entry.target);
                });
            },
            {
                threshold: 0.15,

                rootMargin: "0px 0px -60px",
            },
        );

                cards.forEach((card) => {
            observer.observe(card);
        });
    } else {
        cards.forEach((card) => card.classList.add("show"));
    }

    /* ======================================
                Premium Tilt
    ====================================== */

    if (prefersReducedMotion) return;

    cards.forEach((card) => {
        let frame = null;

        card.addEventListener("mousemove", (event) => {
            if (frame) cancelAnimationFrame(frame);

            frame = requestAnimationFrame(() => {
                const rect = card.getBoundingClientRect();

                const x = event.clientX - rect.left;

                const y = event.clientY - rect.top;

                const rotateY = (x / rect.width - 0.5) * 10;

                const rotateX = ((rect.height / 2 - y) / rect.height) * 10;

                card.style.transform = `perspective(900px)
                     rotateX(${rotateX}deg)
                     rotateY(${rotateY}deg)
                     translateY(-12px)`;
            });
        });

        card.addEventListener("mouseleave", () => {
            card.style.transform = "";
        });
    });
});

