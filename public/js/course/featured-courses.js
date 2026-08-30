"use strict";

/* ==========================================================
   FEATURED COURSES
   Static Section - Animations Only
   ========================================================== */

document.addEventListener("DOMContentLoaded", () => {

    const featuredSection = document.querySelector(
        ".featured-courses-section"
    );

    if (!featuredSection) {
        return;
    }


    /* ==========================================================
       MOUSE GLOW
       ========================================================== */

    const mouseGlow = document.createElement("div");

    mouseGlow.className = "mouse-glow";

    featuredSection.appendChild(mouseGlow);


    featuredSection.addEventListener("mousemove", (event) => {

        const rect = featuredSection.getBoundingClientRect();

        mouseGlow.style.left =
            `${event.clientX - rect.left}px`;

        mouseGlow.style.top =
            `${event.clientY - rect.top}px`;

        mouseGlow.style.opacity = "1";

    });


    featuredSection.addEventListener("mouseleave", () => {

        mouseGlow.style.opacity = "0";

    });


    /* ==========================================================
       FLOATING ORBS PARALLAX
       ========================================================== */

    const floatingOrbs =
        featuredSection.querySelectorAll(
            ".floating-orbs span"
        );

    let orbAnimationFrame = null;


    featuredSection.addEventListener("mousemove", (event) => {

        if (window.innerWidth <= 768) {
            return;
        }

        if (orbAnimationFrame) {
            cancelAnimationFrame(orbAnimationFrame);
        }


        orbAnimationFrame = requestAnimationFrame(() => {

            const rect =
                featuredSection.getBoundingClientRect();

            const mouseX =
                event.clientX - rect.left;

            const mouseY =
                event.clientY - rect.top;

            const centerX =
                rect.width / 2;

            const centerY =
                rect.height / 2;

            const offsetX =
                (mouseX - centerX) / 40;

            const offsetY =
                (mouseY - centerY) / 40;


            floatingOrbs.forEach((orb, index) => {

                const depth = index + 1;

                orb.style.transform =
                    `translate(
                        ${offsetX * depth}px,
                        ${offsetY * depth}px
                    )`;

            });

        });

    });


    /* ==========================================================
       CARD REVEAL
       ========================================================== */

    const featuredCards =
        featuredSection.querySelectorAll(
            ".course-card"
        );


    const featuredCardsObserver =
        new IntersectionObserver(
            (entries, observer) => {

                entries.forEach((entry, index) => {

                    if (!entry.isIntersecting) {
                        return;
                    }


                    setTimeout(() => {

                        entry.target.classList.add("show");

                    }, index * 150);


                    observer.unobserve(entry.target);

                });

            },
            {
                threshold: 0.2
            }
        );


    featuredCards.forEach((card) => {

        featuredCardsObserver.observe(card);

    });


    /* ==========================================================
       CARD TILT
       ========================================================== */

    featuredCards.forEach((courseCard) => {

        const cardInner =
            courseCard.querySelector(".card-inner");


        if (!cardInner) {
            return;
        }


        courseCard.addEventListener("mousemove", (event) => {

            if (window.innerWidth <= 768) {
                return;
            }


            const rect =
                cardInner.getBoundingClientRect();


            const x =
                event.clientX - rect.left;

            const y =
                event.clientY - rect.top;


            const rotateY =
                (x / rect.width - 0.5) * 10;

            const rotateX =
                (0.5 - y / rect.height) * 10;


            cardInner.style.transform =
                `perspective(1000px)
                 rotateX(${rotateX}deg)
                 rotateY(${rotateY}deg)
                 translateY(-8px)`;

        });


        courseCard.addEventListener("mouseleave", () => {

            cardInner.style.transform = "";

        });

    });


    /* ==========================================================
       MAGNETIC BUTTONS
       ========================================================== */

    const enrollButtons =
        featuredSection.querySelectorAll(
            ".enroll-btn"
        );


    enrollButtons.forEach((button) => {

        button.addEventListener("mousemove", (event) => {

            if (window.innerWidth <= 768) {
                return;
            }


            const rect =
                button.getBoundingClientRect();


            const x =
                event.clientX - rect.left;

            const y =
                event.clientY - rect.top;


            const moveX =
                (x - rect.width / 2) * 0.18;

            const moveY =
                (y - rect.height / 2) * 0.18;


            button.style.transform =
                `translate(
                    ${moveX}px,
                    ${moveY}px
                ) scale(1.05)`;

        });


        button.addEventListener("mouseleave", () => {

            button.style.transform = "";

        });

    });


    /* ==========================================================
       COUNTER ANIMATION
       ========================================================== */

    const counters =
        featuredSection.querySelectorAll(
            ".counter"
        );


    const counterObserver =
        new IntersectionObserver(
            (entries, observer) => {

                entries.forEach((entry) => {

                    if (!entry.isIntersecting) {
                        return;
                    }


                    const counter =
                        entry.target;

                    const target =
                        Number(counter.dataset.value);

                    const suffix =
                        counter.dataset.suffix || "";


                    if (!Number.isFinite(target)) {
                        return;
                    }


                    let current = 0;

                    const duration = 1200;

                    const startTime = performance.now();


                    function updateCounter(currentTime) {

                        const elapsed =
                            currentTime - startTime;

                        const progress =
                            Math.min(
                                elapsed / duration,
                                1
                            );


                        const easedProgress =
                            1 -
                            Math.pow(
                                1 - progress,
                                3
                            );


                        current =
                            target * easedProgress;


                        counter.textContent =
                            Math.floor(current) + suffix;


                        if (progress < 1) {

                            requestAnimationFrame(
                                updateCounter
                            );

                        } else {

                            counter.textContent =
                                target + suffix;

                        }

                    }


                    requestAnimationFrame(
                        updateCounter
                    );


                    observer.unobserve(counter);

                });

            },
            {
                threshold: 0.2
            }
        );


    counters.forEach((counter) => {

        counterObserver.observe(counter);

    });

});