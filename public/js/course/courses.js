"use strict";

/* ==========================================================
                    COURSES SECTION
========================================================== */

document.addEventListener("DOMContentLoaded", () => {
    console.log("Courses Section Initialized");

    const coursesSection = document.querySelector(".courses-section");

    if (!coursesSection) return;

    /* ==========================================================
                    SECTION DIVIDER
    ========================================================== */

    const divider = coursesSection.querySelector(".section-divider");

    if (divider) {
        const dividerObserver = new IntersectionObserver(
            (entries, observer) => {
                entries.forEach((entry) => {
                    if (!entry.isIntersecting) return;

                    entry.target.classList.add("show");

                    observer.unobserve(entry.target);
                });
            },
            {
                threshold: 0.35,
            },
        );

        dividerObserver.observe(divider);
    }

    /* ==========================================================
                FILTER BUTTONS
========================================================== */

    const filterButtons = coursesSection.querySelectorAll(".filter-btn");
    const coursesGrid = coursesSection.querySelector("#coursesGrid");

    filterButtons.forEach((button) => {
        button.addEventListener("click", async () => {
            filterButtons.forEach((btn) => {
                btn.classList.remove("active");
            });

            button.classList.add("active");

            const filter = button.dataset.filter;

            try {
                const response = await fetch(
                    `/api/courses/all?filter=${encodeURIComponent(filter)}`,
                );

                if (!response.ok) {
                    throw new Error("Filter request failed");
                }

                const result = await response.json();

                const courses = result["data🌍"] || [];

                console.log("Filter:", filter);
                console.log("Courses:", courses);

                /* ==========================================================
                SHOW FILTERED COURSES
========================================================== */

                const resultIds = courses.map((course) =>
                    String(course["Identity💎"]),
                );

                const courseCards =
                    coursesGrid.querySelectorAll(".course-card");

                courseCards.forEach((card) => {
                    const courseId = String(card.dataset.courseId);

                    const wrapper = card.closest(".col-lg-4, .col-md-6");

                    if (!wrapper) return;

                    if (resultIds.includes(courseId)) {
                        wrapper.style.display = "";
                    } else {
                        wrapper.style.display = "none";
                    }
                });
            } catch (error) {
                console.error("Course Filter Error:", error);
            }
        });
    });

    /* ==========================================================
                    CARD TILT EFFECT
    ========================================================== */

    if (window.matchMedia("(hover: hover)").matches) {
        const courseCards = coursesSection.querySelectorAll(".course-card");

        courseCards.forEach((card) => {
            card.addEventListener(
                "mousemove",
                (event) => {
                    if (window.innerWidth <= 768) return;

                    const rect = card.getBoundingClientRect();

                    const x = event.clientX - rect.left;
                    const y = event.clientY - rect.top;

                    const rotateY = (x / rect.width - 0.5) * 10;
                    const rotateX = (0.5 - y / rect.height) * 10;

                    card.style.transform = `
                        perspective(1200px)
                        rotateX(${rotateX}deg)
                        rotateY(${rotateY}deg)
                        translateY(-10px)
                    `;
                },
                { passive: true },
            );

            card.addEventListener("mouseleave", () => {
                card.style.transform = "";
            });
        });
    }
});

const courseCards = document.querySelectorAll(".course-card");

const courseObserver = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting) return;

            entry.target.classList.add("show");

            courseObserver.unobserve(entry.target);
        });
    },
    {
        threshold: 0,
        rootMargin: "0px 0px -150px 0px",
    },
);

courseCards.forEach((card) => {
    courseObserver.observe(card);
});
