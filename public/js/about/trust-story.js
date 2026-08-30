/* =========================================================
   CERTIFIED — TRUST STORY
   Runtime language + interaction controller
   ========================================================= */

(() => {
    "use strict";

    /* =====================================================
       CONFIGURATION
       ===================================================== */
 
    const CONFIG = {
        storageKey: "certified_locale",
        defaultLanguage: "en",

        supportedLanguages: ["en", "ar"],

        rtlLanguages: ["ar"]
    };

    /* =====================================================
       TRANSLATIONS
       ===================================================== */

    const translations = {
        en: {
            eyebrow: "TRUSTED BY DESIGN",

            heading:
                "Every Certificate Tells a Story of Trust.",

            description:
                "Certified transforms digital certificates into tamper-proof assets. Our platform ensures instant verifiability, unmatched security, and seamless authentication, building a foundation of integrity for every achievement.",

            btn_primary:
                "Explore Verification",

            btn_secondary:
                "How It Works",

            badge_verified:
                "Verified",

            badge_cert_id:
                "Certificate ID",

            badge_secure:
                "Secure",

            badge_authentic:
                "Authentic",

            badge_sha:
                "SHA-256",

            badge_qr:
                "QR Verified",

            cert_title:
                "PROFESSIONAL CLOUD ARCHITECT",

            cert_subtitle:
                "CERTIFICATE",

            cert_recipient:
                "Recipient to",

            cert_name:
                "Joneth Name",

            cert_achievement:
                "Course / Achievement of certified instant verifiability, and professional achievement.",

            cert_lbl_id:
                "Certificate ID",

            cert_lbl_issued:
                "Issue Date",

            cert_lbl_expiry:
                "Expiry Date",

            cert_lbl_sig:
                "Digital Signature",

            cert_lbl_sec:
                "Security Indicator",

            language_switch:
                "تغيير إلى العربية"
        },

        ar: {
            eyebrow:
                "موثوق بالصميم",

            heading:
                "كل شهادة تحكي قصة من الثقة.",

            description:
                "منصة Certified تحول الشهادات الرقمية إلى أصول غير قابلة للتلاعب. تضمن منصتنا التحقق الفوري، والأمان العالي، والمصادقة السلسة، لبناء أركان النزاهة لكل إنجاز.",

            btn_primary:
                "استكشف التحقق",

            btn_secondary:
                "كيف نعمل",

            badge_verified:
                "مُوثّق",

            badge_cert_id:
                "معرّف الشهادة",

            badge_secure:
                "آمن",

            badge_authentic:
                "أصلي",

            badge_sha:
                "تشفير SHA-256",

            badge_qr:
                "رمز QR موثق",

            cert_title:
                "مهندس سحابي محترف",

            cert_subtitle:
                "شهادة إتمام",

            cert_recipient:
                "ممنوحة لـ",

            cert_name:
                "جونيث نيم",

            cert_achievement:
                "دورة / إنجاز موثق فورياً مع إثبات كفاءة معتمد.",

            cert_lbl_id:
                "رقم الشهادة",

            cert_lbl_issued:
                "تاريخ الإصدار",

            cert_lbl_expiry:
                "تاريخ الانتهاء",

            cert_lbl_sig:
                "التوقيع الرقمي",

            cert_lbl_sec:
                "مؤشر الأمان",

            language_switch:
                "Switch to English"
        }
    };

    /* =====================================================
       DOM HELPERS
       ===================================================== */

    const getDocument = () => document;

    const getLanguageButton = () =>
        getDocument().querySelector("#lang-toggle-btn");

    const getTranslatableElements = () =>
        getDocument().querySelectorAll(
            ".trust-story [data-i18n]"
        );

    /* =====================================================
       LANGUAGE VALIDATION
       ===================================================== */

    const isSupportedLanguage = (language) => {
        return CONFIG.supportedLanguages.includes(language);
    };

    /* =====================================================
       GET INITIAL LANGUAGE
       ===================================================== */

    const getInitialLanguage = () => {
        let savedLanguage = null;

        try {
            savedLanguage = localStorage.getItem(
                CONFIG.storageKey
            );
        } catch (error) {
            savedLanguage = null;
        }

        if (isSupportedLanguage(savedLanguage)) {
            return savedLanguage;
        }

        const browserLanguage =
            navigator.language?.slice(0, 2).toLowerCase();

        if (isSupportedLanguage(browserLanguage)) {
            return browserLanguage;
        }

        return CONFIG.defaultLanguage;
    };

    /* =====================================================
       SAVE LANGUAGE
       ===================================================== */

    const saveLanguage = (language) => {
        try {
            localStorage.setItem(
                CONFIG.storageKey,
                language
            );
        } catch (error) {
            /*
             * localStorage may be unavailable in some
             * privacy-restricted environments.
             *
             * The language switch still works normally.
             */
        }
    };

    /* =====================================================
       RTL / LTR
       ===================================================== */

    const isRTL = (language) => {
        return CONFIG.rtlLanguages.includes(language);
    };

    const applyDocumentDirection = (language) => {
        const direction = isRTL(language)
            ? "rtl"
            : "ltr";

        document.documentElement.setAttribute(
            "lang",
            language
        );

        document.documentElement.setAttribute(
            "dir",
            direction
        );

        /*
         * Helpful for browser rendering and accessibility.
         */
        document.documentElement.style.setProperty(
            "--certified-direction",
            direction
        );
    };

    /* =====================================================
       UPDATE LANGUAGE BUTTON
       ===================================================== */

    const updateLanguageButton = (language) => {
        const button = getLanguageButton();

        if (!button) {
            return;
        }

        const targetLanguage =
            language === "en"
                ? "ar"
                : "en";

        button.textContent =
            translations[language]?.language_switch ??
            "Change language";

        /*
         * Accessibility
         */
        button.setAttribute(
            "aria-label",
            targetLanguage === "ar"
                ? "Switch to Arabic"
                : "Switch to English"
        );

        button.setAttribute(
            "data-current-language",
            language
        );

        button.setAttribute(
            "data-target-language",
            targetLanguage
        );
    };

    /* =====================================================
       APPLY TRANSLATIONS
       ===================================================== */

    const applyTranslations = (language) => {
        if (!translations[language]) {
            return;
        }

        const elements =
            getTranslatableElements();

        elements.forEach((element) => {
            const key =
                element.getAttribute("data-i18n");

            if (!key) {
                return;
            }

            const translatedText =
                translations[language][key];

            if (
                typeof translatedText !== "string"
            ) {
                return;
            }

            /*
             * textContent is intentionally used instead
             * of innerHTML for security.
             */
            element.textContent =
                translatedText;
        });
    };

    /* =====================================================
       UPDATE DOCUMENT STATE
       ===================================================== */

    const applyLanguage = (
        language,
        options = {}
    ) => {
        const {
            persist = true
        } = options;

        if (!isSupportedLanguage(language)) {
            language = CONFIG.defaultLanguage;
        }

        applyDocumentDirection(language);

        applyTranslations(language);

        updateLanguageButton(language);

        if (persist) {
            saveLanguage(language);
        }

        /*
         * Expose the current language for other
         * Certified components if needed later.
         */
        document.documentElement.dataset.language =
            language;

        /*
         * Custom event allows other components
         * to react without tightly coupling JS files.
         */
        document.dispatchEvent(
            new CustomEvent(
                "certified:languageChanged",
                {
                    detail: {
                        language,
                        direction: isRTL(language)
                            ? "rtl"
                            : "ltr"
                    }
                }
            )
        );
    };

    /* =====================================================
       LANGUAGE TOGGLE
       ===================================================== */

    const toggleLanguage = () => {
        const currentLanguage =
            document.documentElement.lang ||
            CONFIG.defaultLanguage;

        const nextLanguage =
            currentLanguage === "en"
                ? "ar"
                : "en";

        applyLanguage(nextLanguage);
    };

    /* =====================================================
       BUTTON EVENT
       ===================================================== */

    const bindLanguageToggle = () => {
        const button =
            getLanguageButton();

        if (!button) {
            return;
        }

        /*
         * Prevent duplicate listeners if this script
         * is accidentally initialized more than once.
         */
        if (
            button.dataset.languageBound === "true"
        ) {
            return;
        }

        button.dataset.languageBound = "true";

        button.addEventListener(
            "click",
            toggleLanguage
        );

        /*
         * Keyboard support
         * is already provided by <button>,
         * but we explicitly handle Enter/Space
         * only if needed by custom markup.
         */
    };

    /* =====================================================
       CERTIFICATE HOVER MICRO-INTERACTION
       ===================================================== */

    const initCertificateInteraction = () => {
        const certificate =
            document.querySelector(
                ".trust-story__certificate"
            );

        if (!certificate) {
            return;
        }

        /*
         * Respect accessibility settings.
         */
        if (
            window.matchMedia(
                "(prefers-reduced-motion: reduce)"
            ).matches
        ) {
            return;
        }

        /*
         * Avoid adding the interaction twice.
         */
        if (
            certificate.dataset.interactionReady ===
            "true"
        ) {
            return;
        }

        certificate.dataset.interactionReady =
            "true";

        certificate.addEventListener(
            "pointermove",
            (event) => {
                /*
                 * Disable tilt on touch devices.
                 */
                if (
                    event.pointerType === "touch"
                ) {
                    return;
                }

                const rect =
                    certificate.getBoundingClientRect();

                const x =
                    event.clientX -
                    rect.left;

                const y =
                    event.clientY -
                    rect.top;

                const centerX =
                    rect.width / 2;

                const centerY =
                    rect.height / 2;

                const rotateX =
                    ((y - centerY) /
                        centerY) *
                    -2;

                const rotateY =
                    ((x - centerX) /
                        centerX) *
                    2;

                certificate.style.transform =
                    `perspective(1000px)
                     rotateX(${rotateX}deg)
                     rotateY(${rotateY}deg)
                     translateY(-4px)`;
            }
        );

        certificate.addEventListener(
            "pointerleave",
            () => {
                certificate.style.transform =
                    "";
            }
        );
    };

    /* =====================================================
       BADGE HOVER INTERACTION
       ===================================================== */

    const initBadgeInteractions = () => {
        const badges =
            document.querySelectorAll(
                ".trust-story__badge"
            );

        if (!badges.length) {
            return;
        }

        if (
            window.matchMedia(
                "(prefers-reduced-motion: reduce)"
            ).matches
        ) {
            return;
        }

        badges.forEach((badge) => {
            if (
                badge.dataset.interactionReady ===
                "true"
            ) {
                return;
            }

            badge.dataset.interactionReady =
                "true";

            badge.addEventListener(
                "pointerenter",
                () => {
                    badge.style.zIndex = "10";
                }
            );

            badge.addEventListener(
                "pointerleave",
                () => {
                    badge.style.zIndex = "";
                }
            );
        });
    };

    /* =====================================================
       ACCESSIBILITY
       ===================================================== */

    const initAccessibility = () => {
        const button =
            getLanguageButton();

        if (!button) {
            return;
        }

        /*
         * Make sure the control is announced properly.
         */
        button.setAttribute(
            "type",
            "button"
        );

        button.setAttribute(
            "role",
            "button"
        );
    };

    /* =====================================================
       PUBLIC API
       ===================================================== */

    /*
     * Expose only a small controlled API.
     * This can be useful later if Laravel or another
     * Certified component needs to change language.
     */
    window.CertifiedTrustStory = {
        setLanguage(language) {
            applyLanguage(language);
        },

        getLanguage() {
            return (
                document.documentElement.lang ||
                CONFIG.defaultLanguage
            );
        },

        toggleLanguage() {
            toggleLanguage();
        }
    };

    /* =====================================================
       INITIALIZATION
       ===================================================== */

    const initTrustStory = () => {
        const trustStory =
            document.querySelector(
                ".trust-story"
            );

        /*
         * If the component isn't on this page,
         * silently exit.
         */
        if (!trustStory) {
            return;
        }

        const initialLanguage =
            getInitialLanguage();

        applyLanguage(
            initialLanguage,
            {
                persist: false
            }
        );

        bindLanguageToggle();

        initCertificateInteraction();

        initBadgeInteractions();

        initAccessibility();
    };

    /* =====================================================
       DOM READY
       ===================================================== */

    if (
        document.readyState ===
        "loading"
    ) {
        document.addEventListener(
            "DOMContentLoaded",
            initTrustStory,
            {
                once: true
            }
        );
    } else {
        initTrustStory();
    }

})();