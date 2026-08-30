"use strict";

/* ==========================================================
   CERTIFIED — COURSES HERO
   Hero Animations
   Course Search
   Category Search
   Dynamic Filtering
   Smart Result Navigation
========================================================== */

document.addEventListener("DOMContentLoaded", () => {

    /* ======================================================
       HERO ELEMENTS
    ======================================================= */

    const hero =
        document.querySelector(".courses-hero");

    const glow1 =
        document.querySelector(".hero-glow-1");

    const glow2 =
        document.querySelector(".hero-glow-2");


    /* ======================================================
       HERO REVEAL
    ======================================================= */

    const heroItems =
        document.querySelectorAll(
            ".hero-badge, " +
            ".hero-title, " +
            ".hero-description, " +
            ".hero-search, " +
            ".popular-tags, " +
            ".hero-stats, " +
            ".hero-image"
        );


    if (
        "IntersectionObserver" in window &&
        heroItems.length
    ) {

        const observer =
            new IntersectionObserver(
                (entries) => {

                    entries.forEach(
                        (entry, index) => {

                            if (
                                !entry.isIntersecting
                            ) {
                                return;
                            }


                            setTimeout(
                                () => {

                                    entry.target.classList.add(
                                        "show"
                                    );

                                },
                                index * 120
                            );


                            observer.unobserve(
                                entry.target
                            );

                        }
                    );

                },
                {
                    threshold: 0.2,
                }
            );


        heroItems.forEach(
            (item) => {

                observer.observe(item);

            }
        );

    }
    else {

        heroItems.forEach(
            (item) => {

                item.classList.add(
                    "show"
                );

            }
        );

    }


    /* ======================================================
       HERO PARALLAX
    ======================================================= */

    if (
        hero &&
        glow1 &&
        glow2
    ) {

        hero.addEventListener(
            "mousemove",
            (event) => {

                const x =
                    (
                        event.clientX /
                        window.innerWidth -
                        0.5
                    ) * 35;


                const y =
                    (
                        event.clientY /
                        window.innerHeight -
                        0.5
                    ) * 35;


                glow1.style.transform =
                    `translate(${x}px, ${y}px)`;


                glow2.style.transform =
                    `translate(${-x}px, ${-y}px)`;

            }
        );

    }


    /* ======================================================
       SEARCH ELEMENTS
    ======================================================= */

    const searchInput =
        document.querySelector(
            "#courseSearchInput"
        );


    const searchButton =
        document.querySelector(
            "#courseSearchButton"
        );


    if (
        !searchInput ||
        !searchButton
    ) {
        return;
    }


    /* ======================================================
       SECTIONS
    ======================================================= */

    const coursesSection =
        document.querySelector(
            ".courses-section"
        );


    const categoriesSection =
        document.querySelector(
            ".categories-section"
        );


    /* ======================================================
       API ENDPOINTS
    ======================================================= */

    const coursesEndpoint =
        "/api/courses/all";


    const categoriesEndpoint =
        categoriesSection?.dataset.categoriesEndpoint ||
        "/api/categories/all";


    /* ======================================================
       SEARCH STATE
    ======================================================= */

    let searchRequestId = 0;


    /* ======================================================
       NORMALIZE
    ======================================================= */

    function normalizeSearchValue(value) {

        return String(value ?? "")
            .trim()
            .toLowerCase()
            .replace(/\s+/g, " ");

    }


    /* ======================================================
       GET CURRENT COURSE CARDS
    ======================================================= */

    function getCourseCards() {

        return document.querySelectorAll(
            "#coursesGrid .course-card"
        );

    }


    /* ======================================================
       GET CURRENT CATEGORY CARDS
       
       categories.js renders these dynamically,
       so we MUST query them when needed.
    ======================================================= */

    function getCategoryCards() {

        return document.querySelectorAll(
            "#categories-data .category-card"
        );

    }


    /* ======================================================
       GET CARD WRAPPER
    ======================================================= */

    function getCardWrapper(card) {

        return (
            card.closest(
                ".col-lg-4, .col-md-6"
            ) ||
            card
        );

    }


    /* ======================================================
       SHOW ALL COURSES
    ======================================================= */

    function showAllCourseCards() {

        const cards =
            getCourseCards();


        cards.forEach(
            (card) => {

                const wrapper =
                    getCardWrapper(card);


                wrapper.style.removeProperty(
                    "display"
                );

            }
        );

    }


    /* ======================================================
       SHOW ALL CATEGORIES
    ======================================================= */

    function showAllCategoryCards() {

        const cards =
            getCategoryCards();


        cards.forEach(
            (card) => {

                const wrapper =
                    getCardWrapper(card);


                wrapper.style.removeProperty(
                    "display"
                );

            }
        );

    }


    /* ======================================================
       FILTER COURSES
    ======================================================= */

    function filterCourseCards(
        resultIds
    ) {

        const cards =
            getCourseCards();


        cards.forEach(
            (card) => {

                const wrapper =
                    getCardWrapper(card);


                const courseId =
                    String(
                        card.dataset.courseId ?? ""
                    );


                if (
                    resultIds.includes(
                        courseId
                    )
                ) {

                    wrapper.style.removeProperty(
                        "display"
                    );

                }
                else {

                    wrapper.style.display =
                        "none";

                }

            }
        );

    }


    /* ======================================================
       FILTER CATEGORIES
    ======================================================= */

    function filterCategoryCards(
        categoryIds
    ) {

        const cards =
            getCategoryCards();


        const matchedCards = [];


        cards.forEach(
            (card) => {

                const wrapper =
                    getCardWrapper(card);


                const categoryId =
                    String(
                        card.dataset.categoryId ?? ""
                    );


                if (
                    categoryIds.includes(
                        categoryId
                    )
                ) {

                    wrapper.style.removeProperty(
                        "display"
                    );


                    matchedCards.push(
                        card
                    );

                }
                else {

                    wrapper.style.display =
                        "none";

                }

            }
        );


        return matchedCards;

    }


    /* ======================================================
       SEARCH COURSES
    ======================================================= */

    async function searchCourses(
        searchValue
    ) {

        try {

            const response =
                await fetch(
                    `${coursesEndpoint}?search=${encodeURIComponent(
                        searchValue
                    )}`,
                    {
                        method: "GET",

                        headers: {
                            Accept:
                                "application/json",
                        },

                        cache: "no-store",
                    }
                );


            if (!response.ok) {

                throw new Error(
                    `Course search failed: ${response.status}`
                );

            }


            const result =
                await response.json();


            const courses =
                Array.isArray(
                    result["data🌍"]
                )
                    ? result["data🌍"]
                    : [];


            const ids =
                courses.map(
                    (course) => {

                        return String(
                            course[
                                "Identity💎"
                            ]
                        );

                    }
                );


            return {

                ids,

            };

        }
        catch (error) {

            console.error(
                "Course Search Error:",
                error
            );


            return {

                ids: [],

            };

        }

    }


    /* ======================================================
       SEARCH CATEGORIES
    ======================================================= */

    async function searchCategories(
        searchValue
    ) {

        const query =
            normalizeSearchValue(
                searchValue
            );


        try {

            const response =
                await fetch(
                    categoriesEndpoint,
                    {
                        method: "GET",

                        headers: {
                            Accept:
                                "application/json",
                        },

                        cache: "no-store",
                    }
                );


            if (!response.ok) {

                throw new Error(
                    `Category search failed: ${response.status}`
                );

            }


            const result =
                await response.json();


            const categories =
                Array.isArray(
                    result["data🌍"]
                )
                    ? result["data🌍"]
                    : [];


            const ids =
                categories
                    .filter(
                        (category) => {

                            if (
                                Number(
                                    category[
                                        "Status✨"
                                    ]
                                ) !== 1
                            ) {

                                return false;

                            }


                            const titleAr =
                                normalizeSearchValue(
                                    category[
                                        "Title_Ar🏷️"
                                    ]
                                );


                            const titleEn =
                                normalizeSearchValue(
                                    category[
                                        "Title_En📌"
                                    ]
                                );


                            const descriptionAr =
                                normalizeSearchValue(
                                    category[
                                        "Description_Ar🔸"
                                    ]
                                );


                            const descriptionEn =
                                normalizeSearchValue(
                                    category[
                                        "Description_En🔹"
                                    ]
                                );


                            return (

                                titleAr.includes(
                                    query
                                )

                                ||

                                titleEn.includes(
                                    query
                                )

                                ||

                                descriptionAr.includes(
                                    query
                                )

                                ||

                                descriptionEn.includes(
                                    query
                                )

                            );

                        }
                    )
                    .map(
                        (category) => {

                            return String(
                                category[
                                    "Identity💎"
                                ]
                            );

                        }
                    );


            return {

                ids,

            };

        }
        catch (error) {

            console.error(
                "Category Search Error:",
                error
            );


            return {

                ids: [],

            };

        }

    }


    /* ======================================================
       SCROLL TO COURSES
       
       SEARCH RESULT = COURSE
    ======================================================= */

    function scrollToCoursesSection() {

        if (
            !coursesSection
        ) {
            return;
        }


        coursesSection.scrollIntoView(
            {
                behavior: "smooth",

                block: "start",
            }
        );

    }


    /* ======================================================
       SCROLL TO CATEGORIES
       
       SEARCH RESULT = CATEGORY
    ======================================================= */

    function scrollToCategorySection() {

        if (
            !categoriesSection
        ) {
            return;
        }


        categoriesSection.scrollIntoView(
            {
                behavior: "smooth",

                block: "start",
            }
        );

    }


    /* ======================================================
       MAIN SEARCH
    ======================================================= */

    async function performSearch() {

        const searchValue =
            searchInput.value.trim();


        /* ==================================================
           EMPTY SEARCH
        =================================================== */

        if (!searchValue) {

            searchRequestId++;


            showAllCourseCards();

            showAllCategoryCards();


            return;

        }


        /* ==================================================
           REQUEST ID
        =================================================== */

        const currentRequestId =
            ++searchRequestId;


        /* ==================================================
           SEARCH BOTH
        =================================================== */

        const [
            courseResult,
            categoryResult,
        ] =
            await Promise.all([
                searchCourses(
                    searchValue
                ),

                searchCategories(
                    searchValue
                ),
            ]);


        /* ==================================================
           OLD REQUEST
        =================================================== */

        if (
            currentRequestId !==
            searchRequestId
        ) {

            return;

        }


        /* ==================================================
           RESULT IDS
        =================================================== */

        const courseIds =
            courseResult.ids;


        const categoryIds =
            categoryResult.ids;


        const hasCourseResults =
            courseIds.length > 0;


        const hasCategoryResults =
            categoryIds.length > 0;


        /* ==================================================
           PRIORITY 1 — COURSE
           
           If Course exists:
           
           1. Show matching Course(s)
           2. Restore Categories
           3. Scroll to Courses
           
           IMPORTANT:
           We STOP here.
        =================================================== */

        if (
            hasCourseResults
        ) {

            filterCourseCards(
                courseIds
            );


            showAllCategoryCards();


            scrollToCoursesSection();


            return;

        }


        /* ==================================================
           PRIORITY 2 — CATEGORY
           
           Only reached when no Course exists.
           
           1. Restore Courses
           2. Show matching Category
           3. Hide other Categories
           4. Scroll to Categories
        =================================================== */

        if (
            hasCategoryResults
        ) {

            showAllCourseCards();


            const matchedCards =
                filterCategoryCards(
                    categoryIds
                );


            if (
                matchedCards.length
            ) {

                scrollToCategorySection();

            }


            return;

        }


        /* ==================================================
           NO RESULTS
           
           Don't move the user.
           Don't destroy either section.
        =================================================== */

        showAllCourseCards();

        showAllCategoryCards();


        console.info(
            `No courses or categories found for: "${searchValue}"`
        );

    }


    /* ======================================================
       SEARCH BUTTON
    ======================================================= */

    searchButton.addEventListener(
        "click",
        performSearch
    );


    /* ======================================================
       ENTER KEY
    ======================================================= */

    searchInput.addEventListener(
        "keydown",
        (event) => {

            if (
                event.key === "Enter"
            ) {

                event.preventDefault();

                performSearch();

            }

        }
    );


    /* ======================================================
       CLEAR SEARCH
    ======================================================= */

    searchInput.addEventListener(
        "input",
        () => {

            if (
                !searchInput.value.trim()
            ) {

                searchRequestId++;


                showAllCourseCards();

                showAllCategoryCards();

            }

        }
    );

});