document.addEventListener("DOMContentLoaded", () => {

    /*==================================================
        COURSE TESTIMONIALS
    ==================================================*/

    const section = document.querySelector(
        ".course-testimonials-section"
    );

    if (!section) {
        return;
    }


    const track = section.querySelector(
        ".course-testimonials-track-inner"
    );

    const cards = [
        ...section.querySelectorAll(
            ".course-testimonial-card"
        ),
    ];

    const prev = section.querySelector(
        ".course-testimonials-prev"
    );

    const next = section.querySelector(
        ".course-testimonials-next"
    );

    const dots = [
        ...section.querySelectorAll(
            ".course-testimonials-dot"
        ),
    ];

    const slider = section.querySelector(
        ".course-testimonials-slider"
    );


    if (
        !track ||
        !cards.length ||
        !prev ||
        !next ||
        !slider
    ) {
        return;
    }


    /*==================================================
        STATE
    ==================================================*/

    let current = 0;

    let visibleCards = getVisibleCards();

    let isAnimating = false;

    let autoPlay = null;

    let hasStarted = false;

    let startX = 0;

    let endX = 0;

    const swipeThreshold = 60;


    /*==================================================
        GET VISIBLE CARDS
    ==================================================*/

    function getVisibleCards() {

        if (window.innerWidth <= 768) {
            return 1;
        }

        if (window.innerWidth <= 1199) {
            return 2;
        }

        return 3;
    }


    /*==================================================
        GET MAX INDEX
    ==================================================*/

    function getMaxIndex() {

        return Math.max(
            0,
            cards.length - visibleCards
        );
    }


    /*==================================================
        GET CARD STEP
    ==================================================*/

    function getCardStep() {

        if (cards.length <= 1) {
            return cards[0].offsetWidth;
        }

        const firstCard = cards[0];

        const secondCard = cards[1];

        return (
            secondCard.offsetLeft -
            firstCard.offsetLeft
        );
    }


    /*==================================================
        UPDATE SLIDER
    ==================================================*/

    function updateSlider(animated = true) {

        if (!track) {
            return;
        }

        const step = getCardStep();

        if (animated) {

            track.style.transition =
                "transform .65s cubic-bezier(.22,.61,.36,1)";

        } else {

            track.style.transition = "none";

        }


        track.style.transform =
            `translateX(-${current * step}px)`;


        cards.forEach((card) => {

            card.classList.remove("active");

        });


        for (
            let index = current;
            index < current + visibleCards;
            index++
        ) {

            if (cards[index]) {

                cards[index].classList.add("active");

            }

        }


        dots.forEach((dot) => {

            dot.classList.remove("active");

        });


        if (dots[current]) {

            dots[current].classList.add("active");

        }

    }


    /*==================================================
        NEXT SLIDE
    ==================================================*/

    function goNext() {

        if (isAnimating) {
            return;
        }

        isAnimating = true;

        current++;


        if (current > getMaxIndex()) {

            current = 0;

        }


        updateSlider(true);

        startAutoPlay();

    }


    /*==================================================
        PREVIOUS SLIDE
    ==================================================*/

    function goPrevious() {

        if (isAnimating) {
            return;
        }

        isAnimating = true;

        current--;


        if (current < 0) {

            current = getMaxIndex();

        }


        updateSlider(true);

        startAutoPlay();

    }


    /*==================================================
        AUTO PLAY
    ==================================================*/

    function startAutoPlay() {

        clearInterval(autoPlay);


        if (cards.length <= visibleCards) {
            return;
        }


        autoPlay = setInterval(() => {

            if (!isAnimating) {

                goNext();

            }

        }, 3500);

    }


    function stopAutoPlay() {

        clearInterval(autoPlay);

        autoPlay = null;

    }


    /*==================================================
        TRANSITION END
    ==================================================*/

    track.addEventListener(
        "transitionend",
        () => {

            isAnimating = false;

        }
    );


    /*==================================================
        NEXT BUTTON
    ==================================================*/

    next.addEventListener(
        "click",
        () => {

            goNext();

        }
    );


    /*==================================================
        PREVIOUS BUTTON
    ==================================================*/

    prev.addEventListener(
        "click",
        () => {

            goPrevious();

        }
    );


    /*==================================================
        DOTS
    ==================================================*/

    dots.forEach((dot, index) => {

        dot.addEventListener(
            "click",
            () => {

                if (isAnimating) {
                    return;
                }


                if (
                    index >
                    getMaxIndex()
                ) {
                    return;
                }


                current = index;

                updateSlider(true);

                startAutoPlay();

            }
        );

    });


    /*==================================================
        PAUSE ON HOVER
    ==================================================*/

    slider.addEventListener(
        "mouseenter",
        () => {

            stopAutoPlay();

        }
    );


    slider.addEventListener(
        "mouseleave",
        () => {

            startAutoPlay();

        }
    );


    /*==================================================
        TOUCH / SWIPE
    ==================================================*/

    slider.addEventListener(
        "touchstart",
        (event) => {

            startX =
                event.touches[0].clientX;

        },
        {
            passive: true,
        }
    );


    slider.addEventListener(
        "touchend",
        (event) => {

            endX =
                event.changedTouches[0].clientX;


            const distance =
                endX - startX;


            if (
                Math.abs(distance) <
                swipeThreshold
            ) {
                return;
            }


            if (distance < 0) {

                goNext();

            } else {

                goPrevious();

            }

        },
        {
            passive: true,
        }
    );


    /*==================================================
        KEYBOARD SUPPORT
    ==================================================*/

    document.addEventListener(
        "keydown",
        (event) => {

            if (
                event.key === "ArrowRight"
            ) {

                goNext();

            }


            if (
                event.key === "ArrowLeft"
            ) {

                goPrevious();

            }

        }
    );


    /*==================================================
        RESIZE
    ==================================================*/

    let resizeTimer = null;


    window.addEventListener(
        "resize",
        () => {

            clearTimeout(resizeTimer);


            resizeTimer = setTimeout(() => {

                const oldVisibleCards =
                    visibleCards;


                visibleCards =
                    getVisibleCards();


                const maxIndex =
                    getMaxIndex();


                if (current > maxIndex) {

                    current = maxIndex;

                }


                /*
                 * Recalculate only.
                 * Do not force an extra slide.
                 */

                updateSlider(false);


                if (
                    oldVisibleCards !==
                    visibleCards
                ) {

                    startAutoPlay();

                }

            }, 150);

        }
    );


    /*==================================================
        INTERSECTION OBSERVER
    ==================================================*/

    const observer =
        new IntersectionObserver(
            (entries) => {

                entries.forEach(
                    (entry) => {

                        if (
                            !entry.isIntersecting
                        ) {

                            stopAutoPlay();

                            return;

                        }


                        if (!hasStarted) {

                            updateSlider(false);

                            startAutoPlay();

                            hasStarted = true;

                        } else {

                            startAutoPlay();

                        }

                    }
                );

            },
            {
                threshold: 0.05,
            }
        );


    observer.observe(section);


    /*==================================================
        BORDER BEAM ANIMATION
    ==================================================*/

    const testimonialCards =
        section.querySelectorAll(
            ".course-testimonial-card"
        );


    testimonialCards.forEach((card) => {

        const beam =
            card.querySelector(
                ".course-testimonial-beam"
            );

        if (!beam) {
            return;
        }


        const light =
            beam.querySelector("span");

        if (!light) {
            return;
        }


        let angle = 0;


        function animateBeam() {

            angle += 0.8;


            const radiusX =
                card.offsetWidth / 2;


            const radiusY =
                card.offsetHeight / 2;


            const radians =
                (angle * Math.PI) / 180;


            const x =
                radiusX +
                Math.cos(radians) *
                radiusX;


            const y =
                radiusY +
                Math.sin(radians) *
                radiusY;


            light.style.left =
                `${x}px`;


            light.style.top =
                `${y}px`;


            requestAnimationFrame(
                animateBeam
            );

        }


        animateBeam();

    });


    /*==================================================
        INITIALIZE
    ==================================================*/

    visibleCards =
        getVisibleCards();


    if (current > getMaxIndex()) {

        current = 0;

    }


    updateSlider(false);

});