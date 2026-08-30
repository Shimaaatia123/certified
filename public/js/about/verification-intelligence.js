/* =========================================================
   CERTIFIED — VERIFICATION INTELLIGENCE
   Section 4
   Visual Verification Control Center
   Scoped / Responsive / RTL Safe
   No Backend Integration Required
   ========================================================= */

(function () {
    "use strict";

    /* =========================================================
       SECTION
       ========================================================= */

    const section = document.querySelector(".verification-intelligence");

    if (!section) {
        return;
    }


    /* =========================================================
       ELEMENTS
       ========================================================= */

    const nodes = Array.from(
        section.querySelectorAll(".verification-intelligence__node")
    );

    const timelineItems = Array.from(
        section.querySelectorAll(
            ".verification-intelligence__timeline-item"
        )
    );

    const progress = section.querySelector(
        "[data-progress]"
    );

    const timelineProgress = section.querySelector(
        "[data-timeline-progress]"
    );

    const statusTitle = section.querySelector(
        "[data-status-title]"
    );

    const statusMessage = section.querySelector(
        "[data-status-message]"
    );

    const verified = section.querySelector(
        "[data-verified]"
    );


    /* =========================================================
       SAFETY CHECK
       ========================================================= */

    if (
        !nodes.length ||
        !timelineItems.length ||
        !progress ||
        !timelineProgress ||
        !statusTitle ||
        !statusMessage ||
        !verified
    ) {
        return;
    }


    /* =========================================================
       CONFIGURATION
       ========================================================= */

    const STEP_DURATION = 1300;
    const INITIAL_DELAY = 700;
    const RESET_DELAY = 1800;


    /* =========================================================
       MOTION PREFERENCE
       ========================================================= */

    const reducedMotion = window.matchMedia(
        "(prefers-reduced-motion: reduce)"
    ).matches;


    /* =========================================================
       TRANSLATED STATUS DATA
       ---------------------------------------------------------
       These values can be supplied directly from Blade using
       data attributes if desired.

       Fallback English values are kept so the visual system
       remains functional even if the attributes are absent.
       ========================================================= */

    const statusStates = {
        scanning: {
            title:
                section.dataset.statusScanning ||
                statusTitle.textContent.trim() ||
                "Scanning certificate",
            message:
                section.dataset.statusScanningDescription ||
                statusMessage.textContent.trim() ||
                "Analyzing certificate security signals..."
        },

        signature: {
            title:
                section.dataset.statusSignature ||
                "Digital signature verified",
            message:
                section.dataset.statusSignatureDescription ||
                "Authenticating the certificate signature..."
        },

        hash: {
            title:
                section.dataset.statusHash ||
                "Hash integrity confirmed",
            message:
                section.dataset.statusHashDescription ||
                "Validating SHA-256 certificate integrity..."
        },

        issuer: {
            title:
                section.dataset.statusIssuer ||
                "Issuer identity confirmed",
            message:
                section.dataset.statusIssuerDescription ||
                "Checking the trusted certificate issuer..."
        },

        timestamp: {
            title:
                section.dataset.statusTimestamp ||
                "Timestamp validated",
            message:
                section.dataset.statusTimestampDescription ||
                "Confirming the certificate issuance record..."
        },

        verified: {
            title:
                section.dataset.statusVerified ||
                "Certificate verified",
            message:
                section.dataset.statusVerifiedDescription ||
                "All verification signals have been successfully validated."
        }
    };


    /* =========================================================
       STATE
       ========================================================= */

    let currentStep = -1;
    let cycleTimer = null;
    let isRunning = false;
    let hasEnteredViewport = false;


    /* =========================================================
       RESET
       ========================================================= */

    function resetVisualState() {

        nodes.forEach((node) => {
            node.classList.remove("is-active");
        });

        timelineItems.forEach((item) => {
            item.classList.remove("is-active");
        });

        progress.style.width = "0%";

        if (window.innerWidth <= 700) {
            timelineProgress.style.height = "0%";
        } else {
            timelineProgress.style.width = "0%";
        }

        verified.classList.remove("is-active");

        currentStep = -1;

        statusTitle.textContent =
            statusStates.scanning.title;

        statusMessage.textContent =
            statusStates.scanning.message;
    }


    /* =========================================================
       PROGRESS
       ========================================================= */

    function updateProgress(step) {

        const percentage =
            ((step + 1) / nodes.length) * 100;

        progress.style.width = `${percentage}%`;
    }


    /* =========================================================
       TIMELINE
       ========================================================= */

    function updateTimeline(step) {

        timelineItems.forEach((item, index) => {

            item.classList.toggle(
                "is-active",
                index <= step
            );

        });

        const timelinePercentage =
            Math.max(
                0,
                Math.min(
                    100,
                    (step / (timelineItems.length - 1)) * 100
                )
            );

        if (window.innerWidth <= 700) {

            timelineProgress.style.height =
                `${timelinePercentage}%`;

        } else {

            timelineProgress.style.width =
                `${timelinePercentage}%`;
        }
    }


    /* =========================================================
       STATUS
       ========================================================= */

    function updateStatus(key) {

        const state = statusStates[key];

        if (!state) {
            return;
        }

        statusTitle.textContent = state.title;
        statusMessage.textContent = state.message;
    }


    /* =========================================================
       ACTIVATE NODE
       ========================================================= */

    function activateNode(index) {

        if (!nodes[index]) {
            return;
        }

        nodes.forEach((node, nodeIndex) => {

            node.classList.toggle(
                "is-active",
                nodeIndex === index
            );

        });

        currentStep = index;

        const nodeName =
            nodes[index].dataset.node;

        updateStatus(nodeName);

        updateProgress(index);

        /*
         * Map security nodes to timeline steps.
         *
         * 0 = signature
         * 1 = hash
         * 2 = issuer
         * 3 = timestamp
         */

        updateTimeline(index);
    }


    /* =========================================================
       VERIFIED STATE
       ========================================================= */

    function completeVerification() {

        nodes.forEach((node) => {
            node.classList.add("is-active");
        });

        timelineItems.forEach((item) => {
            item.classList.add("is-active");
        });

        progress.style.width = "100%";

        if (window.innerWidth <= 700) {
            timelineProgress.style.height = "100%";
        } else {
            timelineProgress.style.width = "100%";
        }

        verified.classList.add("is-active");

        updateStatus("verified");
    }


    /* =========================================================
       SINGLE CYCLE
       ========================================================= */

    function runCycle() {

        if (!isRunning) {
            return;
        }

        resetVisualState();

        let step = 0;

        const runStep = () => {

            if (!isRunning) {
                return;
            }

            if (step < nodes.length) {

                activateNode(step);

                step++;

                cycleTimer = window.setTimeout(
                    runStep,
                    reducedMotion
                        ? 100
                        : STEP_DURATION
                );

                return;
            }

            /*
             * Final verification state
             */

            completeVerification();

            cycleTimer = window.setTimeout(
                () => {

                    if (!isRunning) {
                        return;
                    }

                    resetVisualState();

                    cycleTimer = window.setTimeout(
                        runCycle,
                        reducedMotion
                            ? 100
                            : RESET_DELAY
                    );

                },
                reducedMotion
                    ? 700
                    : RESET_DELAY
            );
        };


        cycleTimer = window.setTimeout(
            runStep,
            reducedMotion
                ? 100
                : INITIAL_DELAY
        );
    }


    /* =========================================================
       START
       ========================================================= */

    function startVerification() {

        if (isRunning) {
            return;
        }

        isRunning = true;

        runCycle();
    }


    /* =========================================================
       STOP
       ========================================================= */

    function stopVerification() {

        isRunning = false;

        if (cycleTimer) {
            window.clearTimeout(cycleTimer);
            cycleTimer = null;
        }

        resetVisualState();
    }


    /* =========================================================
       RESPONSIVE TIMELINE FIX
       ========================================================= */

    function syncTimelineDirection() {

        if (window.innerWidth <= 700) {

            const activeCount =
                timelineItems.filter((item) =>
                    item.classList.contains("is-active")
                ).length;

            const percentage =
                timelineItems.length > 1
                    ? Math.max(
                        0,
                        ((activeCount - 1) /
                            (timelineItems.length - 1)) *
                            100
                    )
                    : 0;

            timelineProgress.style.width = "100%";
            timelineProgress.style.height =
                `${percentage}%`;

        } else {

            const activeCount =
                timelineItems.filter((item) =>
                    item.classList.contains("is-active")
                ).length;

            const percentage =
                timelineItems.length > 1
                    ? Math.max(
                        0,
                        ((activeCount - 1) /
                            (timelineItems.length - 1)) *
                            100
                    )
                    : 0;

            timelineProgress.style.height = "100%";
            timelineProgress.style.width =
                `${percentage}%`;
        }
    }


    /* =========================================================
       INTERSECTION OBSERVER
       ---------------------------------------------------------
       The animation starts only when the section becomes visible.
       This prevents unnecessary animation while the user is
       elsewhere on the page.
       ========================================================= */

    const observer = new IntersectionObserver(
        (entries) => {

            entries.forEach((entry) => {

                if (entry.isIntersecting) {

                    if (!hasEnteredViewport) {

                        hasEnteredViewport = true;

                        window.setTimeout(
                            startVerification,
                            reducedMotion ? 0 : 250
                        );
                    }

                } else {

                    /*
                     * Stop when section leaves viewport.
                     * This avoids wasting CPU/GPU resources.
                     */

                    if (hasEnteredViewport) {
                        stopVerification();
                    }
                }

            });

        },
        {
            threshold: 0.22
        }
    );


    observer.observe(section);


    /* =========================================================
       RESIZE
       ========================================================= */

    let resizeTimer = null;

    window.addEventListener(
        "resize",
        () => {

            window.clearTimeout(resizeTimer);

            resizeTimer = window.setTimeout(
                syncTimelineDirection,
                150
            );

        },
        { passive: true }
    );


    /* =========================================================
       INITIAL STATE
       ========================================================= */

    resetVisualState();
    syncTimelineDirection();


    /* =========================================================
       PAGE VISIBILITY
       ---------------------------------------------------------
       Pause the animation when the browser tab is hidden.
       ========================================================= */

    document.addEventListener(
        "visibilitychange",
        () => {

            if (document.hidden) {

                stopVerification();

            } else if (hasEnteredViewport) {

                startVerification();
            }

        }
    );

})();