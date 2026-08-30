{{-- =========================================================
     CERTIFIED — CONTACT
     Section 02 — Communication Flow
     Secure Message Transmission Experience
     ========================================================= --}}

@once
    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets/css/contact/communication-flow.css') }}">
    @endpush
@endonce

<section class="communication-flow" id="communication-flow" aria-labelledby="communication-flow-title"
    data-communication-flow>

    {{-- =====================================================
         BACKGROUND ATMOSPHERE
         ===================================================== --}}
 
    <div class="communication-flow__atmosphere" aria-hidden="true">

        {{-- Ambient Light Fields --}}
        <span class="communication-flow__orb communication-flow__orb--one"></span>
        <span class="communication-flow__orb communication-flow__orb--two"></span>
        <span class="communication-flow__orb communication-flow__orb--three"></span>

        {{-- Technical Grid --}}
        <span class="communication-flow__grid"></span>

        {{-- Floating Stars --}}
        <span class="communication-flow__spark communication-flow__spark--1">✦</span>
        <span class="communication-flow__spark communication-flow__spark--2">✦</span>
        <span class="communication-flow__spark communication-flow__spark--3">✦</span>
        <span class="communication-flow__spark communication-flow__spark--4">✦</span>
        <span class="communication-flow__spark communication-flow__spark--5">✦</span>
        <span class="communication-flow__spark communication-flow__spark--6">✦</span>
        <span class="communication-flow__spark communication-flow__spark--7">✦</span>
        <span class="communication-flow__spark communication-flow__spark--8">✦</span>

        {{-- Floating Data Particles --}}
        <span class="communication-flow__particle communication-flow__particle--1"></span>
        <span class="communication-flow__particle communication-flow__particle--2"></span>
        <span class="communication-flow__particle communication-flow__particle--3"></span>
        <span class="communication-flow__particle communication-flow__particle--4"></span>
        <span class="communication-flow__particle communication-flow__particle--5"></span>
        <span class="communication-flow__particle communication-flow__particle--6"></span>
        <span class="communication-flow__particle communication-flow__particle--7"></span>
        <span class="communication-flow__particle communication-flow__particle--8"></span>

    </div>


    {{-- =====================================================
         SECTION INTRO
         ===================================================== --}}

    <div class="communication-flow__container">

        <header class="communication-flow__header">

            <div class="communication-flow__eyebrow">
                <span class="communication-flow__eyebrow-line"></span>

                <span>
                    {{ __('contact.communication_flow.eyebrow') }}
                </span>

                <span class="communication-flow__eyebrow-line"></span>
            </div>


            <h2 class="communication-flow__title" id="communication-flow-title">
                {{ __('contact.communication_flow.title') }}
            </h2>


            <p class="communication-flow__description">
                {{ __('contact.communication_flow.description') }}
            </p>

        </header>


        {{-- =================================================
             MAIN COMMUNICATION SYSTEM
             ================================================= --}}

        <div class="communication-flow__system">

            {{-- Security Scan --}}
            <span class="communication-flow__scan-line" aria-hidden="true"></span>

            {{-- Energy Pulse --}}
            <span class="communication-flow__energy-pulse" aria-hidden="true"></span>

            {{-- Ambient system glow --}}
            <div class="communication-flow__system-glow" aria-hidden="true"></div>


            {{-- =================================================
                 SOURCE NODE
                 ================================================= --}}

            <div class="communication-flow__source" data-flow-source>

                <span class="communication-flow__source-pulse"></span>

                <div class="communication-flow__source-icon">
                    <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path
                            d="M4 5.5A2.5 2.5 0 0 1 6.5 3h11A2.5 2.5 0 0 1 20 5.5v7A2.5 2.5 0 0 1 17.5 15H11l-4.5 4V15h0A2.5 2.5 0 0 1 4 12.5v-7Z"
                            stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                        <path d="m7 7 5 4 5-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </div>

                <span class="communication-flow__source-label">
                    {{ __('contact.communication_flow.source') }}
                </span>

                <span class="communication-flow__source-status">
                    {{ __('contact.communication_flow.source_status') }}
                </span>

            </div>


            {{-- =================================================
                 TRANSMISSION PATH
                 ================================================= --}}

            <div class="communication-flow__path" aria-hidden="true">

                <div class="communication-flow__path-line">
                    <span class="communication-flow__path-progress"></span>
                </div>

                <span class="communication-flow__data-packet communication-flow__data-packet--one"></span>
                <span class="communication-flow__data-packet communication-flow__data-packet--two"></span>
                <span class="communication-flow__data-packet communication-flow__data-packet--three"></span>

            </div>


            {{-- =================================================
                 SECURE CORE
                 ================================================= --}}

            <div class="communication-flow__core" data-flow-core>

                <div class="communication-flow__core-ring communication-flow__core-ring--outer"></div>
                <div class="communication-flow__core-ring communication-flow__core-ring--middle"></div>

                <div class="communication-flow__core-halo"></div>

                <div class="communication-flow__core-icon">

                    <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="M7 10V7.5A5 5 0 0 1 17 7.5V10" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" />

                        <rect x="4" y="10" width="16" height="11" rx="2" stroke="currentColor"
                            stroke-width="1.5" />

                        <circle cx="12" cy="15.5" r="1.25" fill="currentColor" />

                        <path d="M12 16.75V18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                    </svg>

                </div>

                <span class="communication-flow__core-label">
                    {{ __('contact.communication_flow.core') }}
                </span>

                <span class="communication-flow__core-state">
                    <span></span>
                    {{ __('contact.communication_flow.core_state') }}
                </span>

            </div>


            {{-- =================================================
                 FLOW STEPS
                 ================================================= --}}

            <div class="communication-flow__steps" data-flow-steps>

                {{-- Step 01 --}}
                <article class="communication-flow__step is-active" data-flow-step="1">

                    <div class="communication-flow__step-marker">
                        <span>01</span>
                    </div>

                    <div class="communication-flow__step-content">

                        <span class="communication-flow__step-status">
                            {{ __('contact.communication_flow.steps.received.status') }}
                        </span>

                        <h3>
                            {{ __('contact.communication_flow.steps.received.title') }}
                        </h3>

                        <p>
                            {{ __('contact.communication_flow.steps.received.description') }}
                        </p>

                    </div>

                </article>


                {{-- Step 02 --}}
                <article class="communication-flow__step" data-flow-step="2">

                    <div class="communication-flow__step-marker">
                        <span>02</span>
                    </div>

                    <div class="communication-flow__step-content">

                        <span class="communication-flow__step-status">
                            {{ __('contact.communication_flow.steps.encrypted.status') }}
                        </span>

                        <h3>
                            {{ __('contact.communication_flow.steps.encrypted.title') }}
                        </h3>

                        <p>
                            {{ __('contact.communication_flow.steps.encrypted.description') }}
                        </p>

                    </div>

                </article>


                {{-- Step 03 --}}
                <article class="communication-flow__step" data-flow-step="3">

                    <div class="communication-flow__step-marker">
                        <span>03</span>
                    </div>

                    <div class="communication-flow__step-content">

                        <span class="communication-flow__step-status">
                            {{ __('contact.communication_flow.steps.verified.status') }}
                        </span>

                        <h3>
                            {{ __('contact.communication_flow.steps.verified.title') }}
                        </h3>

                        <p>
                            {{ __('contact.communication_flow.steps.verified.description') }}
                        </p>

                    </div>

                </article>


                {{-- Step 04 --}}
                <article class="communication-flow__step" data-flow-step="4">

                    <div class="communication-flow__step-marker">
                        <span>04</span>
                    </div>

                    <div class="communication-flow__step-content">

                        <span class="communication-flow__step-status">
                            {{ __('contact.communication_flow.steps.routed.status') }}
                        </span>

                        <h3>
                            {{ __('contact.communication_flow.steps.routed.title') }}
                        </h3>

                        <p>
                            {{ __('contact.communication_flow.steps.routed.description') }}
                        </p>

                    </div>

                </article>


                {{-- Step 05 --}}
                <article class="communication-flow__step" data-flow-step="5">

                    <div class="communication-flow__step-marker">
                        <span>05</span>
                    </div>

                    <div class="communication-flow__step-content">

                        <span class="communication-flow__step-status">
                            {{ __('contact.communication_flow.steps.delivered.status') }}
                        </span>

                        <h3>
                            {{ __('contact.communication_flow.steps.delivered.title') }}
                        </h3>

                        <p>
                            {{ __('contact.communication_flow.steps.delivered.description') }}
                        </p>

                    </div>

                </article>

            </div>


            {{-- =================================================
                 SYSTEM FOOTER
                 ================================================= --}}

            <div class="communication-flow__system-footer">

                <div class="communication-flow__signal">
                    <span class="communication-flow__signal-dot"></span>

                    <span>
                        {{ __('contact.communication_flow.system_status') }}
                    </span>
                </div>

                <div class="communication-flow__encrypted">
                    <span class="communication-flow__encrypted-icon">✦</span>

                    <span>
                        {{ __('contact.communication_flow.protected_channel') }}
                    </span>
                </div>

            </div>

        </div>

    </div>

</section>


@once
    @push('scripts')
        <script src="{{ asset('assets/js/contact/communication-flow.js') }}"></script>
    @endpush
@endonce
