@extends('layouts.app')

@section('title', __('pages.home.meta_title'))

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/contact/contact-success.css') }}">
@endpush

@section('content')

    {{-- =====================================================
         CONTACT SUCCESS MESSAGE
         ===================================================== --}}
    @if (session('contact_message'))
        <div class="certified-contact-success" role="status">
            <span class="certified-contact-success__icon" aria-hidden="true">
                ✓
            </span>

            <span class="certified-contact-success__text">
                {{ session('contact_message') }}
            </span>
        </div>
    @endif

    <x-ui.home.hero />
    <x-ui.home.trusted />
    <x-ui.home.about />
    <x-ui.home.features />
    <x-ui.home.testimonials />
    <x-ui.home.stats />
    <x-ui.home.services />
    <x-ui.home.how-it-works />
    <x-ui.home.call-to-action />
    <x-ui.home.faq />
    <x-ui.footer />
    <x-ui.back-to-top />
@endsection
