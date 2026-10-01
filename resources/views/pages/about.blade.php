@extends('layouts.app')

@section('title', __('pages.about.meta_title'))
@section('content')
    <x-ui.about.about />

    <x-ui.about.trust-story />

    <x-ui.about.verification-engine />

    <x-ui.about.verification-intelligence />

    <x-ui.about.verification-verdict />

    <x-ui.footer />

    <x-ui.back-to-top />
@endsection
