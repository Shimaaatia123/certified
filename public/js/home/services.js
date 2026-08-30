/* ==========================================================
                    SERVICES — SCROLL REVEAL
========================================================== */

document.addEventListener("DOMContentLoaded", () => {

    const servicesSection = document.querySelector(".services-section");

    if (!servicesSection) return;

    const cards = servicesSection.querySelectorAll(
        ".services-reveal-card"
    );

    if (!cards.length) return;

    const observer = new IntersectionObserver((entries) => {

        entries.forEach((entry) => {

            if (entry.isIntersecting) {

                entry.target.classList.add("active");

                observer.unobserve(entry.target);
            }

        });

    }, {
        threshold: 0.1
    });

    cards.forEach((card, index) => {

        card.style.transitionDelay = `${index * 150}ms`;

        observer.observe(card);

    });

});