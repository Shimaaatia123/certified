"use strict";

/* ==========================================================
   CERTIFIED — CATEGORIES SECTION
   Backend API Integration
   Scoped / Isolated
========================================================== */

document.addEventListener("DOMContentLoaded", () => {

    /* ======================================================
       SECTION
    ======================================================= */

    const categoriesSection =
        document.querySelector(
            ".categories-section"
        );


    if (!categoriesSection) {
        return;
    }


    /* ======================================================
       ELEMENTS
    ======================================================= */

    const loading =
        categoriesSection.querySelector(
            "#categories-loading"
        );


    const categoriesContainer =
        categoriesSection.querySelector(
            "#categories-data"
        );


    const emptyState =
        categoriesSection.querySelector(
            "#categories-empty"
        );


    /* ======================================================
       LOCALE
    ======================================================= */

    const locale =
        categoriesSection.dataset.locale ||
        "en";


    /* ======================================================
       API ENDPOINT
    ======================================================= */

    const endpoint =
        categoriesSection.dataset.categoriesEndpoint ||
        "/api/categories/all";


    /* ======================================================
       CATEGORY ICONS
       
       Backend IDs:
       8  → Artificial Intelligence
       9  → Cyber Security
       10 → Data Science
       11 → Cloud Computing
       12 → Mobile App Development
       13 → DevOps & Automation
    ======================================================= */

    const categoryIcons = {

        8:
            "fa-solid fa-robot",

        9:
            "fa-solid fa-shield-halved",

        10:
            "fa-solid fa-chart-line",

        11:
            "fa-solid fa-cloud",

        12:
            "fa-solid fa-mobile-screen-button",

        13:
            "fa-solid fa-gears",

    };


    /* ======================================================
       FETCH CATEGORIES
    ======================================================= */

    async function fetchCategories() {

        try {

            const response =
                await fetch(
                    endpoint,
                    {
                        method: "GET",

                        headers: {
                            "Accept":
                                "application/json",

                            "Content-Type":
                                "application/json",
                        },

                        cache: "no-store",
                    }
                );


            /* ==================================================
               HTTP CHECK
            =================================================== */

            if (!response.ok) {

                throw new Error(
                    `Categories API failed: ${response.status}`
                );

            }


            /* ==================================================
               JSON
            =================================================== */

            const result =
                await response.json();


            /* ==================================================
               API RESPONSE
               
               Expected:
               {
                   "msg💌": "...",
                   "status📌": 200,
                   "data🌍": [...]
               }
            =================================================== */

            const categories =
                Array.isArray(
                    result["data🌍"]
                )
                    ? result["data🌍"]
                    : [];


            /* ==================================================
               ACTIVE CATEGORIES ONLY
            =================================================== */

            const activeCategories =
                categories.filter(
                    (category) => {

                        return Number(
                            category["Status✨"]
                        ) === 1;

                    }
                );


            /* ==================================================
               HIDE LOADING
            =================================================== */

            hideLoading();


            /* ==================================================
               EMPTY
            =================================================== */

            if (!activeCategories.length) {

                showEmptyState();

                return;

            }


            /* ==================================================
               RENDER
            =================================================== */

            renderCategories(
                activeCategories
            );

        }


        catch (error) {

            console.error(
                "Categories Integration Error:",
                error
            );


            hideLoading();

            showEmptyState();

        }

    }


    /* ======================================================
       HIDE LOADING
    ======================================================= */

    function hideLoading() {

        if (!loading) {
            return;
        }


        loading.hidden = true;

    }


    /* ======================================================
       SHOW EMPTY STATE
    ======================================================= */

    function showEmptyState() {

        if (categoriesContainer) {

            categoriesContainer.innerHTML = "";

            categoriesContainer.hidden = true;

        }


        if (emptyState) {

            emptyState.hidden = false;

        }

    }


    /* ======================================================
       RENDER CATEGORIES
    ======================================================= */

    function renderCategories(
        categories
    ) {

        if (!categoriesContainer) {
            return;
        }


        categoriesContainer.innerHTML =
            "";


        categories.forEach(
            (category, index) => {

                const column =
                    createCategoryCard(
                        category,
                        index
                    );


                categoriesContainer.appendChild(
                    column
                );

            }
        );


        categoriesContainer.hidden =
            false;


        if (emptyState) {

            emptyState.hidden =
                true;

        }


        initializeCardReveal();

        initializeCardInteractions();

    }


    /* ======================================================
       CREATE CATEGORY CARD
    ======================================================= */

    function createCategoryCard(
        category,
        index
    ) {

        const column =
            document.createElement(
                "div"
            );


        column.className =
            "col-lg-4 col-md-6";


        /* ==================================================
           CATEGORY ID
        =================================================== */

        const categoryId =
            Number(
                category["Identity💎"]
            );


        /* ==================================================
           LOCALIZED TITLE
        =================================================== */

        const title =
            locale === "ar"

                ? category["Title_Ar🏷️"]

                : category["Title_En📌"];


        /* ==================================================
           LOCALIZED DESCRIPTION
        =================================================== */

        const description =
            locale === "ar"

                ? category["Description_Ar🔸"]

                : category["Description_En🔹"];


        /* ==================================================
           IMAGE
        =================================================== */

        const image =
            category["Image🖼️"];


        const imageUrl =
            image

                ? `/storage/${image}`

                : "/images/courses/courses.jpg";


        /* ==================================================
           ICON
        =================================================== */

        const iconClass =
            categoryIcons[categoryId] ||
            "fa-solid fa-layer-group";


        /* ==================================================
           COURSE COUNT
           
           Support multiple possible API names.
        =================================================== */

        const possibleCount =
            category["Courses_Count🔢"] ??
            category["courses_count"] ??
            category["CoursesCount"] ??
            category["courses"] ??
            null;


        const numericCount =
            Number(
                possibleCount
            );


        let footerText;


        if (
            possibleCount !== null &&
            possibleCount !== "" &&
            Number.isFinite(
                numericCount
            )
        ) {

            footerText =
                locale === "ar"

                    ? `${numericCount} دورة`

                    : `${numericCount} Courses`;

        }
        else {

            footerText =
                locale === "ar"

                    ? "متاحة"

                    : "Available";

        }


        /* ==================================================
           CREATE CARD
        =================================================== */

        const card =
            document.createElement(
                "div"
            );


        card.className =
            "category-card";


        card.dataset.categoryId =
            String(categoryId);


        /* ==================================================
           CARD HTML
        =================================================== */

        card.innerHTML = `

            <div class="card-glow"></div>

            <div class="card-shine"></div>


            <div class="category-image">

                <img
                    src="${escapeHtml(imageUrl)}"
                    alt="${escapeHtml(
                        title || "Category"
                    )}"
                    loading="lazy"
                    onerror="this.src='/images/courses/courses.jpg';"
                >


                <div
                    class="category-image-overlay"
                ></div>


                <div
                    class="category-image-icon"
                >

                    <i
                        class="${escapeHtml(iconClass)}"
                    ></i>

                </div>

            </div>


            <div class="category-content">

                <h3>

                    ${escapeHtml(
                        title || ""
                    )}

                </h3>


                <p>

                    ${escapeHtml(
                        description ||
                        (
                            locale === "ar"

                                ? "استكشف الدورات المتاحة في هذه الفئة."

                                : "Explore the available courses in this category."
                        )
                    )}

                </p>


                <div class="category-footer">

                    <span>

                        ${escapeHtml(
                            footerText
                        )}

                    </span>


                    <i
                        class="
                            fa-solid
                            fa-arrow-right
                        "
                        aria-hidden="true"
                    ></i>

                </div>

            </div>

        `;


        column.appendChild(
            card
        );


        return column;

    }


    /* ======================================================
       ESCAPE HTML
    ======================================================= */

    function escapeHtml(value) {

        const div =
            document.createElement(
                "div"
            );


        div.textContent =
            value ?? "";


        return div.innerHTML;

    }


    /* ======================================================
       CARD REVEAL
    ======================================================= */

    function initializeCardReveal() {

        const cards =
            categoriesSection.querySelectorAll(
                "#categories-data .category-card"
            );


        if (!cards.length) {
            return;
        }


        cards.forEach(
            (card, index) => {

                setTimeout(
                    () => {

                        card.classList.add(
                            "show"
                        );

                    },

                    index * 120

                );

            }
        );

    }


    /* ======================================================
       CARD INTERACTIONS
    ======================================================= */

    function initializeCardInteractions() {

        const cards =
            categoriesSection.querySelectorAll(
                "#categories-data .category-card"
            );


        cards.forEach(
            (card, index) => {

                const icon =
                    card.querySelector(
                        ".category-image-icon"
                    );


                /* ==========================================
                   FLOATING ICON
                =========================================== */

                if (
                    icon &&
                    typeof icon.animate ===
                    "function"
                ) {

                    icon.animate(
                        [
                            {
                                transform:
                                    "translateY(0px)",
                            },

                            {
                                transform:
                                    "translateY(-8px)",
                            },

                            {
                                transform:
                                    "translateY(0px)",
                            },
                        ],
                        {
                            duration:
                                3000 +
                                index * 250,

                            iterations:
                                Infinity,

                            easing:
                                "ease-in-out",
                        }
                    );

                }


                /* ==========================================
                   MOUSE GLOW
                =========================================== */

                card.addEventListener(
                    "mousemove",
                    (event) => {

                        if (
                            window.innerWidth <=
                            768
                        ) {
                            return;
                        }


                        const rect =
                            card.getBoundingClientRect();


                        const x =
                            event.clientX -
                            rect.left;


                        const y =
                            event.clientY -
                            rect.top;


                        card.style.setProperty(
                            "--x",
                            `${x}px`
                        );


                        card.style.setProperty(
                            "--y",
                            `${y}px`
                        );

                    }
                );


                /* ==========================================
                   3D TILT
                =========================================== */

                card.addEventListener(
                    "mousemove",
                    (event) => {

                        if (
                            window.innerWidth <=
                            768
                        ) {
                            return;
                        }


                        const rect =
                            card.getBoundingClientRect();


                        const x =
                            event.clientX -
                            rect.left;


                        const y =
                            event.clientY -
                            rect.top;


                        const rotateY =
                            (
                                x /
                                    rect.width -
                                0.5
                            ) * 10;


                        const rotateX =
                            (
                                0.5 -
                                y /
                                    rect.height
                            ) * 10;


                        card.style.transform =
                            `
                                perspective(1000px)
                                rotateX(${rotateX}deg)
                                rotateY(${rotateY}deg)
                                translateY(-10px)
                                scale(1.02)
                            `;

                    }
                );


                /* ==========================================
                   MOUSE LEAVE
                =========================================== */

                card.addEventListener(
                    "mouseleave",
                    () => {

                        card.style.transform =
                            "";

                    }
                );


                /* ==========================================
                   RIPPLE
                =========================================== */

                card.addEventListener(
                    "click",
                    function (event) {

                        const ripple =
                            document.createElement(
                                "span"
                            );


                        ripple.className =
                            "ripple";


                        const rect =
                            this.getBoundingClientRect();


                        ripple.style.left =
                            `${
                                event.clientX -
                                rect.left
                            }px`;


                        ripple.style.top =
                            `${
                                event.clientY -
                                rect.top
                            }px`;


                        this.appendChild(
                            ripple
                        );


                        setTimeout(
                            () => {

                                ripple.remove();

                            },

                            700

                        );

                    }
                );

            }
        );

    }


    /* ======================================================
       START API INTEGRATION
    ======================================================= */

    fetchCategories();

});