/* ================================================================
   CERTIFIED — CERTIFICATE VERIFICATION
   Frontend ↔ Certificate Verification API
================================================================ */

(() => {
    "use strict";

    const ROOT_SELECTOR = "[data-cvd-root]";

    const STATUS_CODES = {
        BAD_REQUEST: 400,
        NOT_FOUND: 404,
        VALIDATION: 422,
        RATE_LIMIT: 429,
    };

    const initVerificationDemo = (root) => {
        /* =========================================================
           ELEMENTS
        ========================================================== */

        const form = root.querySelector("[data-cvd-form]");

        const input = root.querySelector("[data-cvd-input]");

        const submit = root.querySelector("[data-cvd-submit]");

        const submitContent = root.querySelector("[data-cvd-submit-content]");

        const loadingContent = root.querySelector("[data-cvd-loading]");

        const error = root.querySelector("[data-cvd-error]");

        const announce = root.querySelector("[data-cvd-announcement]");

        const states = {
            idle: root.querySelector('[data-cvd-state="idle"]'),

            loading: root.querySelector('[data-cvd-state="loading"]'),

            result: root.querySelector('[data-cvd-state="result"]'),

            error: root.querySelector('[data-cvd-state="error"]'),
        };

        const endpoint = root.dataset.cvdEndpoint;

        /* =========================================================
           SAFETY CHECK
        ========================================================== */

        if (!form || !input || !submit || !endpoint) {
            return;
        }

        let controller = null;

        /* =========================================================
           STATE MANAGEMENT
        ========================================================== */

        const setState = (stateName) => {
            Object.entries(states).forEach(([name, element]) => {
                if (!element) {
                    return;
                }

                element.hidden = name !== stateName;
            });
        };

        /* =========================================================
           LOADING
        ========================================================== */

        const setLoading = (loading) => {
            submit.disabled = loading;

            if (submitContent) {
                submitContent.hidden = loading;
            }

            if (loadingContent) {
                loadingContent.hidden = !loading;
            }
        };

        /* =========================================================
           ERROR
        ========================================================== */

        const setError = (message = "") => {
            if (!error) {
                return;
            }

            error.textContent = message;
            error.hidden = !message;
        };

        /* =========================================================
           ACCESSIBILITY
        ========================================================== */

        const announceStatus = (message = "") => {
            if (announce) {
                announce.textContent = message;
            }
        };

        /* =========================================================
           NORMALIZE CERTIFICATE CODE
        ========================================================== */

        const normalizeValue = (value) => {
            return String(value ?? "")
                .trim()
                .replace(/\s+/g, "")
                .toUpperCase();
        };

        /* =========================================================
           CLIENT VALIDATION
        ========================================================== */

        const validateCertificateId = (certificateId) => {
            if (!certificateId) {
                return {
                    valid: false,
                    message:
                        window.cvdTranslations?.required ??
                        "Please enter a certificate ID.",
                };
            }

            if (certificateId.length < 4) {
                return {
                    valid: false,
                    message:
                        window.cvdTranslations?.invalid ??
                        "Please enter a valid certificate ID.",
                };
            }

            return {
                valid: true,
                message: "",
            };
        };

        /* =========================================================
           UPDATE RESULT FIELD
        ========================================================== */

        const updateField = (field, value) => {
            const element = root.querySelector(`[data-cvd-field="${field}"]`);

            if (!element) {
                return;
            }

            element.textContent =
                value !== null && value !== undefined && value !== ""
                    ? value
                    : "—";
        };

        /* =========================================================
           UPDATE CERTIFICATE RESULT
        ========================================================== */

        const updateResult = (certificate) => {
            if (!certificate || typeof certificate !== "object") {
                throw new Error(
                    window.cvdTranslations?.serverError ??
                        "Invalid certificate response.",
                );
            }

            updateField("student", certificate.student);

            updateField("course", certificate.course);

            updateField("issued", certificate.issued);

            /*
             * IMPORTANT:
             * Status comes ONLY from Backend.
             *
             * We NEVER assume VALID.
             */

            updateField("status", certificate.status);

            updateField("hash", certificate.hash);

            /* =====================================================
   QR CODE
====================================================== */

            const qrImage = root.querySelector("[data-cvd-qr]");

            const qrPlaceholder = root.querySelector(
                "[data-cvd-qr-placeholder]",
            );

            const qrBox = root.querySelector(".cvd__qr-box");

            if (qrBox && certificate.qr_url && typeof QRCode !== "undefined") {
                /*
                 * Remove previously generated QR.
                 */
                const existingQr = qrBox.querySelector(
                    "[data-cvd-generated-qr]",
                );

                if (existingQr) {
                    existingQr.remove();
                }

                /*
                 * Hide the old placeholder image element.
                 */
                if (qrImage) {
                    qrImage.hidden = true;
                }

                /*
                 * Create a dedicated QR container.
                 */
                const qrElement = document.createElement("div");

                qrElement.dataset.cvdGeneratedQr = "true";

                qrBox.appendChild(qrElement);

                /*
                 * Generate a real QR code from the
                 * verification URL returned by Backend.
                 */
                new QRCode(qrElement, {
                    text: certificate.qr_url,
                    width: 128,
                    height: 128,
                    correctLevel: QRCode.CorrectLevel.H,
                });

                if (qrPlaceholder) {
                    qrPlaceholder.hidden = true;
                }
            } else {
                if (qrImage) {
                    qrImage.hidden = true;
                }

                if (qrPlaceholder) {
                    qrPlaceholder.hidden = false;
                }
            }
        };

        /* =========================================================
           API ERROR MESSAGE
        ========================================================== */

        const getErrorMessage = async (response) => {
            let data = null;

            try {
                data = await response.json();
            } catch {
                data = null;
            }

            if (response.status === STATUS_CODES.NOT_FOUND) {
                return (
                    data?.message ??
                    window.cvdTranslations?.notFound ??
                    "Certificate not found."
                );
            }

            if (
                response.status === STATUS_CODES.BAD_REQUEST ||
                response.status === STATUS_CODES.VALIDATION
            ) {
                return (
                    data?.message ??
                    window.cvdTranslations?.invalid ??
                    "Please enter a valid certificate ID."
                );
            }

            if (response.status === STATUS_CODES.RATE_LIMIT) {
                return (
                    window.cvdTranslations?.rateLimit ??
                    "Too many verification attempts. Please try again later."
                );
            }

            return (
                data?.message ??
                window.cvdTranslations?.serverError ??
                "Unable to verify the certificate right now."
            );
        };

        /* =========================================================
           CALL VERIFICATION API
        ========================================================== */

        const verify = async (certificateId) => {
            if (controller) {
                controller.abort();
            }

            controller = new AbortController();

            const url = new URL(endpoint, window.location.origin);

            url.searchParams.set("certificate_id", certificateId);

            const response = await fetch(url.toString(), {
                method: "GET",

                headers: {
                    Accept: "application/json",

                    "X-Requested-With": "XMLHttpRequest",
                },

                credentials: "same-origin",

                signal: controller.signal,
            });

            if (!response.ok) {
                const message = await getErrorMessage(response);

                const errorInstance = new Error(message);

                errorInstance.status = response.status;

                throw errorInstance;
            }

            const data = await response.json();

            /*
             * Backend contract:
             *
             * {
             *     success: true,
             *     certificate: {
             *         student,
             *         course,
             *         issued,
             *         status,
             *         hash,
             *         qr_url
             *     }
             * }
             */

            if (data?.success !== true || !data?.certificate) {
                throw new Error(
                    data?.message ??
                        window.cvdTranslations?.serverError ??
                        "Invalid verification response.",
                );
            }

            return data;
        };

        /* =========================================================
           SHOW SUCCESS RESULT
        ========================================================== */

        const showResult = (data) => {
            const certificate = data.certificate;

            updateResult(certificate);

            setState("result");

            announceStatus(
                window.cvdTranslations?.successAnnounce ??
                    "Certificate verified successfully.",
            );

            const resultHeading = root.querySelector(
                "[data-cvd-result-heading]",
            );

            if (resultHeading) {
                requestAnimationFrame(() => {
                    resultHeading.focus();
                });
            }
        };

        /* =========================================================
           FORM SUBMIT
        ========================================================== */

        const handleSubmit = async (event) => {
            /*
             * Prevent normal browser navigation.
             */

            event.preventDefault();

            setError("");

            const certificateId = normalizeValue(input.value);

            input.value = certificateId;

            const validation = validateCertificateId(certificateId);

            if (!validation.valid) {
                setState("idle");

                setError(validation.message);

                announceStatus(validation.message);

                input.focus();

                return;
            }

            setLoading(true);

            setState("loading");

            announceStatus(
                window.cvdTranslations?.loadingAnnounce ??
                    "Verifying certificate.",
            );

            try {
                const response = await verify(certificateId);

                showResult(response);
            } catch (requestError) {
                /*
                 * Ignore intentionally cancelled requests.
                 */

                if (requestError?.name === "AbortError") {
                    return;
                }

                setState("error");

                setError(
                    requestError?.message ?? "Certificate verification failed.",
                );

                announceStatus(
                    requestError?.message ?? "Certificate verification failed.",
                );
            } finally {
                setLoading(false);
            }
        };

        /* =========================================================
           RETRY
        ========================================================== */

        const retry = root.querySelector("[data-cvd-retry]");

        if (retry) {
            retry.addEventListener("click", () => {
                setState("idle");

                setError("");

                announceStatus("");

                input.focus();
            });
        }

        /* =========================================================
           INPUT
        ========================================================== */

        input.addEventListener("input", () => {
            setError("");

            if (states.error && !states.error.hidden) {
                setState("idle");
            }
        });

        /* =========================================================
           FORM SUBMIT LISTENER
        ========================================================== */

        form.addEventListener("submit", handleSubmit);

        /* =========================================================
           INITIAL STATE
        ========================================================== */

        setState("idle");

        setLoading(false);

        setError("");

        console.info("Certificate Verification initialized:", endpoint);
    };

    /* ================================================================
       BOOT
    ================================================================ */

    const boot = () => {
        document.querySelectorAll(ROOT_SELECTOR).forEach(initVerificationDemo);
    };

    /* ================================================================
       DOM READY
    ================================================================ */

    if (document.readyState === "loading") {
        document.addEventListener("DOMContentLoaded", boot, {
            once: true,
        });
    } else {
        boot();
    }
})();
