{{-- =========================================================
     CERTIFIED — SECURE CONVERSATION TERMINAL
     Contact Section 03
     Human Interaction / Secure Communication
     ========================================================= --}}



<section class="conversation-terminal" id="conversation-terminal" aria-labelledby="conversation-terminal-title"
    data-conversation-terminal>

    {{-- =====================================================
         ATMOSPHERE
         Decorative only
         ===================================================== --}}
 
    <div class="conversation-terminal__atmosphere" aria-hidden="true">

        {{-- Large ambient light fields --}}
        <span class="conversation-terminal__light conversation-terminal__light--one"></span>
        <span class="conversation-terminal__light conversation-terminal__light--two"></span>
        <span class="conversation-terminal__light conversation-terminal__light--three"></span>

        {{-- Moving light circles --}}
        <span class="conversation-terminal__circle conversation-terminal__circle--one"></span>
        <span class="conversation-terminal__circle conversation-terminal__circle--two"></span>
        <span class="conversation-terminal__circle conversation-terminal__circle--three"></span>

        {{-- Strong horizontal light beam --}}
        <span class="conversation-terminal__light-beam"></span>

        {{-- Floating stars --}}
        <span class="conversation-terminal__star conversation-terminal__star--1">✦</span>
        <span class="conversation-terminal__star conversation-terminal__star--2">✧</span>
        <span class="conversation-terminal__star conversation-terminal__star--3">✦</span>
        <span class="conversation-terminal__star conversation-terminal__star--4">✧</span>
        <span class="conversation-terminal__star conversation-terminal__star--5">✦</span>
        <span class="conversation-terminal__star conversation-terminal__star--6">✧</span>

        {{-- Small floating particles --}}
        @for ($i = 1; $i <= 8; $i++)
            <span class="conversation-terminal__particle conversation-terminal__particle--{{ $i }}"></span>
        @endfor

    </div>


    {{-- =====================================================
         MOUSE LIGHT
         ===================================================== --}}

    <span class="conversation-terminal__mouse-glow" aria-hidden="true"></span>


    {{-- =====================================================
         CONTAINER
         ===================================================== --}}

    <div class="conversation-terminal__container">

        {{-- =================================================
             HEADER
             ================================================= --}}

        <header class="conversation-terminal__header">

            <span class="conversation-terminal__eyebrow">
                {{ __('contact.conversation_terminal.eyebrow') }}
            </span>

            <h2 class="conversation-terminal__title" id="conversation-terminal-title">
                {{ __('contact.conversation_terminal.title') }}
            </h2>

            <p class="conversation-terminal__description">
                {{ __('contact.conversation_terminal.description') }}
            </p>

        </header>


        {{-- =================================================
             MAIN TERMINAL
             ================================================= --}}

        <div class="conversation-terminal__shell">

            {{-- =============================================
                 LEFT — FORM
                 ============================================= --}}

            <div class="conversation-terminal__form-panel">

                <div class="conversation-terminal__panel-heading">

                    <div>
                        <span class="conversation-terminal__panel-label">
                            {{ __('contact.conversation_terminal.message_label') }}
                        </span>

                        <h3>
                            {{ __('contact.conversation_terminal.message_title') }}
                        </h3>
                    </div>

                    <span class="conversation-terminal__live-indicator">
                        <span></span>
                        {{ __('contact.conversation_terminal.live') }}
                    </span>

                </div>


                {{-- Laravel-ready form --}}
                <form class="conversation-terminal__form" method="POST" action="{{ route('contact.send') }}"
                    data-conversation-form novalidate>

                    @csrf


                    {{-- =====================================
                         NAME
                         ===================================== --}}

                    <div class="conversation-terminal__field" data-field="name">

                        <label for="conversation-name">
                            {{ __('contact.conversation_terminal.fields.name') }}
                        </label>

                        <div class="conversation-terminal__input-wrap">

                            <span class="conversation-terminal__field-index" aria-hidden="true">
                                01
                            </span>

                            <input id="conversation-name" name="name" type="text" autocomplete="name"
                                value="{{ old('name') }}"
                                placeholder="{{ __('contact.conversation_terminal.fields.name_placeholder') }}"
                                aria-describedby="conversation-name-error" @error('name') aria-invalid="true" @enderror
                                required>

                            <span class="conversation-terminal__focus-line"></span>

                        </div>

                        <small id="conversation-name-error" class="conversation-terminal__error">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </small>

                    </div>


                    {{-- =====================================
                         EMAIL
                         ===================================== --}}

                    <div class="conversation-terminal__field" data-field="email">

                        <label for="conversation-email">
                            {{ __('contact.conversation_terminal.fields.email') }}
                        </label>

                        <div class="conversation-terminal__input-wrap">

                            <span class="conversation-terminal__field-index" aria-hidden="true">
                                02
                            </span>

                            <input id="conversation-email" name="email" type="email" autocomplete="email"
                                value="{{ old('email') }}"
                                placeholder="{{ __('contact.conversation_terminal.fields.email_placeholder') }}"
                                aria-describedby="conversation-email-error"
                                @error('email') aria-invalid="true" @enderror required>

                            <span class="conversation-terminal__focus-line"></span>

                        </div>

                        <small id="conversation-email-error" class="conversation-terminal__error">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </small>

                    </div>


                    {{-- =====================================
                         SUBJECT
                         ===================================== --}}

                    <div class="conversation-terminal__field" data-field="subject">

                        <label for="conversation-subject">
                            {{ __('contact.conversation_terminal.fields.subject') }}
                        </label>

                        <div class="conversation-terminal__input-wrap">

                            <span class="conversation-terminal__field-index" aria-hidden="true">
                                03
                            </span>

                            <input id="conversation-subject" name="subject" type="text" value="{{ old('subject') }}"
                                placeholder="{{ __('contact.conversation_terminal.fields.subject_placeholder') }}"
                                aria-describedby="conversation-subject-error"
                                @error('subject') aria-invalid="true" @enderror required>

                            <span class="conversation-terminal__focus-line"></span>

                        </div>

                        <small id="conversation-subject-error" class="conversation-terminal__error">
                            @error('subject')
                                {{ $message }}
                            @enderror
                        </small>

                    </div>


                    {{-- =====================================
                         MESSAGE
                         ===================================== --}}

                    <div class="conversation-terminal__field conversation-terminal__field--message"
                        data-field="message">

                        <label for="conversation-message">
                            {{ __('contact.conversation_terminal.fields.message') }}
                        </label>

                        <div class="conversation-terminal__input-wrap">

                            <span class="conversation-terminal__field-index" aria-hidden="true">
                                04
                            </span>

                            <textarea id="conversation-message" name="message" rows="5"
                                placeholder="{{ __('contact.conversation_terminal.fields.message_placeholder') }}"
                                aria-describedby="conversation-message-error" @error('message') aria-invalid="true" @enderror required>{{ old('message') }}</textarea>

                            <span class="conversation-terminal__focus-line"></span>

                        </div>

                        <small id="conversation-message-error" class="conversation-terminal__error">
                            @error('message')
                                {{ $message }}
                            @enderror
                        </small>

                    </div>


                    {{-- =====================================
                         SUBMIT
                         ===================================== --}}

                    <button type="submit" class="conversation-terminal__submit" data-submit-button>

                        <span class="conversation-terminal__submit-glow"></span>

                        <span class="conversation-terminal__submit-text" data-submit-text
                            data-sending="{{ __('contact.conversation_terminal.sending') }}">
                            {{ __('contact.conversation_terminal.submit') }}
                        </span>

                        <span class="conversation-terminal__submit-arrow" aria-hidden="true">
                            →
                        </span>

                    </button>


                    {{-- Live submission state --}}
                    <div class="conversation-terminal__form-status" data-form-status
                        data-transmitting="{{ __('contact.conversation_terminal.status.transmitting') }}"
                        role="status" aria-live="polite"></div>
                </form>

            </div>


            {{-- =============================================
                 RIGHT — STATUS SYSTEM
                 ============================================= --}}

            <aside class="conversation-terminal__status-panel">

                <div class="conversation-terminal__status-glow"></div>

                <div class="conversation-terminal__status-header">

                    <div>
                        <span class="conversation-terminal__panel-label">
                            {{ __('contact.conversation_terminal.status.label') }}
                        </span>

                        <h3>
                            {{ __('contact.conversation_terminal.status.title') }}
                        </h3>
                    </div>

                    <span class="conversation-terminal__status-dot"></span>

                </div>


                {{-- Channel --}}
                <div class="conversation-terminal__status-card is-ready">

                    <span class="conversation-terminal__status-number">
                        01
                    </span>

                    <div class="conversation-terminal__status-content">

                        <span>
                            {{ __('contact.conversation_terminal.status.channel') }}
                        </span>

                        <strong>
                            {{ __('contact.conversation_terminal.status.active') }}
                        </strong>

                    </div>

                    <span class="conversation-terminal__check">
                        ✓
                    </span>

                </div>


                {{-- Identity --}}
                <div class="conversation-terminal__status-card" data-status="identity">

                    <span class="conversation-terminal__status-number">
                        02
                    </span>

                    <div class="conversation-terminal__status-content">

                        <span>
                            {{ __('contact.conversation_terminal.status.identity') }}
                        </span>

                        <strong data-status-text>
                            {{ __('contact.conversation_terminal.status.waiting') }}
                        </strong>

                    </div>

                    <span class="conversation-terminal__check">
                        ✓
                    </span>

                </div>


                {{-- Security --}}
                <div class="conversation-terminal__status-card is-ready" data-status="security">

                    <span class="conversation-terminal__status-number">
                        03
                    </span>

                    <div class="conversation-terminal__status-content">

                        <span>
                            {{ __('contact.conversation_terminal.status.security') }}
                        </span>

                        <strong data-status-text>
                            {{ __('contact.conversation_terminal.status.protected') }}
                        </strong>

                    </div>

                    <span class="conversation-terminal__check">
                        ✓
                    </span>

                </div>


                {{-- Delivery --}}
                <div class="conversation-terminal__status-card" data-status="delivery">

                    <span class="conversation-terminal__status-number">
                        04
                    </span>

                    <div class="conversation-terminal__status-content">

                        <span>
                            {{ __('contact.conversation_terminal.status.delivery') }}
                        </span>

                        <strong data-status-text>
                            {{ __('contact.conversation_terminal.status.ready') }}
                        </strong>

                    </div>

                    <span class="conversation-terminal__check">
                        ✓
                    </span>

                </div>


                {{-- Security footer --}}
                <div class="conversation-terminal__security-footer">

                    <span class="conversation-terminal__security-icon">
                        ⛨
                    </span>

                    <div>
                        <strong>
                            {{ __('contact.conversation_terminal.security.title') }}
                        </strong>

                        <span>
                            {{ __('contact.conversation_terminal.security.description') }}
                        </span>
                    </div>

                </div>

            </aside>

        </div>

    </div>

</section>
