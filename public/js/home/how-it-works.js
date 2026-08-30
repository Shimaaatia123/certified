document.addEventListener("DOMContentLoaded", () => {

    const section = document.querySelector(".how-section");

    if (!section) return;

    const steps = section.querySelectorAll(".how-reveal-step");
    const line = section.querySelector(".steps-line");

    if (!line || steps.length === 0) return;

    const observer = new IntersectionObserver(
        (entries) => {

            entries.forEach((entry) => {

                if (!entry.isIntersecting) return;

                line.classList.add("active");

                steps.forEach((step, index) => {

                    step.style.transitionDelay = `${index * 180}ms`;

                    step.classList.add("active");

                });

                observer.unobserve(section);
            });

        },
        {
            threshold: 0.25,
        }
    );

    observer.observe(section);
});