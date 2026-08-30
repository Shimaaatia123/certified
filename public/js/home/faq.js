/* ==========================================================
                        FAQ SECTION
            Accordion + Scroll Reveal
========================================================== */

document.addEventListener("DOMContentLoaded", () => {

    const faqSection = document.querySelector(".faq-section");

    if (!faqSection) {
        return;
    }


    /* ======================================================
                        FAQ ITEMS
    ====================================================== */

    const faqItems = faqSection.querySelectorAll(".faq-item");


    /* ======================================================
                        ACCORDION
    ====================================================== */

    faqItems.forEach((item) => {

        const button = item.querySelector(".faq-question");

        if (!button) {
            return;
        }


        button.addEventListener("click", () => {

            const isActive =
                item.classList.contains("active");


            /* ==============================================
               CASE 1:
               Current item is already open

               Close it.
               Result:
               All FAQ cards become closed.
            ============================================== */

            if (isActive) {

                item.classList.remove("active");

                button.setAttribute(
                    "aria-expanded",
                    "false"
                );

                return;
            }


            /* ==============================================
               CASE 2:
               Another item is open

               Close all other items.
            ============================================== */

            faqItems.forEach((faqItem) => {

                if (faqItem === item) {
                    return;
                }

                faqItem.classList.remove("active");

                const faqButton =
                    faqItem.querySelector(".faq-question");

                if (faqButton) {

                    faqButton.setAttribute(
                        "aria-expanded",
                        "false"
                    );

                }

            });


            /* ==============================================
               Open clicked item
            ============================================== */

            item.classList.add("active");

            button.setAttribute(
                "aria-expanded",
                "true"
            );

        });

    });


    /* ======================================================
                    SCROLL REVEAL
                    FAQ ONLY
    ====================================================== */

    const reveals =
        faqSection.querySelectorAll(".faq-reveal");


    if (!reveals.length) {
        return;
    }


    const observer = new IntersectionObserver(
        (entries, revealObserver) => {

            entries.forEach((entry) => {

                if (!entry.isIntersecting) {
                    return;
                }


                /*
                    IMPORTANT:
                    Reveal uses "is-visible"
                    NOT "active".
                */

                entry.target.classList.add(
                    "is-visible"
                );


                revealObserver.unobserve(
                    entry.target
                );

            });

        },
        {
            threshold: 0.15,
        }
    );


    /* ======================================================
                    STAGGERED REVEAL
    ====================================================== */

    reveals.forEach((element, index) => {

        element.style.transitionDelay =
            `${index * 120}ms`;

        observer.observe(element);

    });


});