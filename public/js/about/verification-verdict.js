/* =========================================================
   CERTIFIED — VERIFICATION VERDICT
   Section 5 / Verification Sequence
   ========================================================= */

(() => {
    "use strict";

    const initVerificationVerdict = () => {
        const section = document.querySelector(
            "[data-verdict-section]"
        );

        if (!section) {
            return;
        }

        const consoleElement = section.querySelector(
            "[data-verdict-console]"
        );

        if (!consoleElement) {
            return;
        }

        const statusText = section.querySelector(
            "[data-status-text]"
        );

        const result = section.querySelector(
            "[data-verdict-result]"
        );

        const resultLabel = section.querySelector(
            "[data-result-label]"
        );

        const resultState = section.querySelector(
            "[data-result-state]"
        );

        const checks = [
            section.querySelector('[data-check="identity"]'),
            section.querySelector('[data-check="issuer"]'),
            section.querySelector('[data-check="signature"]'),
            section.querySelector('[data-check="integrity"]')
        ].filter(Boolean);

        const timelineSteps = [
            ...section.querySelectorAll(
                "[data-timeline-step]"
            )
        ];

        const timelineProgress = section.querySelector(
            "[data-timeline-progress]"
        );

        const confidenceProgress = section.querySelector(
            "[data-confidence-progress]"
        );

        const confidenceValue = section.querySelector(
            "[data-confidence-value]"
        );

        const durationElement = section.querySelector(
            "[data-duration]"
        );

        const footerTitle = section.querySelector(
            "[data-footer-title]"
        );

        const footerMessage = section.querySelector(
            "[data-footer-message]"
        );

        const reducedMotion = window.matchMedia(
            "(prefers-reduced-motion: reduce)"
        ).matches;

        let hasRun = false;
        let runningTimer = null;

      const translations =
    window.VerificationVerdictTranslations || {};

        const setTimelineStep = (index) => {
            timelineSteps.forEach((step, stepIndex) => {
                step.classList.toggle(
                    "is-active",
                    stepIndex === index
                );

                step.classList.toggle(
                    "is-complete",
                    stepIndex < index
                );
            });

            if (!timelineProgress || timelineSteps.length < 2) {
                return;
            }

            const percentage =
                (index / (timelineSteps.length - 1)) * 100;

            timelineProgress.style.width = `${percentage}%`;
        };

        const setCheckState = (index) => {
            checks.forEach((check, checkIndex) => {
                check.classList.toggle(
                    "is-active",
                    checkIndex === index
                );

                check.classList.toggle(
                    "is-complete",
                    checkIndex < index
                );
            });
        };

        const animateConfidence = (
            target = 98.7,
            duration = 1500
        ) => {
            if (!confidenceProgress || !confidenceValue) {
                return Promise.resolve();
            }

            const circumference = 2 * Math.PI * 50;
            const start = performance.now();

            return new Promise((resolve) => {
                const animate = (now) => {
                    const elapsed = now - start;

                    const progress = Math.min(
                        elapsed / duration,
                        1
                    );

                    const eased =
                        1 - Math.pow(1 - progress, 3);

                    const current =
                        target * eased;

                    const offset =
                        circumference -
                        (circumference * current) / 100;

                    confidenceProgress.style.strokeDashoffset =
                        offset;

                    confidenceValue.textContent =
                        `${current.toFixed(1)}%`;

                    if (progress < 1) {
                        requestAnimationFrame(animate);
                    } else {
                        resolve();
                    }
                };

                requestAnimationFrame(animate);
            });
        };

        const wait = (ms) => {
            if (reducedMotion) {
                return Promise.resolve();
            }

            return new Promise((resolve) => {
                window.setTimeout(resolve, ms);
            });
        };

        const reset = () => {
            hasRun = false;

            consoleElement.classList.remove(
                "is-running",
                "is-complete"
            );

            result?.classList.remove("is-verified");

            if (statusText) {
                statusText.textContent =
                    translations.verifying;
            }

            if (resultLabel) {
                resultLabel.textContent =
                    translations.verifying;
            }

            if (resultState) {
                resultState.textContent = "...";
            }

            checks.forEach((check) => {
                check.classList.remove(
                    "is-active",
                    "is-complete"
                );
            });

            timelineSteps.forEach((step) => {
                step.classList.remove(
                    "is-active",
                    "is-complete"
                );
            });

            if (timelineProgress) {
                timelineProgress.style.width = "0%";
            }

            if (confidenceProgress) {
                confidenceProgress.style.strokeDashoffset =
                    314.159;
            }

            if (confidenceValue) {
                confidenceValue.textContent = "0.0%";
            }

            if (durationElement) {
                durationElement.textContent = "--.--s";
            }

            if (footerTitle) {
                footerTitle.textContent =
                    translations.verifying;
            }

            if (footerMessage) {
                footerMessage.textContent =
                    translations.completeDescription;
            }
        };

        const runVerification = async () => {
            if (hasRun) {
                return;
            }

            hasRun = true;

            const startedAt = performance.now();

            consoleElement.classList.add("is-running");

            /*
             * STEP 01 — Credential received
             */
            setTimelineStep(0);

            if (statusText) {
                statusText.textContent =
                    translations.scanning;
            }

            if (resultLabel) {
                resultLabel.textContent =
                    translations.scanning;
            }

            if (resultState) {
                resultState.textContent = "...";
            }

            await wait(reducedMotion ? 100 : 700);


            /*
             * STEP 02 — Issuer
             */
            setTimelineStep(1);
            setCheckState(0);

            if (statusText) {
                statusText.textContent =
                    translations.issuer;
            }

            await wait(reducedMotion ? 100 : 650);


            /*
             * STEP 03 — Signature
             */
            setTimelineStep(2);
            setCheckState(1);

            if (statusText) {
                statusText.textContent =
                    translations.signature;
            }

            await wait(reducedMotion ? 100 : 700);


            /*
             * STEP 04 — Integrity
             */
            setTimelineStep(3);
            setCheckState(2);

            if (statusText) {
                statusText.textContent =
                    translations.integrity;
            }

            await wait(reducedMotion ? 100 : 700);


            /*
             * STEP 05 — Final verdict
             */
            setTimelineStep(4);
            setCheckState(3);

            if (statusText) {
                statusText.textContent =
                    translations.verified;
            }

            await animateConfidence(
                98.7,
                reducedMotion ? 100 : 1200
            );

            checks.forEach((check) => {
                check.classList.remove("is-active");
                check.classList.add("is-complete");
            });

            timelineSteps.forEach((step) => {
                step.classList.remove("is-active");
                step.classList.add("is-complete");
            });

            if (result) {
                result.classList.add("is-verified");
            }

            if (resultLabel) {
                resultLabel.textContent =
                    translations.verified;
            }

            if (resultState) {
                resultState.textContent =
                    translations.authentic;
            }

            consoleElement.classList.remove(
                "is-running"
            );

            consoleElement.classList.add(
                "is-complete"
            );

            if (footerTitle) {
                footerTitle.textContent =
                    translations.complete;
            }

            if (footerMessage) {
                footerMessage.textContent =
                    translations.completeDescription;
            }

            if (durationElement) {
                const duration =
                    (performance.now() - startedAt) / 1000;

                durationElement.textContent =
                    `${duration.toFixed(2)}s`;
            }
        };

        reset();

        /*
         * Start only when the section becomes visible.
         * This avoids running expensive animation before
         * the user reaches the section.
         */
        if ("IntersectionObserver" in window) {
            const observer = new IntersectionObserver(
                (entries) => {
                    entries.forEach((entry) => {
                        if (
                            entry.isIntersecting &&
                            entry.intersectionRatio >= 0.2
                        ) {
                            runVerification();
                            observer.unobserve(section);
                        }
                    });
                },
                {
                    threshold: [0.2]
                }
            );

            observer.observe(section);
        } else {
            runVerification();
        }

        /*
         * Re-run safely when browser restores the page
         * from bfcache.
         */
        window.addEventListener(
            "pageshow",
            (event) => {
                if (event.persisted) {
                    reset();
                    hasRun = false;
                }
            },
            { passive: true }
        );
    };

    if (document.readyState === "loading") {
        document.addEventListener(
            "DOMContentLoaded",
            initVerificationVerdict,
            { once: true }
        );
    } else {
        initVerificationVerdict();
    }
})(); 