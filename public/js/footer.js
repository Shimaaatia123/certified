/* ==========================================================
                        FOOTER
========================================================== */

document.addEventListener("DOMContentLoaded", () => {

    const footer = document.querySelector(".footer");

    if (!footer) return;


    /* ======================================================
                        SCROLL REVEAL
    ====================================================== */

    const reveals = footer.querySelectorAll(".reveal-up");

    if (reveals.length) {

        const revealObserver = new IntersectionObserver(
            (entries) => {

                entries.forEach((entry) => {

                    if (!entry.isIntersecting) return;

                    entry.target.classList.add("active");

                    revealObserver.unobserve(entry.target);

                });

            },
            {
                threshold: 0.15,
            }
        );


        reveals.forEach((item, index) => {

            item.style.transitionDelay =
                `${index * 120}ms`;

            revealObserver.observe(item);

        });

    }


    /* ======================================================
                        MOBILE ACCORDION
    ====================================================== */

    const accordionColumns =
        footer.querySelectorAll(".footer-accordion");


    if (!accordionColumns.length) return;


    const isMobile = () =>
        window.innerWidth <= 768;


    accordionColumns.forEach((column) => {

        const toggle =
            column.querySelector(".footer-toggle");

        if (!toggle) return;


        toggle.addEventListener("click", () => {

            /*
             * Accordion is active only on mobile.
             */

            if (!isMobile()) return;


            const isActive =
                column.classList.contains("active");


            /* ===============================
                Close all other columns
            =============================== */

            accordionColumns.forEach((otherColumn) => {

                if (otherColumn === column) return;

                otherColumn.classList.remove("active");

                const otherToggle =
                    otherColumn.querySelector(".footer-toggle");

                if (otherToggle) {

                    otherToggle.setAttribute(
                        "aria-expanded",
                        "false"
                    );

                }

            });


            /* ===============================
                Toggle current column
            =============================== */

            if (isActive) {

                column.classList.remove("active");

                toggle.setAttribute(
                    "aria-expanded",
                    "false"
                );

            } else {

                column.classList.add("active");

                toggle.setAttribute(
                    "aria-expanded",
                    "true"
                );

            }

        });

    });


    /* ======================================================
                    RESET ACCORDION ON RESIZE
    ====================================================== */

    window.addEventListener("resize", () => {

        if (window.innerWidth > 768) {

            accordionColumns.forEach((column) => {

                column.classList.remove("active");

                const toggle =
                    column.querySelector(".footer-toggle");

                if (toggle) {

                    toggle.setAttribute(
                        "aria-expanded",
                        "false"
                    );

                }

            });

        }

    });

});