@extends('layouts.app')

@section('title', __('pages.courses.meta_title'))

@section('content')
  
@include('components.ui.course.courses', [
    'courses' => $courses
])

    <x-ui.course.hero />
    <x-ui.course.categories />
     <x-ui.course.featured-courses /> 
    <x-ui.course.testimonials />
    <x-ui.course.learning-journey />
    <x-ui.course.course-cta />
    <x-ui.footer />

@endsection