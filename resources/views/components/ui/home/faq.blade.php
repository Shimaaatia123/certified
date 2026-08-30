<section class="faq-section" id="faq">

    {{-- ================= Background ================= --}}
    <div class="faq-noise" aria-hidden="true"></div>

    <div class="container">

        {{-- ================= Section Header ================= --}}
        <div class="faq-heading faq-reveal">

            <span class="faq-badge">
                <i class="bi bi-patch-question-fill" aria-hidden="true"></i>

                <span>
                    {{ __('home_faq.badge') }}
                </span>
            </span>

            <h2 class="faq-title">
                {{ __('home_faq.title') }}
            </h2>

            <p class="faq-text">
                {{ __('home_faq.description') }}
            </p>

        </div>


        {{-- ================= FAQ List ================= --}}
        <div class="faq-list">

            {{-- ==================================================
                 Item 1
            ================================================== --}}
            <div class="faq-item faq-reveal">

                <div class="active-bar" aria-hidden="true"></div>

                <button
                    class="faq-question"
                    type="button"
                    aria-expanded="true"
                    aria-controls="faq-answer-about"
                >

                    <div class="faq-question-left">

                        <div
                            class="faq-question-icon"
                            aria-hidden="true"
                        >
                            <i class="bi bi-patch-check-fill"></i>
                        </div>

                        <span>
                            {{ __('home_faq.items.about.question') }}
                        </span>

                    </div>

                    <div class="faq-icon" aria-hidden="true">
                        <i class="bi bi-chevron-down"></i>
                    </div>

                </button>


                <div
                    class="faq-answer"
                    id="faq-answer-about"
                >
                    <div class="faq-answer-content">
                        {{ __('home_faq.items.about.answer') }}
                    </div>
                </div>

            </div>


            {{-- ==================================================
                 Item 2
            ================================================== --}}
            <div class="faq-item faq-reveal">

                <div class="active-bar" aria-hidden="true"></div>

                <button
                    class="faq-question"
                    type="button"
                    aria-expanded="false"
                    aria-controls="faq-answer-security"
                >

                    <div class="faq-question-left">

                        <div
                            class="faq-question-icon"
                            aria-hidden="true"
                        >
                            <i class="bi bi-shield-lock-fill"></i>
                        </div>

                        <span>
                            {{ __('home_faq.items.security.question') }}
                        </span>

                    </div>

                    <div class="faq-icon" aria-hidden="true">
                        <i class="bi bi-chevron-down"></i>
                    </div>

                </button>


                <div
                    class="faq-answer"
                    id="faq-answer-security"
                >
                    <div class="faq-answer-content">
                        {{ __('home_faq.items.security.answer') }}
                    </div>
                </div>

            </div>


            {{-- ==================================================
                 Item 3
            ================================================== --}}
            <div class="faq-item faq-reveal">

                <div class="active-bar" aria-hidden="true"></div>

                <button
                    class="faq-question"
                    type="button"
                    aria-expanded="false"
                    aria-controls="faq-answer-verification"
                >

                    <div class="faq-question-left">

                        <div
                            class="faq-question-icon"
                            aria-hidden="true"
                        >
                            <i class="bi bi-award-fill"></i>
                        </div>

                        <span>
                            {{ __('home_faq.items.verification.question') }}
                        </span>

                    </div>

                    <div class="faq-icon" aria-hidden="true">
                        <i class="bi bi-chevron-down"></i>
                    </div>

                </button>


                <div
                    class="faq-answer"
                    id="faq-answer-verification"
                >
                    <div class="faq-answer-content">
                        {{ __('home_faq.items.verification.answer') }}
                    </div>
                </div>

            </div>


            {{-- ==================================================
                 Item 4
            ================================================== --}}
            <div class="faq-item faq-reveal">

                <div class="active-bar" aria-hidden="true"></div>

                <button
                    class="faq-question"
                    type="button"
                    aria-expanded="false"
                    aria-controls="faq-answer-mobile"
                >

                    <div class="faq-question-left">

                        <div
                            class="faq-question-icon"
                            aria-hidden="true"
                        >
                            <i class="bi bi-phone-fill"></i>
                        </div>

                        <span>
                            {{ __('home_faq.items.mobile.question') }}
                        </span>

                    </div>

                    <div class="faq-icon" aria-hidden="true">
                        <i class="bi bi-chevron-down"></i>
                    </div>

                </button>


                <div
                    class="faq-answer"
                    id="faq-answer-mobile"
                >
                    <div class="faq-answer-content">
                        {{ __('home_faq.items.mobile.answer') }}
                    </div>
                </div>

            </div>

        </div>

    </div>

</section>