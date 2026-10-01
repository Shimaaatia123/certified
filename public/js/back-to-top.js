/* ==========================================================
                    BACK TO TOP
========================================================== */

document.addEventListener("DOMContentLoaded", () => {
    const button = document.getElementById("backToTop");

    if (!button) return;

    const progressCircle = button.querySelector(".progress-ring-circle");

    const radius = progressCircle.r.baseVal.value;

    const circumference = 2 * Math.PI * radius;

    progressCircle.style.strokeDasharray = circumference;

    progressCircle.style.strokeDashoffset = circumference;

    function updateButton() {
        const scrollTop = window.scrollY;

        const documentHeight =
            document.documentElement.scrollHeight - window.innerHeight;

        const progress = documentHeight > 0 ? scrollTop / documentHeight : 0;

        const offset = circumference - progress * circumference;

        progressCircle.style.strokeDashoffset = offset;

        button.classList.toggle("show", scrollTop > 400);
    }

    let ticking = false;

    window.addEventListener("scroll", () => {
        if (!ticking) {
            window.requestAnimationFrame(() => {
                updateButton();

                ticking = false;
            });

            ticking = true;
        }
    });

    updateButton();

    button.addEventListener("click", () => {
        const ripple = document.createElement("span");

        ripple.className = "ripple";

        button.appendChild(ripple);

        ripple.animate(
            [
                {
                    transform: "scale(0)",

                    opacity: 1,
                },

                {
                    transform: "scale(9)",

                    opacity: 0,
                },
            ],

            {
                duration: 650,

                easing: "ease-out",
            },
        );

        setTimeout(() => {
            ripple.remove();
        }, 650);

        window.scrollTo({
            top: 0,

            behavior: "smooth",
        });
    });
});
