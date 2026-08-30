<section class="cta-section">

    {{-- ================= Background Effects ================= --}}
    <div class="cta-aurora" aria-hidden="true"></div>
    <div class="cta-grid" aria-hidden="true"></div>
    <div class="cta-particles" aria-hidden="true"></div>

    {{-- Continuous Moving Light --}}
    <div class="cta-light-sweep" aria-hidden="true"></div>

    <div class="container">

        <div class="cta-content reveal-cta">

            {{-- 3D / Mouse Glow Layers --}}
            <div class="cta-3d-layer" aria-hidden="true"></div>
            <div class="cta-glow" aria-hidden="true"></div>

            {{-- ================= Badge ================= --}}
            <span class="cta-badge">

                <span class="cta-badge-icon" aria-hidden="true">
                    ✦
                </span>

                <span>
                    {{ __('home_cta.badge') }}
                </span>

            </span>

            {{-- ================= Title ================= --}}
            <h2 class="cta-title">
                {{ __('home_cta.title') }}
            </h2>

            {{-- ================= Description ================= --}}
            <p class="cta-description">
                {{ __('home_cta.description') }}
            </p>

            {{-- ================= Buttons ================= --}}
            <div class="cta-buttons">

                <a href="{{ route('register') }}" class="btn-cta-primary">
                    <i class="fa-solid fa-user-plus" aria-hidden="true"></i>
                    <span>
                        {{ __('home_cta.buttons.get_started') }}
                    </span>
                </a>

                <a href="{{ route('contact') }}" class="btn-cta-secondary">
                    <i class="fa-solid fa-envelope" aria-hidden="true"></i>
                    <span>
                        {{ __('home_cta.buttons.contact_us') }}
                    </span>
                </a>

            </div>

            {{-- ================= Features ================= --}}
            <div class="cta-features">

                <div class="cta-feature">
                    <i class="fa-solid fa-shield-halved" aria-hidden="true"></i>
                    <span>
                        {{ __('home_cta.features.secure_platform') }}
                    </span>
                </div>

                <div class="cta-feature">
                    <i class="fa-solid fa-bolt" aria-hidden="true"></i>
                    <span>
                        {{ __('home_cta.features.fast_processing') }}
                    </span>
                </div>

                <div class="cta-feature">
                    <i class="fa-solid fa-globe" aria-hidden="true"></i>
                    <span>
                        {{ __('home_cta.features.trusted_worldwide') }}
                    </span>
                </div>

            </div>

        </div>

    </div>

</section>