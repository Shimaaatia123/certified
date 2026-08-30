document.addEventListener("DOMContentLoaded", () => {
    const section = document.querySelector(".course-cta-section");
    const card = document.querySelector(".course-cta-card");

    if (!section || !card) return;

    /*==========================================
                REVEAL
    ==========================================*/

    card.style.opacity = "0";
    card.style.transform = "translateY(25px)";

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) return;

                card.style.transition =
                    "opacity .45s ease, transform .45s cubic-bezier(.22,.61,.36,1)";

                card.style.opacity = "1";
                card.style.transform = "translateY(0)";

                observer.disconnect();
            });
        },
        {
            threshold: 0,
            rootMargin: "200px 0px",
        },
    );

    observer.observe(card);

    /*==========================================
                MOUSE LIGHT
    ==========================================*/

    section.addEventListener("pointermove", (e) => {
        const rect = section.getBoundingClientRect();

        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;

        section.style.setProperty("--mouse-x", `${x}px`);
        section.style.setProperty("--mouse-y", `${y}px`);
    });
});