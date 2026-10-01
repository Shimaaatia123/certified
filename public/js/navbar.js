document.addEventListener("DOMContentLoaded", () => {
    /* ==========================================================
                        NAVBAR SCROLL
    ========================================================== */

    const navbar = document.getElementById("navbar");

    if (navbar) {
        const handleScroll = () => {
            navbar.classList.toggle("scrolled", window.scrollY > 40);
        };

        handleScroll();

        window.addEventListener("scroll", handleScroll, { passive: true });
    }

    /* ==========================================================
                        ELEMENTS
    ========================================================== */

    const mobileToggle = document.getElementById("mobileToggle");
    const mobileMenu = document.getElementById("mobileMenu");
    const mobileOverlay = document.getElementById("mobileOverlay");
    const mobileClose = document.getElementById("mobileClose");

    const userButton = document.getElementById("userMenuButton");
    const userDropdown = document.getElementById("userDropdown");

    const languageButton = document.getElementById("navbarLanguageButton");
    const languageDropdown = document.getElementById("navbarLanguageDropdown");

    /* ==========================================================
                    MOBILE MENU
    ========================================================== */

    function openMobileMenu() {
        mobileMenu?.classList.add("active");
        mobileOverlay?.classList.add("active");
        mobileToggle?.setAttribute("aria-expanded", "true");
        mobileMenu?.setAttribute("aria-hidden", "false");
        document.body.style.overflow = "hidden";
    }

    function closeMobileMenu() {
        mobileMenu?.classList.remove("active");
        mobileOverlay?.classList.remove("active");
        mobileToggle?.setAttribute("aria-expanded", "false");
        mobileMenu?.setAttribute("aria-hidden", "true");
        document.body.style.overflow = "";
    }

    mobileToggle?.addEventListener("click", openMobileMenu);
    mobileClose?.addEventListener("click", closeMobileMenu);
    mobileOverlay?.addEventListener("click", closeMobileMenu);

    /* ==========================================================
                    DROPDOWN HELPERS
    ========================================================== */

    function setDropdown(button, dropdown, open) {
        if (!button || !dropdown) {
            return;
        }

        dropdown.classList.toggle("show", open);
        button.classList.toggle("active", open);
        button.setAttribute("aria-expanded", open ? "true" : "false");
    }

    function closeUserMenu() {
        setDropdown(userButton, userDropdown, false);
    }

    function closeLanguageMenu() {
        setDropdown(languageButton, languageDropdown, false);
    }

    function bindDropdown(button, dropdown, closeOther) {
        if (!button || !dropdown) {
            return;
        }

        button.addEventListener("click", (event) => {
            event.stopPropagation();

            const willOpen = !dropdown.classList.contains("show");

            if (willOpen) {
                closeOther();
            }

            setDropdown(button, dropdown, willOpen);
        });

        dropdown.addEventListener("click", (event) => {
            event.stopPropagation();
        });
    }

    bindDropdown(userButton, userDropdown, closeLanguageMenu);
    bindDropdown(languageButton, languageDropdown, closeUserMenu);

    /* ==========================================================
                    CLICK OUTSIDE
    ========================================================== */

    document.addEventListener("click", () => {
        closeUserMenu();
        closeLanguageMenu();
    });

    /* ==========================================================
                        ESCAPE
    ========================================================== */

    document.addEventListener("keydown", (event) => {
        if (event.key !== "Escape") {
            return;
        }

        if (languageDropdown?.classList.contains("show")) {
            languageButton?.focus();
        } else if (userDropdown?.classList.contains("show")) {
            userButton?.focus();
        }

        closeUserMenu();
        closeLanguageMenu();
        closeMobileMenu();
    });

    /* ==========================================================
            CLOSE EVERYTHING WHEN SWITCHING TO DESKTOP
    ========================================================== */

    window.matchMedia("(min-width: 993px)").addEventListener("change", (event) => {
        if (event.matches) {
            closeMobileMenu();
        }
    });

    /* ==========================================================
                CLOSE MOBILE MENU ON LINK CLICK
    ========================================================== */

    document
        .querySelectorAll(".mobile-nav a, .mobile-language-option, .mobile-dashboard")
        .forEach((link) => {
            link.addEventListener("click", closeMobileMenu);
        });
});