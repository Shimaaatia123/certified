/* ==========================================================
   CERTIFIED — HOME
   TRUSTED SECTION
   ==========================================================

   File:
   trusted.js

   Section:
   Home → Trusted

   Purpose:
   ----------------------------------------------------------
   Controls the interactive behavior of the Trusted Section.

   Responsibilities:
   - Scroll reveal animation
   - Mouse-follow glow
   - Mouse-leave glow reset


   Backend Integration:
   ----------------------------------------------------------
   NOT REQUIRED.

   This script performs frontend-only visual interactions.

   No:
   - API requests
   - AJAX / Fetch requests
   - Database operations
   - Form submissions
   - Authentication logic
   - Server communication


   Dependencies:
   ----------------------------------------------------------
   - Vanilla JavaScript
   - DOMContentLoaded
   - IntersectionObserver API

   No external JavaScript library is required.


   Section Scope:
   ----------------------------------------------------------
   All DOM queries are scoped to:

       .trusted-section

   This prevents the script from interfering with other
   sections on the Home page.


   Features:
   ----------------------------------------------------------

   01. Scroll Reveal
       Uses IntersectionObserver to add the .show state
       when .reveal-up elements enter the viewport.


   02. Mouse Glow
       Tracks the mouse position inside the Trusted Section
       and moves the decorative .mouse-glow element.


   03. Mouse Leave
       Hides the glow when the pointer leaves the section.


   Performance:
   ----------------------------------------------------------
   - Uses IntersectionObserver instead of scroll events
     for reveal animations.
   - Does not perform network requests.
   - Does not manipulate unrelated DOM elements.
   - Uses section-scoped selectors.


   Error Safety:
   ----------------------------------------------------------
   The script checks whether the Trusted Section exists
   before continuing.

   The mouse-glow element is also checked before attaching
   mouse interaction.


   Maintenance Rule:
   ----------------------------------------------------------
   Do not add backend/API logic here unless the Trusted
   Section requirements change in the future.

   Keep this file responsible only for Trusted Section
   frontend interactions.


   Status:
   ----------------------------------------------------------
   CLOSED
   ========================================================== */
/* ==========================================================
   CERTIFIED — HOME
   TRUSTED SECTION
   JavaScript
   ========================================================== */

document.addEventListener("DOMContentLoaded", () => {

    /* ======================================================
       01. SECTION ELEMENTS
       ====================================================== */

    const section = document.querySelector(".trusted-section");

    if (!section) {
        return;
    }

    const glow = section.querySelector(".mouse-glow");

    const revealElements = section.querySelectorAll(".reveal-up");


    /* ======================================================
       02. REVEAL ON SCROLL
       Uses IntersectionObserver to reveal section content
       when it enters the viewport.
       ====================================================== */

    const revealObserver = new IntersectionObserver(
        (entries) => {

            entries.forEach((entry) => {

                if (entry.isIntersecting) {
                    entry.target.classList.add("show");
                }

            });

        },
        {
            threshold: 0.2,
        }
    );


    revealElements.forEach((element) => {
        revealObserver.observe(element);
    });


    /* ======================================================
       03. MOUSE GLOW
       Decorative interaction only.
       No backend communication is required.
       ====================================================== */

    if (!glow) {
        return;
    }


    section.addEventListener("mousemove", (event) => {

        const rect = section.getBoundingClientRect();

        glow.style.left = `${event.clientX - rect.left}px`;

        glow.style.top = `${event.clientY - rect.top}px`;

        glow.style.opacity = "1";

    });


    /* ======================================================
       04. HIDE GLOW WHEN MOUSE LEAVES
       ====================================================== */

    section.addEventListener("mouseleave", () => {

        glow.style.opacity = "0";

    });

});