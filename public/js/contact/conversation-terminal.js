/* =========================================================
   CERTIFIED — SECURE CONVERSATION TERMINAL
   Section 03
   ========================================================= */

document.addEventListener("DOMContentLoaded", () => {
    const terminal = document.querySelector("[data-conversation-terminal]");

    if (!terminal) {
        return;
    }

    const form = terminal.querySelector("[data-conversation-form]");

    const submitButton = terminal.querySelector("[data-submit-button]");

    const submitText = terminal.querySelector("[data-submit-text]");

    const formStatus = terminal.querySelector("[data-form-status]");

    /* =====================================================
       MOUSE LIGHT
       ===================================================== */

    const supportsPointer = window.matchMedia("(pointer: fine)").matches;

    if (supportsPointer) {
        terminal.addEventListener("pointermove", (event) => {
            const rect = terminal.getBoundingClientRect();

            const x = event.clientX - rect.left;
            const y = event.clientY - rect.top;

            terminal.style.setProperty("--terminal-mouse-x", `${x}px`);

            terminal.style.setProperty("--terminal-mouse-y", `${y}px`);

            terminal.classList.add("is-pointer-active");
        });

        terminal.addEventListener("pointerleave", () => {
            terminal.classList.remove("is-pointer-active");
        });
    }

    /* =====================================================
       FIELD STATE
       ===================================================== */

    const fields = terminal.querySelectorAll(".conversation-terminal__field");

    fields.forEach((field) => {
        const input = field.querySelector("input, textarea");

        if (!input) {
            return;
        }

        input.addEventListener("input", () => {
            updateTerminalState();
        });
    });

    function updateTerminalState() {
        const name = form.querySelector('[name="name"]');

        const email = form.querySelector('[name="email"]');

        const message = form.querySelector('[name="message"]');

        /* Identity */

        const identityCard = terminal.querySelector('[data-status="identity"]');

        if (
            name &&
            name.value.trim().length >= 2 &&
            email &&
            email.validity.valid
        ) {
            identityCard.classList.add("is-ready");
        } else {
            identityCard.classList.remove("is-ready");
        }

        /* Delivery */

        const deliveryCard = terminal.querySelector('[data-status="delivery"]');

        if (message && message.value.trim().length >= 10) {
            deliveryCard.classList.add("is-ready");
        } else {
            deliveryCard.classList.remove("is-ready");
        }
    }

    /* =====================================================
       FORM SUBMIT STATE
       ===================================================== */

    if (form) {
        form.addEventListener("submit", () => {
            if (!form.checkValidity()) {
                return;
            }

            if (submitButton) {
                submitButton.disabled = true;

                submitButton.style.pointerEvents = "none";
            }

            if (submitText) {
                submitText.textContent =
                    submitText.dataset.sending || "TRANSMITTING...";
            }

            if (formStatus) {
                formStatus.textContent =
                    formStatus.dataset.transmitting ||
                    "Preparing secure transmission...";
            }
        });
    }
});
