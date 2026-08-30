/* ==========================================================
   CERTIFIED — HOME TESTIMONIALS SECTION
   ----------------------------------------------------------
   Purpose:
   Controls the interactive testimonial slider.

   Responsibilities:
   - Detect the Testimonials section.
   - Rotate testimonials automatically.
   - Handle manual navigation through dots.
   - Update the active testimonial state.
   - Animate the progress indicator.

   Backend Integration:
   Not required.

   Data Source:
   Laravel translation files.

   Dependencies:
   - Native JavaScript
   - DOM API
   - CSS transitions / animations

   Auto-play:
   5 seconds per testimonial.
========================================================== */

document.addEventListener("DOMContentLoaded", function () {

    /* ==========================================================
       SECTION INITIALIZATION
    ========================================================== */

    const section = document.querySelector(".testimonials-section");

    if (!section) {
        return;
    }


    /* ==========================================================
       ELEMENT REFERENCES
    ========================================================== */

    const testimonials = section.querySelectorAll(".testimonial");
    const dots = section.querySelectorAll(".dot");
    const progressBar = section.querySelector(".progress-bar");


    /* ==========================================================
       SLIDER STATE
    ========================================================== */

    let index = 0;

    const slideDuration = 5000;


    /* ==========================================================
       SHOW TESTIMONIAL
       ----------------------------------------------------------
       Activates the selected testimonial and its corresponding
       navigation dot.
    ========================================================== */

    function showTestimonial(i) {

        testimonials.forEach((testimonial) => {
            testimonial.classList.remove("active");
        });

        dots.forEach((dot) => {
            dot.classList.remove("active");
        });


        testimonials[i].classList.add("active");
        dots[i].classList.add("active");


        /* Reset progress animation */

        if (progressBar) {

            progressBar.style.transition = "none";
            progressBar.style.width = "0";

            requestAnimationFrame(() => {

                progressBar.style.transition =
                    `width ${slideDuration}ms linear`;

                progressBar.style.width = "100%";

            });

        }

    }


    /* ==========================================================
       NEXT SLIDE
       ----------------------------------------------------------
       Moves the slider to the next testimonial.
       Returns to the first testimonial after the last one.
    ========================================================== */

    function nextSlide() {

        index = (index + 1) % testimonials.length;

        showTestimonial(index);

    }


    /* ==========================================================
       MANUAL DOT NAVIGATION
    ========================================================== */

    dots.forEach((dot, i) => {

        dot.addEventListener("click", () => {

            index = i;

            showTestimonial(index);

        });

    });


    /* ==========================================================
       INITIAL STATE
    ========================================================== */

    showTestimonial(index);


    /* ==========================================================
       AUTO PLAY
       ----------------------------------------------------------
       Automatically changes the testimonial every 5 seconds.
    ========================================================== */

    setInterval(nextSlide, slideDuration);

});
