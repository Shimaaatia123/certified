{{-- ================================================================
    CERTIFICATE TASKS SECTION
    Component:
    <x-ui.certificate.tasks />
================================================================ --}}

@php
    $isRtl = app()->getLocale() === 'ar';
@endphp

<section class="cert-tasks" id="certificate-tasks" dir="{{ $isRtl ? 'rtl' : 'ltr' }}" aria-labelledby="cert-tasks-title">

    {{-- ==========================================================
        BACKGROUND / DECORATION
    =========================================================== --}}
    <div class="cert-tasks__background" aria-hidden="true">

        <span class="cert-tasks__grid"></span>

        <span class="cert-tasks__glow cert-tasks__glow--left"></span> 
        <span class="cert-tasks__glow cert-tasks__glow--right"></span>
        <span class="cert-tasks__glow cert-tasks__glow--center"></span>

        <span class="cert-tasks__star cert-tasks__star--1"></span>
        <span class="cert-tasks__star cert-tasks__star--2"></span>
        <span class="cert-tasks__star cert-tasks__star--3"></span>
        <span class="cert-tasks__star cert-tasks__star--4"></span>
        <span class="cert-tasks__star cert-tasks__star--5"></span>
        <span class="cert-tasks__star cert-tasks__star--6"></span>

        {{-- TOP DECORATIVE WAVES --}}
        <span class="cert-tasks__wave cert-tasks__wave--top"></span>
        <span class="cert-tasks__wave cert-tasks__wave--top-glow"></span>

        {{-- BOTTOM DECORATIVE WAVES --}}
        <div class="cert-tasks__wave cert-tasks__wave--1">
            <span class="cert-tasks__orb" aria-hidden="true"></span>
        </div>

        <div class="cert-tasks__wave cert-tasks__wave--2">
            <span class="cert-tasks__orb" aria-hidden="true"></span>
        </div>

    </div>


    {{-- ==========================================================
        MAIN CONTAINER
    =========================================================== --}}
    <div class="cert-tasks__container">


        {{-- ======================================================
            HEADER
        ======================================================= --}}
        <header class="cert-tasks__header">

            {{-- Section Number --}}
            <div class="cert-tasks__eyebrow" aria-label="{{ __('certificates.tasks.eyebrow') }}">

                <span class="cert-tasks__eyebrow-line"></span>

                <span class="cert-tasks__eyebrow-dot"></span>

                <span>
                    {{ __('certificates.tasks.eyebrow') }}
                </span>

                <span class="cert-tasks__eyebrow-dot"></span>

                <span class="cert-tasks__eyebrow-line"></span>

            </div>


            {{-- Main Title --}}
            <h2 class="cert-tasks__title" id="cert-tasks-title">

                <span>
                    {{ __('certificates.tasks.title_before') }}
                </span>

                <span class="cert-tasks__title-accent">
                    {{ __('certificates.tasks.title_accent') }}
                </span>

            </h2>


            {{-- Title Glow Line --}}
            <div class="cert-tasks__title-rule" aria-hidden="true">
                <span></span>
            </div>


            {{-- Description --}}
            <p class="cert-tasks__intro">
                {{ __('certificates.tasks.description') }}
            </p>

        </header>



        {{-- ======================================================
            LEFT CLOUD VISUAL
        ======================================================= --}}
        <div class="cert-tasks__cloud cert-tasks__cloud--left" aria-hidden="true">

            <div class="cert-tasks__cloud-orbit cert-tasks__cloud-orbit--one"></div>

            <div class="cert-tasks__cloud-orbit cert-tasks__cloud-orbit--two"></div>

            <div class="cert-tasks__cloud-card">

                <i class="fa-solid fa-cloud" aria-hidden="true"></i>

            </div>

        </div>



        {{-- ======================================================
            RIGHT GOOGLE CLOUD VISUAL
        ======================================================= --}}
        <div class="cert-tasks__cloud cert-tasks__cloud--right" aria-hidden="true">

            <div class="cert-tasks__cloud-orbit cert-tasks__cloud-orbit--one"></div>

            <div class="cert-tasks__cloud-orbit cert-tasks__cloud-orbit--two"></div>

            <div class="cert-tasks__cloud-card cert-tasks__cloud-card--brand">

                <i class="fa-brands fa-google" aria-hidden="true"></i>

                <span>Cloud</span>

            </div>

        </div>



        {{-- ======================================================
            TASKS
        ======================================================= --}}
        <div class="cert-tasks__tasks" role="list">

            {{-- DESKTOP CONNECTOR --}}
            <div class="cert-tasks__connector" aria-hidden="true">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>

            {{-- ==================================================
                01 — RESOURCES
            =================================================== --}}
            <article class="cert-tasks__card cert-tasks__card--blue" role="listitem">

                <div class="cert-tasks__number">
                    01
                </div>

                <div class="cert-tasks__icon">

                    <i class="fa-solid fa-cloud-arrow-up" aria-hidden="true"></i>

                </div>

                <h3>
                    {{ __('certificates.tasks.cards.resources.title') }}
                </h3>

                <p>
                    {{ __('certificates.tasks.cards.resources.description') }}
                </p>

                <span class="cert-tasks__card-line" aria-hidden="true"></span>

            </article>



            {{-- ==================================================
                02 — SECURITY
            =================================================== --}}
            <article class="cert-tasks__card cert-tasks__card--green" role="listitem">

                <div class="cert-tasks__number">
                    02
                </div>

                <div class="cert-tasks__icon">

                    <i class="fa-solid fa-shield-halved" aria-hidden="true"></i>

                </div>

                <h3>
                    {{ __('certificates.tasks.cards.security.title') }}
                </h3>

                <p>
                    {{ __('certificates.tasks.cards.security.description') }}
                </p>

                <span class="cert-tasks__card-line" aria-hidden="true"></span>

            </article>



            {{-- ==================================================
                03 — APPLICATIONS
            =================================================== --}}
            <article class="cert-tasks__card cert-tasks__card--purple" role="listitem">

                <div class="cert-tasks__number">
                    03
                </div>

                <div class="cert-tasks__icon">

                    <i class="fa-solid fa-microchip" aria-hidden="true"></i>

                </div>

                <h3>
                    {{ __('certificates.tasks.cards.applications.title') }}
                </h3>

                <p>
                    {{ __('certificates.tasks.cards.applications.description') }}
                </p>

                <span class="cert-tasks__card-line" aria-hidden="true"></span>

            </article>



            {{-- ==================================================
                04 — DATA
            =================================================== --}}
            <article class="cert-tasks__card cert-tasks__card--orange" role="listitem">

                <div class="cert-tasks__number">
                    04
                </div>

                <div class="cert-tasks__icon">

                    <i class="fa-solid fa-database" aria-hidden="true"></i>

                </div>

                <h3>
                    {{ __('certificates.tasks.cards.data.title') }}
                </h3>

                <p>
                    {{ __('certificates.tasks.cards.data.description') }}
                </p>

                <span class="cert-tasks__card-line" aria-hidden="true"></span>

            </article>



            {{-- ==================================================
                05 — PERFORMANCE
            =================================================== --}}
            <article class="cert-tasks__card cert-tasks__card--cyan" role="listitem">

                <div class="cert-tasks__number">
                    05
                </div>

                <div class="cert-tasks__icon">

                    <i class="fa-solid fa-chart-column" aria-hidden="true"></i>

                </div>

                <h3>
                    {{ __('certificates.tasks.cards.performance.title') }}
                </h3>

                <p>
                    {{ __('certificates.tasks.cards.performance.description') }}
                </p>

                <span class="cert-tasks__card-line" aria-hidden="true"></span>

            </article>



            {{-- ==================================================
                06 — RELIABILITY
            =================================================== --}}
            <article class="cert-tasks__card cert-tasks__card--gold" role="listitem">

                <div class="cert-tasks__number">
                    06
                </div>

                <div class="cert-tasks__icon">

                    <i class="fa-solid fa-circle-check" aria-hidden="true"></i>

                </div>

                <h3>
                    {{ __('certificates.tasks.cards.reliability.title') }}
                </h3>

                <p>
                    {{ __('certificates.tasks.cards.reliability.description') }}
                </p>

                <span class="cert-tasks__card-line" aria-hidden="true"></span>

            </article>


        </div>



        {{-- ======================================================
            BOTTOM CTA
        ======================================================= --}}
        <aside class="cert-tasks__bottom" aria-label="{{ __('certificates.tasks.cta.title') }}">

            {{-- Trophy --}}
            <div class="cert-tasks__bottom-icon">

                <i class="fa-solid fa-trophy" aria-hidden="true"></i>

            </div>


            {{-- Text --}}
            <div class="cert-tasks__bottom-copy">

                <h3>
                    {{ __('certificates.tasks.cta.title') }}
                </h3>

                <p>
                    {{ __('certificates.tasks.cta.description') }}
                </p>

            </div>


            {{-- Button --}}
            <a href="{{ url('/certificates') }}" class="cert-tasks__bottom-button">

                <span>
                    {{ __('certificates.tasks.cta.button') }}
                </span>

                <i class="fa-solid fa-arrow-right-long" aria-hidden="true"></i>

            </a>

        </aside>


    </div>

</section>
