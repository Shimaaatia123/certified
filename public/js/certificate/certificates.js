"use strict";

/*=====================================================================
#
#                        HERO SECTION
#
#======================================================================*/

/*=====================================================================
#
#                          STARS
#
#======================================================================*/

function initStars() {
    const stars = document.querySelectorAll(".cert-hero__star");

    stars.forEach((star) => {
        star.style.left = Math.random() * 100 + "%";
        star.style.top = Math.random() * 100 + "%";
        star.style.animationDuration = 2 + Math.random() * 5 + "s";
        star.style.animationDelay = Math.random() * 5 + "s";
    });

    const sparkles = document.querySelectorAll(".cert-hero__sparkle");

    sparkles.forEach((sparkle) => {
        sparkle.style.left = Math.random() * 100 + "%";
        sparkle.style.animationDelay = Math.random() * 4 + "s";
        sparkle.style.animationDuration = 2 + Math.random() * 3 + "s";
    });

    const orbs = document.querySelectorAll(".cert-hero__orb");

    orbs.forEach((orb) => {
        const size = 10 + Math.random() * 35;

        orb.style.width = size + "px";
        orb.style.height = size + "px";
        orb.style.left = Math.random() * 100 + "%";
        orb.style.top = Math.random() * 100 + "%";
        orb.style.animationDuration = 8 + Math.random() * 10 + "s";
        orb.style.animationDelay = Math.random() * 5 + "s";
    });

    const particles = document.querySelectorAll(".cert-hero__particle");

    particles.forEach((particle) => {
        particle.style.left = Math.random() * 100 + "%";
        particle.style.top = Math.random() * 100 + "%";
        particle.style.animationDuration = 8 + Math.random() * 12 + "s";
        particle.style.animationDelay = Math.random() * 10 + "s";
    });
}

/*=====================================================================
#
#                        MOUSE GLOW
#
#======================================================================*/

function initMouseGlow() {
    const hero = document.querySelector(".cert-hero");
    const glow = document.querySelector(".cert-hero__mouse-glow");

    if (!hero || !glow) return;

    hero.addEventListener("mousemove", (e) => {
        const rect = hero.getBoundingClientRect();

        glow.style.left = `${e.clientX - rect.left}px`;
        glow.style.top = `${e.clientY - rect.top}px`;
        glow.style.opacity = "1";
        glow.style.transform = "translate(-50%, -50%)";
    });

    hero.addEventListener("mouseleave", () => {
        glow.style.opacity = "0";
    });
} 

/*=====================================================================
#
#                     AURORA PARALLAX
#
#======================================================================*/

function initAuroraParallax() {
    const hero = document.querySelector(".cert-hero");
    const aurora = document.querySelector(".cert-hero__aurora");
    const beam = document.querySelector(".cert-hero__light-beam");

    if (!hero || !aurora || !beam) return;

    hero.addEventListener("mousemove", (e) => {
        const rect = hero.getBoundingClientRect();

        const x = (e.clientX - rect.left) / rect.width - 0.5;
        const y = (e.clientY - rect.top) / rect.height - 0.5;

        aurora.style.transform = `
            translate(${x * 60}px, ${y * 60}px)
            scale(1.05)
        `;

        beam.style.transform = `
            translateX(calc(-50% + ${x * 40}px))
            translateY(${y * 30}px)
        `;
    });

    hero.addEventListener("mouseleave", () => {
        aurora.style.transform = "";
        beam.style.transform = "";
    });
}

/*=====================================================================
#
#                         REVEAL
#
#======================================================================*/

function initReveal() {
    const elements = document.querySelectorAll(".cert-reveal");

    if (!elements.length) return;

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) return;

                entry.target.classList.add("is-visible");
                observer.unobserve(entry.target);
            });
        },
        {
            threshold: 0.15,
            rootMargin: "0px 0px -10% 0px",
        },
    );

    elements.forEach((element, index) => {
        element.style.transitionDelay = `${index * 120}ms`;
        observer.observe(element);
    });
}

/*=====================================================================
#
#                         COUNTERS
#
#======================================================================*/

function initCounters() {
    const counters = document.querySelectorAll(".cert-counter");

    if (!counters.length) return;

    const observer = new IntersectionObserver(
        (entries, observer) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) return;

                const counter = entry.target;
                const target = parseInt(counter.dataset.target);
                const suffix = counter.dataset.suffix || "";

                let start = null;
                const duration = 1800;

                function update(timestamp) {
                    if (!start) start = timestamp;

                    const progress = Math.min(
                        (timestamp - start) / duration,
                        1,
                    );

                    counter.textContent =
                        Math.floor(progress * target).toLocaleString() + suffix;

                    if (progress < 1) {
                        requestAnimationFrame(update);
                    } else {
                        counter.textContent = target.toLocaleString() + suffix;
                    }
                }

                requestAnimationFrame(update);
                observer.unobserve(counter);
            });
        },
        {
            threshold: 0.5,
        },
    );

    counters.forEach((counter) => observer.observe(counter));
}

/*=====================================================================
#
#                     HERO PARALLAX
#
#======================================================================*/

/*=====================================================================
#
#                     HERO PARALLAX
#
#                     Performance Optimized
#
#======================================================================*/

function initHeroParallax() {

    const hero = document.querySelector(".cert-hero");
    const card = document.querySelector(".cert-hero__certificate");
    const floatingCards = document.querySelectorAll(
        ".cert-hero__floating"
    );

    if (!hero || !card) return;

    let mouseX = 0;
    let mouseY = 0;

    let currentX = 0;
    let currentY = 0;

    let animationFrame = null;
    let isPointerInside = false;

    function updateParallax() {

        currentX += (mouseX - currentX) * 0.08;
        currentY += (mouseY - currentY) * 0.08;

        card.style.transform = `
            perspective(1800px)
            rotateY(${currentX * 8}deg)
            rotateX(${-currentY * 8}deg)
            translateZ(10px)
        `;

        floatingCards.forEach((item, index) => {

            const speed = (index + 1) * 8;

            item.style.transform = `
                translate3d(
                    ${currentX * speed}px,
                    ${currentY * speed}px,
                    0
                )
            `;
        });

        const stillMoving =
            Math.abs(mouseX - currentX) > 0.001 ||
            Math.abs(mouseY - currentY) > 0.001;

        if (isPointerInside || stillMoving) {

            animationFrame =
                requestAnimationFrame(updateParallax);

        } else {

            animationFrame = null;
        }
    }

    function requestParallaxUpdate() {

        if (animationFrame !== null) return;

        animationFrame =
            requestAnimationFrame(updateParallax);
    }

    hero.addEventListener(
        "pointerenter",
        () => {

            isPointerInside = true;

            requestParallaxUpdate();
        },
        { passive: true }
    );

    hero.addEventListener(
        "pointermove",
        (event) => {

            const rect = hero.getBoundingClientRect();

            mouseX =
                ((event.clientX - rect.left) / rect.width - 0.5) * 2;

            mouseY =
                ((event.clientY - rect.top) / rect.height - 0.5) * 2;

            requestParallaxUpdate();
        },
        { passive: true }
    );

    hero.addEventListener(
        "pointerleave",
        () => {

            isPointerInside = false;

            mouseX = 0;
            mouseY = 0;

            requestParallaxUpdate();
        },
        { passive: true }
    );
}

/*=====================================================================
#
#                 CERTIFICATE VERIFICATION JOURNEY
#
#======================================================================*/
/*=====================================================================

    CERTIFICATE VERIFICATION JOURNEY

    File Purpose

    Controls all Journey animations.

    Functions

    initJourneyStars()
    initJourneySparkles()
    initJourneyMouseGlow()
    initJourneyReveal()

======================================================================*/
/*=====================================================================
#
#                      JOURNEY STARS
#
#======================================================================*/

function initJourneyStars() {
    const stars = document.querySelectorAll(".cert-journey__star");

    if (!stars.length) return;

    stars.forEach((star) => {
        star.style.left = Math.random() * 100 + "%";
        star.style.top = Math.random() * 100 + "%";

        const size = 2 + Math.random() * 4;

        star.style.width = size + "px";
        star.style.height = size + "px";

        star.style.animationDelay = (Math.random() * 6).toFixed(2) + "s";

        star.style.animationDuration = (3 + Math.random() * 4).toFixed(2) + "s";
    });
}

/*=====================================================================
#
#                    JOURNEY SPARKLES
#
#======================================================================*/

function initJourneySparkles() {
    const sparkles = document.querySelectorAll(".cert-journey__sparkle");

    if (!sparkles.length) return;

    sparkles.forEach((sparkle) => {
        const size = 10 + Math.random() * 10;

        sparkle.style.width = size + "px";
        sparkle.style.height = size + "px";

        sparkle.style.left = 5 + Math.random() * 90 + "%";
        sparkle.style.top = 5 + Math.random() * 90 + "%";

        sparkle.style.animationDelay = (Math.random() * 5).toFixed(2) + "s";

        sparkle.style.animationDuration =
            (3 + Math.random() * 3).toFixed(2) + "s";
    });
}

/*=====================================================================
#
#                  JOURNEY MOUSE GLOW
#
#======================================================================*/

/*=====================================================================
#
#                  JOURNEY MOUSE GLOW
#
#                  Performance Optimized
#
#======================================================================*/

function initJourneyMouseGlow() {

    const section =
        document.querySelector(".cert-journey");

    const glow =
        document.querySelector(".cert-journey__mouse-glow");

    if (!section || !glow) return;

    let rect = null;

    let mouseX = 0;
    let mouseY = 0;

    let frame = null;
    let active = false;

    function updateGlow() {

        if (!active) {
            frame = null;
            return;
        }

        glow.style.transform = `
            translate3d(
                ${mouseX}px,
                ${mouseY}px,
                0
            )
            translate(-50%, -50%)
        `;

        frame = null;
    }

    function requestGlowUpdate() {

        if (frame !== null) return;

        frame =
            requestAnimationFrame(updateGlow);
    }

    section.addEventListener(
        "pointerenter",
        (event) => {

            rect = section.getBoundingClientRect();

            mouseX =
                event.clientX - rect.left;

            mouseY =
                event.clientY - rect.top;

            active = true;

            glow.style.opacity = "1";

            requestGlowUpdate();
        },
        { passive: true }
    );

    section.addEventListener(
        "pointermove",
        (event) => {

            if (!rect) {
                rect = section.getBoundingClientRect();
            }

            mouseX =
                event.clientX - rect.left;

            mouseY =
                event.clientY - rect.top;

            requestGlowUpdate();
        },
        { passive: true }
    );

    section.addEventListener(
        "pointerleave",
        () => {

            active = false;

            glow.style.opacity = "0";

            rect = null;

            if (frame !== null) {
                cancelAnimationFrame(frame);
                frame = null;
            }
        },
        { passive: true }
    );

    window.addEventListener(
        "resize",
        () => {
            rect = null;
        },
        { passive: true }
    );
}

/*=====================================================================
#
#                  JOURNEY VIEWPORT ACTIVATION
#
#======================================================================*/

function initJourneyPerformance() {

    const section =
        document.querySelector(".cert-journey");

    if (!section) return;

    if (!("IntersectionObserver" in window)) {
        section.classList.add("is-active");
        return;
    }

    const observer =
        new IntersectionObserver(
            (entries, obs) => {

                entries.forEach((entry) => {

                    if (!entry.isIntersecting) return;

                    section.classList.add("is-active");

                    obs.unobserve(section);
                });
            },
            {
                threshold: 0.05,
                rootMargin: "250px 0px 250px 0px",
            }
        );

    observer.observe(section);
}

/*=====================================================================
#
#                  JOURNEY REVEAL
#
#======================================================================*/

function initJourneyReveal() {
    const revealCards = document.querySelectorAll(".cert-reveal");

    if (!revealCards.length) return;

    const observer = new IntersectionObserver(
        (entries, obs) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) return;

                entry.target.classList.add("is-visible");

                obs.unobserve(entry.target);
            });
        },
        {
            threshold:0.08,
            rootMargin:"0px 0px -6% 0px",
        },
    );

    revealCards.forEach((card) => observer.observe(card));
}

document.addEventListener("DOMContentLoaded", () => {
    /* Hero */
    initStars();
    initMouseGlow();
    initAuroraParallax();
    initReveal();
    initCounters();
    initHeroParallax();

    /* Journey */
    initJourneyStars();
    initJourneySparkles();
    initJourneyMouseGlow();
    initJourneyReveal();
    initJourneyPerformance();
});

/*=====================================================================
#
#                    CERTIFICATE TRUST SYSTEM
#
#======================================================================*/
