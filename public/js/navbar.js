
document.addEventListener("DOMContentLoaded", () => {


    /* ==========================================================
                            NAVBAR
    ========================================================== */

    const navbar = document.getElementById("navbar");


    if (navbar) {

        function handleScroll() {

            if (window.scrollY > 40) {

                navbar.classList.add("scrolled");

            } else {

                navbar.classList.remove("scrolled");

            }

        }


        handleScroll();


        window.addEventListener(
            "scroll",
            handleScroll
        );

    }


    /* ==========================================================
                        MOBILE MENU
    ========================================================== */

    const mobileToggle =
        document.getElementById("mobileToggle");

    const mobileMenu =
        document.getElementById("mobileMenu");

    const mobileOverlay =
        document.getElementById("mobileOverlay");

    const mobileClose =
        document.getElementById("mobileClose");


    mobileToggle?.addEventListener("click", () => {

        mobileMenu?.classList.add("active");

        mobileOverlay?.classList.add("active");

        document.body.style.overflow = "hidden";

    });


    function closeMenu() {

        mobileMenu?.classList.remove("active");

        mobileOverlay?.classList.remove("active");

        document.body.style.overflow = "";

    }


    mobileClose?.addEventListener(
        "click",
        closeMenu
    );


    mobileOverlay?.addEventListener(
        "click",
        closeMenu
    );


    /* ==========================================================
                            USER MENU
    ========================================================== */

    const userButton =
        document.getElementById("userMenuButton");

    const userDropdown =
        document.getElementById("userDropdown");


    /*
     * Only initialize User Menu
     * when the user is authenticated.
     */

    if (userButton && userDropdown) {


        /* ------------------------------------------------------
                            OPEN / CLOSE
        ------------------------------------------------------ */

        userButton.addEventListener(
            "click",
            (event) => {

                event.stopPropagation();


                const isOpen =
                    userDropdown.classList.contains("show");


                if (isOpen) {

                    closeUserMenu();

                } else {

                    openUserMenu();

                }

            }
        );


        /* ------------------------------------------------------
                        OPEN USER MENU
        ------------------------------------------------------ */

        function openUserMenu() {

            userDropdown.classList.add("show");

            userButton.classList.add("active");

            userButton.setAttribute(
                "aria-expanded",
                "true"
            );

        }


        /* ------------------------------------------------------
                        CLOSE USER MENU
        ------------------------------------------------------ */

        function closeUserMenu() {

            userDropdown.classList.remove("show");

            userButton.classList.remove("active");

            userButton.setAttribute(
                "aria-expanded",
                "false"
            );

        }


        /* ------------------------------------------------------
                    CLICK INSIDE DROPDOWN
        ------------------------------------------------------ */

        userDropdown.addEventListener(
            "click",
            (event) => {

                event.stopPropagation();

            }
        );


        /* ------------------------------------------------------
                    CLICK OUTSIDE
        ------------------------------------------------------ */

        document.addEventListener(
            "click",
            (event) => {

                if (
                    !userButton.contains(event.target) &&
                    !userDropdown.contains(event.target)
                ) {

                    closeUserMenu();

                }

            }
        );


        /* ------------------------------------------------------
                            ESCAPE
        ------------------------------------------------------ */

        document.addEventListener(
            "keydown",
            (event) => {

                if (event.key === "Escape") {

                    closeUserMenu();

                }

            }
        );

    }

});

