/* ==========================================================
   CERTIFIED — HOME
   FEATURES SECTION
   ==========================================================

   File:
   ----------------------------------------------------------
   features.js


   Section:
   ----------------------------------------------------------
   Home → Features


   Purpose:
   ----------------------------------------------------------
   Controls all client-side interactions for the Home
   Features Section.

   Responsibilities:
   - Scroll reveal animation
   - Desktop card tilt interaction
   - Mouse-follow card light effect
   - Card transform reset on mouse leave


   Backend Integration:
   ----------------------------------------------------------
   NOT REQUIRED.

   This script does not communicate with Laravel,
   APIs, databases, or external services.

   No:
   - fetch()
   - AJAX
   - API requests
   - Database queries
   - CRUD operations
   - Authentication logic


   Data:
   ----------------------------------------------------------
   Feature content is static / translation-based.

   JavaScript does not retrieve or modify feature data.


   Dependencies:
   ----------------------------------------------------------
   - Vanilla JavaScript
   - DOMContentLoaded
   - IntersectionObserver API


   DOM Scope:
   ----------------------------------------------------------
   All feature cards are queried from:

       .features-section

   This prevents this script from affecting unrelated
   .feature-card elements elsewhere in the application.


   ----------------------------------------------------------
   FEATURE 01 — SECTION INITIALIZATION
   ----------------------------------------------------------

   The script waits until the DOM is ready.

   If .features-section does not exist, the script exits
   safely without generating an error.


   ----------------------------------------------------------
   FEATURE 02 — FEATURE CARD COLLECTION
   ----------------------------------------------------------

   All cards inside the Features Section are collected.

   Selector:

       .features-section .feature-card


   ----------------------------------------------------------
   FEATURE 03 — SCROLL REVEAL
   ----------------------------------------------------------

   IntersectionObserver detects when individual cards enter
   the viewport.

   Configuration:

       threshold: 0.2

   When a card becomes visible:

       .show

   is added to the card.

   The CSS file controls the actual visual transition.


   ----------------------------------------------------------
   FEATURE 04 — DESKTOP MOUSE TILT
   ----------------------------------------------------------

   Mouse tilt is enabled only on desktop screens.

   Condition:

       window.innerWidth > 768


   The mouse position inside each card is converted into
   rotation values:

       rotateX
       rotateY


   The card receives a subtle 3D perspective effect.


   ----------------------------------------------------------
   FEATURE 05 — MOUSE-FOLLOW LIGHT
   ----------------------------------------------------------

   Each feature card contains:

       .card-light

   The light follows the mouse position inside the card.

   The effect is purely visual and does not affect content
   or application logic.


   ----------------------------------------------------------
   FEATURE 06 — MOUSE LEAVE RESET
   ----------------------------------------------------------

   When the pointer leaves a card:

   - The 3D rotation is reset.
   - The card light opacity is set to zero.

   This returns the card to its normal visual state.


   ----------------------------------------------------------
   RESPONSIVE BEHAVIOR
   ----------------------------------------------------------

   Mouse effects are intentionally disabled below 769px.

   Reason:
   - Touch devices do not provide a traditional mouse
     interaction model.
   - 3D tilt can feel intrusive on small screens.
   - Mobile should prioritize readability and performance.


   ----------------------------------------------------------
   PERFORMANCE
   ----------------------------------------------------------

   IntersectionObserver is used for reveal detection instead
   of a continuous scroll listener.

   Mouse interactions are attached only to feature cards.

   No network requests are performed.


   ----------------------------------------------------------
   CSS DEPENDENCY
   ----------------------------------------------------------

   JavaScript relies on features.css for:

       .show

   JavaScript controls interaction state.

   CSS controls:
   - opacity
   - transitions
   - visual effects
   - card styling


   ----------------------------------------------------------
   MAINTENANCE RULES
   ----------------------------------------------------------

   Keep all selectors scoped to .features-section.

   Do not add backend logic to this file.

   Keep presentation styling inside features.css.

   Keep feature content inside Blade and translation files.


   ----------------------------------------------------------
   FINAL STATUS
   ----------------------------------------------------------

   Section:
       Home → Features

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

    const section =
        document.querySelector(".features-section");

    if (!section) {
        return;
    }


    /* ======================================================
       02. FEATURE CARD COLLECTION
       ====================================================== */

    const featureCards =
        section.querySelectorAll(".feature-card");


    /* ======================================================
       03. SCROLL REVEAL
       ====================================================== */

    const revealObserver = new IntersectionObserver(
        (entries) => {

            entries.forEach((entry) => {

                if (!entry.isIntersecting) {
                    return;
                }

                entry.target.classList.add("show");

            });

        },
        {
            threshold: 0.2,
        }
    );


    featureCards.forEach((card) => {
        revealObserver.observe(card);
    });


    /* ======================================================
       04. DESKTOP MOUSE EFFECTS
       ====================================================== */

    if (window.innerWidth <= 768) {
        return;
    }


    featureCards.forEach((card) => {

        const light =
            card.querySelector(".card-light");

        if (!light) {
            return;
        }


        /* ==================================================
           MOUSE MOVE
           ================================================== */

        card.addEventListener("mousemove", (event) => {

            const rect =
                card.getBoundingClientRect();


            const x =
                event.clientX - rect.left;

            const y =
                event.clientY - rect.top;


            const rotateY =
                (x / rect.width - 0.5) * 14;

            const rotateX =
                ((rect.height / 2 - y) / rect.height) * 14;


            card.style.transform = `
                perspective(900px)
                rotateX(${rotateX}deg)
                rotateY(${rotateY}deg)
                translateY(-10px)
            `;


            light.style.opacity = ".9";

            light.style.left = `${x}px`;

            light.style.top = `${y}px`;

        });


        /* ==================================================
           MOUSE LEAVE
           ================================================== */

        card.addEventListener("mouseleave", () => {

            card.style.transform =
                "perspective(900px) rotateX(0) rotateY(0) translateY(0)";

            light.style.opacity = "0";

        });

    });

});