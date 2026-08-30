@extends('layouts.app')

@section('content')
    <div class="cert-cat-show-page">

        ```
        <div class="cert-cat-show-card">

            {{-- HEADER --}}
            <div class="cert-cat-show-header">

                <div class="cert-cat-show-title">

                    <div class="cert-cat-show-icon">
                        <i class="fa-solid fa-layer-group"></i>
                    </div>

                    <div>
                        <small>
                            {{ __('language.✨Category Details #') }}
                        </small>

                        <h4>#{{ $category->id }}</h4>
                    </div>

                </div>


                <div class="cert-cat-show-status">

                    @if ($category->status == 1)
                        <span class="cert-cat-show-active">
                            <i class="fa-solid fa-circle-check"></i>
                            {{ __('language.Active') }}
                        </span>
                    @else
                        <span class="cert-cat-show-inactive">
                            <i class="fa-solid fa-circle-xmark"></i>
                            {{ __('language.Inactive') }}
                        </span>
                    @endif

                </div>

            </div>


            {{-- MAIN --}}
            <div class="cert-cat-show-main">


                {{-- IMAGE --}}
                <div class="cert-cat-show-image-area">

                    @if ($category->image)
                        <img src="{{ asset('storage/' . $category->image) }}" alt="{{ __('language.category Image') }}"
                            class="cert-cat-show-image">
                    @else
                        <div class="cert-cat-show-no-image">
                            <i class="fa-solid fa-image"></i>
                            <span>{{ __('language.No Image') }}</span>
                        </div>
                    @endif

                </div>


                {{-- INFORMATION --}}
                <div class="cert-cat-show-info">


                    {{-- TITLES --}}
                    <div class="cert-cat-show-row">

                        <div class="cert-cat-show-box cert-cat-show-purple">

                            <span>
                                <i class="fa-solid fa-font"></i>
                                {{ __('language.Title EN') }}
                            </span>

                            <strong>
                                {{ $category->title_en }}
                            </strong>

                        </div>


                        <div class="cert-cat-show-box cert-cat-show-green">

                            <span>
                                <i class="fa-solid fa-language"></i>
                                {{ __('language.Title AR') }}
                            </span>

                            <strong>
                                {{ $category->title_ar }}
                            </strong>

                        </div>

                    </div>


                    {{-- DESCRIPTIONS --}}
                    <div class="cert-cat-show-row">

                        <div class="cert-cat-show-description">

                            <span class="cert-cat-show-purple-text">
                                <i class="fa-solid fa-align-left"></i>
                                {{ __('language.Description EN') }}
                            </span>

                            <p>
                                {{ $category->description_en ?: '—' }}
                            </p>

                        </div>


                        <div class="cert-cat-show-description">

                            <span class="cert-cat-show-green-text">
                                <i class="fa-solid fa-align-right"></i>
                                {{ __('language.Description AR') }}
                            </span>

                            <p>
                                {{ $category->description_ar ?: '—' }}
                            </p>

                        </div>

                    </div>


                    {{-- META --}}
                    <div class="cert-cat-show-meta">

                        <div>
                            <i class="fa-solid fa-fingerprint"></i>

                            <span>
                                {{ __('language.ID💎') }}
                            </span>

                            <strong>
                                {{ $category->id }}
                            </strong>
                        </div>


                        <div>
                            <i class="fa-solid fa-calendar-days"></i>

                            <span>
                                {{ __('language.Created At') }}
                            </span>

                            <strong>
                                {{ $category->created_at->format('Y-m-d') }}
                            </strong>
                        </div>


                        <div>
                            <i class="fa-solid fa-signal"></i>

                            <span>
                                {{ __('language.Status') }}
                            </span>

                            <strong>
                                {{ $category->status == 1 ? __('language.Active') : __('language.Inactive') }}
                            </strong>
                        </div>

                    </div>

                </div>

            </div>


            {{-- FOOTER --}}
            <div class="cert-cat-show-footer">

                <a href="{{ url()->previous() }}" class="cert-cat-show-back">
                    <i class="fa-solid fa-arrow-left"></i>
                    {{ __('language.Back') }}
                </a>

            </div>

        </div>
        ```

    </div>

    <style>
        /* =========================================
       CERTIFIED CATEGORY SHOW
       ========================================= */

        .cert-cat-show-page {
            width: 100%;
            padding: 35px 15px 40px;
            margin-top: 70px;
        }


        /* CARD */

        .cert-cat-show-card {
            width: 100%;
            max-width: 900px;
            margin: 0 auto;

            background: #ffffff;

            border-radius: 18px;

            border: 1px solid #e5e7eb;

            box-shadow: 0 12px 35px rgba(0, 0, 0, .10);

            overflow: hidden;
        }


        /* HEADER */

        .cert-cat-show-header {
            min-height: 75px;

            padding: 14px 22px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            background: #20203a;

            color: #ffffff;
        }


        .cert-cat-show-title {
            display: flex;
            align-items: center;
            gap: 12px;
        }


        .cert-cat-show-icon {
            width: 43px;
            height: 43px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 12px;

            background: #6f42c1;

            color: #ffffff;

            font-size: 18px;
        }


        .cert-cat-show-title small {
            display: block;

            color: #bfc1d4;

            font-size: 10px;

            margin-bottom: 2px;
        }


        .cert-cat-show-title h4 {
            margin: 0;

            font-size: 18px;

            font-weight: 700;

            color: #ffffff;
        }


        /* STATUS */

        .cert-cat-show-active,
        .cert-cat-show-inactive {
            display: inline-flex;

            align-items: center;

            gap: 6px;

            padding: 7px 12px;

            border-radius: 20px;

            font-size: 11px;

            font-weight: 700;
        }


        .cert-cat-show-active {
            background: #dff7ec;
            color: #168653;
        }


        .cert-cat-show-inactive {
            background: #ffe3e6;
            color: #d6334c;
        }


        /* MAIN */

        .cert-cat-show-main {
            display: grid;

            grid-template-columns: 210px 1fr;

            gap: 25px;

            padding: 25px;
        }


        /* IMAGE */

        .cert-cat-show-image-area {
            display: flex;

            justify-content: center;
            align-items: flex-start;
        }


        .cert-cat-show-image {
            width: 175px;
            height: 175px;

            object-fit: cover;

            border-radius: 50%;

            border: 5px solid #eee8ff;

            box-shadow:
                0 0 0 3px #7c5ac7,
                0 10px 25px rgba(111, 66, 193, .20);
        }


        .cert-cat-show-no-image {
            width: 175px;
            height: 175px;

            border-radius: 50%;

            display: flex;
            flex-direction: column;

            justify-content: center;
            align-items: center;

            gap: 8px;

            background: #f1efff;

            color: #6f42c1;
        }


        .cert-cat-show-no-image i {
            font-size: 35px;
        }


        /* INFO */

        .cert-cat-show-info {
            min-width: 0;
        }


        .cert-cat-show-row {
            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 12px;

            margin-bottom: 12px;
        }


        /* TITLE BOXES */

        .cert-cat-show-box {
            padding: 13px 15px;

            border-radius: 12px;

            background: #fafafa;

            border: 1px solid #e8e8ed;

            min-width: 0;
        }


        .cert-cat-show-box span {
            display: block;

            font-size: 10px;

            font-weight: 700;

            margin-bottom: 5px;

            color: #777;
        }


        .cert-cat-show-box strong {
            display: block;

            font-size: 14px;

            color: #252535;

            overflow: hidden;

            white-space: nowrap;

            text-overflow: ellipsis;
        }


        .cert-cat-show-purple {
            border-left: 4px solid #6f42c1;
        }


        .cert-cat-show-green {
            border-left: 4px solid #20a77c;
        }


        /* DESCRIPTIONS */

        .cert-cat-show-description {
            min-width: 0;

            padding: 13px 15px;

            border-radius: 12px;

            background: #fafafa;

            border: 1px solid #e8e8ed;
        }


        .cert-cat-show-description span {
            display: block;

            font-size: 10px;

            font-weight: 700;

            margin-bottom: 6px;
        }


        .cert-cat-show-description p {
            margin: 0;

            color: #555b66;

            font-size: 11px;

            line-height: 1.5;

            display: -webkit-box;

            -webkit-line-clamp: 2;

            -webkit-box-orient: vertical;

            overflow: hidden;
        }


        .cert-cat-show-purple-text {
            color: #6f42c1;
        }


        .cert-cat-show-green-text {
            color: #168653;
        }


        /* META */

        .cert-cat-show-meta {
            display: grid;

            grid-template-columns: repeat(3, 1fr);

            gap: 10px;
        }


        .cert-cat-show-meta>div {
            padding: 10px;

            border-radius: 11px;

            background: #f5f6fa;

            display: flex;

            align-items: center;

            gap: 7px;

            min-width: 0;
        }


        .cert-cat-show-meta i {
            color: #6f42c1;

            font-size: 14px;
        }


        .cert-cat-show-meta span {
            font-size: 9px;

            color: #888;

            white-space: nowrap;
        }


        .cert-cat-show-meta strong {
            font-size: 11px;

            color: #292936;

            margin-left: auto;
        }


        /* FOOTER */

        .cert-cat-show-footer {
            padding: 14px 25px;

            border-top: 1px solid #eeeeF2;

            text-align: center;

            background: #fafafd;
        }


        .cert-cat-show-back {
            display: inline-flex;

            align-items: center;

            gap: 7px;

            padding: 8px 18px;

            border-radius: 9px;

            background: #6f42c1;

            color: #ffffff;

            text-decoration: none;

            font-size: 12px;

            font-weight: 600;

            transition: .2s;
        }


        .cert-cat-show-back:hover {
            background: #59339d;

            color: #ffffff;

            transform: translateY(-1px);
        }


        /* MOBILE */

        @media (max-width: 700px) {

            .cert-cat-show-page {
                margin-top: 60px;
                padding: 20px 10px;
            }

            .cert-cat-show-main {
                grid-template-columns: 1fr;

                padding: 20px;
            }

            .cert-cat-show-image-area {
                justify-content: center;
            }

            .cert-cat-show-row {
                grid-template-columns: 1fr;
            }

            .cert-cat-show-meta {
                grid-template-columns: 1fr;
            }

            .cert-cat-show-header {
                padding: 13px 15px;
            }

        }
    </style>
@endsection
