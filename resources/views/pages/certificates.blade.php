@extends('layouts.app')

@section('title', __('certificates.meta_title'))

@section('content')

    <x-ui.certificate.hero />
    <x-ui.certificate.journey />
    <x-ui.certificate.trust-system />
    <x-ui.certificate.certificate-cta />
    <x-ui.certificate.tasks />
    <x-ui.certificate.Certificate_Spotlight />
    <x-ui.certificate.verification-demo />
    <x-ui.footer />
    <x-ui.back-to-top />

@endsection
