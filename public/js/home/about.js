/* ==========================================================
   CERTIFIED — HOME
   ABOUT SECTION
   ==========================================================

   File:
   ----------------------------------------------------------
   about.js


   Section:
   ----------------------------------------------------------
   Home → About


   Purpose:
   ----------------------------------------------------------
   This file controls all client-side interactions for the
   About Section on the Home page.

   The script is responsible for:
   - Scroll reveal animation
   - Staggered feature-item animation
   - Mouse-based image parallax
   - Resetting the image position when the pointer leaves
     the section


   Backend Integration:
   ----------------------------------------------------------
   NOT REQUIRED.

   This section does not communicate with Laravel controllers,
   APIs, databases, or external services.

   No:
   - fetch()
   - XMLHttpRequest
   - AJAX
   - API calls
   - Database requests
   - Form submission
   - Authentication logic


   Data:
   ----------------------------------------------------------
   The About Section uses static presentation content and
   Laravel translation keys.

   JavaScript does NOT generate or retrieve business data.


   Dependencies:
   ----------------------------------------------------------
   - Vanilla JavaScript
   - DOMContentLoaded
   - IntersectionObserver API

   No external JavaScript library is required.


   DOM Scope:
   ----------------------------------------------------------
   All elements are searched from:

       .about-section

   This prevents the script from accidentally affecting
   elements belonging to other Home page sections.


   ----------------------------------------------------------
   FEATURE 01 — SECTION INITIALIZATION
   ----------------------------------------------------------

   The script waits for the DOM to finish loading before
   attempting to access the About Section.

   If .about-section does not exist on the current page,
   the script exits safely.

   This allows the same JavaScript asset to exist globally
   without generating errors on pages that do not contain
   the About Section.


   ----------------------------------------------------------
   FEATURE 02 — ELEMENT REFERENCES
   ----------------------------------------------------------

   The script stores references to:

   .section-badge
       About section badge.

   .section-title
       Main About heading.

   .section-description
       About description.

   .feature-item
       Individual About feature rows.

   .about-image
       Main About visual.


   ----------------------------------------------------------
   FEATURE 03 — SCROLL REVEAL
   ----------------------------------------------------------

   IntersectionObserver detects when the About Section enters
   the viewport.

   Configuration:

       threshold: 0.25

   This means the animation is triggered when approximately
   25% of the section becomes visible.


   When triggered:

   .section-badge
       receives .show

   .section-title
       receives .show

   .section-description
       receives .show

   .feature-item
       receives .show sequentially.


   ----------------------------------------------------------
   FEATURE 04 — STAGGERED FEATURES
   ----------------------------------------------------------

   Feature items are revealed with a small delay between
   each item.

   Delay:

       index * 180ms

   Example:

       Feature 1 → 0ms
       Feature 2 → 180ms
       Feature 3 → 360ms


   This creates a sequential entrance instead of displaying
   all feature items simultaneously.


   ----------------------------------------------------------
   FEATURE 05 — OBSERVER CLEANUP
   ----------------------------------------------------------

   After the About Section has been revealed, the observer
   stops watching it using:

       revealObserver.unobserve(section)

   This prevents unnecessary repeated observation after the
   animation has already completed.


   ----------------------------------------------------------
   FEATURE 06 — IMAGE PARALLAX
   ----------------------------------------------------------

   The script tracks mouse movement inside the About Section.

   The mouse position is converted into relative X/Y values.

   The image is then moved slightly according to the pointer
   position.

   This creates a subtle interactive parallax effect.


   Important:
   ----------------------------------------------------------
   The movement is intentionally limited to a small range.

   This prevents excessive image movement and keeps the
   interaction decorative rather than disruptive.


   ----------------------------------------------------------
   FEATURE 07 — MOUSE LEAVE RESET
   ----------------------------------------------------------

   When the pointer leaves the About Section, the image
   transform is cleared.

   This returns the image to its original CSS-controlled
   position.


   ----------------------------------------------------------
   PERFORMANCE
   ----------------------------------------------------------

   The script uses IntersectionObserver instead of a
   continuous window scroll listener.

   This reduces unnecessary JavaScript work during scrolling.

   Mouse interaction is limited to the About Section only.


   ----------------------------------------------------------
   SAFETY
   ----------------------------------------------------------

   The script safely handles missing DOM elements.

   If the section does not exist:

       return;

   If the image does not exist:

       return;

   Optional chaining is used for reveal elements so that a
   missing element does not cause a JavaScript runtime error.


   ----------------------------------------------------------
   CSS DEPENDENCY
   ----------------------------------------------------------

   This JavaScript relies on CSS classes defined in:

       about.css

   Especially:

       .show

   The JavaScript only changes state.

   CSS controls the actual visual animation.


   ----------------------------------------------------------
   ANIMATION ARCHITECTURE
   ----------------------------------------------------------

   JavaScript:
       Detects interaction
       ↓
       Adds/removes state
       ↓
   CSS:
       Controls visual transition


   JavaScript does NOT contain visual styling values except
   the small parallax movement calculation.


   ----------------------------------------------------------
   IMPORTANT TECHNICAL NOTE
   ----------------------------------------------------------

   .about-image currently has multiple possible transform
   sources:

   1. CSS floating animation
   2. CSS hover transform
   3. JavaScript mouse parallax

   Therefore, the image transform architecture should not be
   changed casually.

   Any future refactor should be visually tested to ensure
   the floating animation, hover state, and parallax behavior
   continue working correctly.


   ----------------------------------------------------------
   MAINTENANCE RULES
   ----------------------------------------------------------

   Do not add backend/API logic to this file unless the
   requirements of the About Section change.

   Keep all selectors scoped to .about-section.

   Keep business/data logic outside this file.

   Keep visual styling inside about.css.

   Keep translation content inside Laravel translation files.


   ----------------------------------------------------------
   FINAL STATUS
   ----------------------------------------------------------

   Section:
       Home → About

   Integration:
       Frontend Only

   Backend Required:
       No

   JavaScript:
       Reviewed

   Documentation:
       Complete

   Status:
       CLOSED
   ========================================================== */


/* ==========================================================
   01. DOM INITIALIZATION
   ========================================================== */

document.addEventListener("DOMContentLoaded", () => {

    const section = document.querySelector(".about-section");

    if (!section) {
        return;
    }


    /* ======================================================
       02. ELEMENT REFERENCES
       ====================================================== */

    const badge =
        section.querySelector(".section-badge");

    const title =
        section.querySelector(".section-title");

    const description =
        section.querySelector(".section-description");

    const features =
        section.querySelectorAll(".feature-item");

    const image =
        section.querySelector(".about-image");


    /* ======================================================
       03. SCROLL REVEAL
       ====================================================== */

    const revealObserver = new IntersectionObserver(
        (entries) => {

            entries.forEach((entry) => {

                if (!entry.isIntersecting) {
                    return;
                }


                /* ------------------------------------------
                   Reveal main content
                ------------------------------------------ */

                badge?.classList.add("show");

                title?.classList.add("show");

                description?.classList.add("show");


                /* ------------------------------------------
                   Stagger feature items
                ------------------------------------------ */

                features.forEach((item, index) => {

                    setTimeout(() => {

                        item.classList.add("show");

                    }, index * 180);

                });


                /* ------------------------------------------
                   Stop observing after first reveal
                ------------------------------------------ */

                revealObserver.unobserve(section);

            });

        },
        {
            threshold: 0.25,
        }
    );


    revealObserver.observe(section);


    /* ======================================================
       04. IMAGE PARALLAX
       ====================================================== */

    if (!image) {
        return;
    }


    section.addEventListener("mousemove", (event) => {

        const rect =
            section.getBoundingClientRect();


        const x =
            ((event.clientX - rect.left) / rect.width - 0.5) * 16;


        const y =
            ((event.clientY - rect.top) / rect.height - 0.5) * 16;


        image.style.transform =
            `translate(${x}px, ${y}px)`;

    });


    /* ======================================================
       05. RESET IMAGE POSITION
       ====================================================== */

    section.addEventListener("mouseleave", () => {

        image.style.transform = "";

    });

});