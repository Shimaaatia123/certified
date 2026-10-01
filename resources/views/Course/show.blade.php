@extends('layouts.app') 
 
@section('content') 
    {{-- ================= COURSE DETAILS ================= --}} 
    <div class="container course-show-container"> 
 
        <div class="row"> 
            <div class="col-md-11 m-auto"> 
 
                <div class="card shadow border-0"> 
 
                    {{-- ================= HEADER ================= --}} 
                    <div class="card-header bg-primary text-white text-center"> 
 
                        <h5 class="mb-0"> 
 
                            <i class="fas fa-book-open me-2"></i> 
 
                            {{ __('language.Course Details') }} 
 
                            <span class="badge bg-dark ms-2"> 
                                #{{ $course->id }} 
                            </span> 
 
                        </h5> 
 
                    </div> 
 
 
                    {{-- ================= BODY ================= --}} 
                    <div class="card-body p-0"> 
 
                        <div class="table-responsive"> 
 
                            <table class="table table-bordered text-center align-middle mb-0"> 
 
                                {{-- ================= TABLE HEADER ================= --}} 
                                <thead class="table-dark"> 
 
                                    <tr> 
 
                                        <th> 
                                            <i class="fas fa-fingerprint me-1"></i>
                                            {{ __('language.ID💎') }} 
                                        </th> 
 
                                        <th> 
                                            <i class="fas fa-heading me-1"></i>
                                            {{ __('language.Title AR') }} 
                                        </th> 
 
                                        <th> 
                                            <i class="fas fa-heading me-1"></i>
                                            {{ __('language.Title EN') }} 
                                        </th> 
 
                                        <th> 
                                            <i class="fas fa-align-right me-1"></i>
                                            {{ __('language.Description AR') }} 
                                        </th> 
 
                                        <th> 
                                            <i class="fas fa-align-left me-1"></i>
                                            {{ __('language.Description EN') }} 
                                        </th> 
 
                                        <th> 
                                            <i class="fas fa-dollar-sign me-1"></i>
                                            {{ __('language.Price') }} 
                                        </th> 
 
                                        <th> 
                                            <i class="fas fa-clock me-1"></i>
                                            {{ __('language.Duration') }} 
                                        </th> 
 
                                        <th> 
                                            <i class="fas fa-award me-1"></i>
                                            {{ __('language.Badge') }} 
                                        </th> 
 
                                        <th> 
                                            <i class="fas fa-image me-1"></i>
                                            {{ __('language.Image') }} 
                                        </th> 
 
                                        <th> 
                                            <i class="fas fa-toggle-on me-1"></i>
                                            {{ __('language.Status') }} 
                                        </th> 
 
                                        <th> 
                                            <i class="fas fa-calendar-days me-1"></i>
                                            {{ __('language.Created At') }} 
                                        </th> 
 
                                        <th> 
                                            <i class="fas fa-bolt me-1"></i>
                                            {{ __('language.Action') }} 
                                        </th> 
 
                                    </tr> 
 
                                </thead> 
 
 
                                {{-- ================= TABLE BODY ================= --}} 
                                <tbody> 
 
                                    <tr> 
 
                                        {{-- ID --}} 
                                        <td> 
 
                                           <i class="fas fa-fingerprint me-1"></i>
                                                {{ $course->id }} 
                                           
 
                                        </td> 
 
 
                                        {{-- TITLE AR --}} 
                                        <td> 
                                            {{ $course->title_ar }} 
                                        </td> 
 
 
                                        {{-- TITLE EN --}} 
                                        <td> 
                                            {{ $course->title_en }} 
                                        </td> 
 
 
                                        {{-- DESCRIPTION AR --}} 
                                        <td> 
                                            {{ Str::limit($course->description_ar, 50) }} 
                                        </td> 
 
 
                                        {{-- DESCRIPTION EN --}} 
                                        <td> 
                                            {{ Str::limit($course->description_en, 50) }} 
                                        </td> 
 
 
                                        {{-- PRICE --}} 
                                        <td> 
 
                                            ${{ $course->price }} 
 
                                        </td> 
 
                                        <td> 
                                            <i class="bi bi-clock-fill me-1"></i> 
                                            {{ __('language.' . $course->duration) }} 
                                        </td> 
 
                                        <td> 
                                            <i class="bi bi-award-fill me-1"></i> 
                                            {{ __('language.' . $course->badge) }} 
                                        </td> 
 
 
                                        {{-- IMAGE --}} 
                                        <td> 
 
                                            @if ($course->image) 
                                                <img src="{{ asset('storage/' . $course->image) }}" width="60" 
                                                    height="60" class="rounded shadow" alt="{{ $course->title_en }}"> 
                                            @else 
                                                <span class="text-muted"> 
                                                    {{ __('language.No Image') }} 
                                                </span> 
                                            @endif 
 
                                        </td> 
 
 
                                        {{-- STATUS --}} 
                                        <td> 
                                            @if ($course->status) 
                                                 
                                                <i class="fas fa-check me-1"></i> 
                                                {{ __('language.Active') }} 
                                                 
                                            @else 
                                                 
                                                <i class="fas fa-xmark me-1"></i> 
                                                {{ __('language.Inactive') }} 
                                                
                                            @endif 
                                        </td> 
 
 
                                        {{-- CREATED AT --}} 
                                        <td> 
 
                                            <i class="fas fa-clock text-muted me-1"></i> 
 
                                            {{ $course->created_at }} 
 
                                        </td> 
 
 
                                        {{-- ACTION --}} 
                                        <td> 
 
                                            <a href="{{ route('admin.dashboard') }}" class="btn btn-success btn-sm">
 
                                                <i class="fas fa-house me-1"></i> 
 
                                                {{ __('language.Back Home') }} 
 
                                            </a> 
 
                                        </td> 
 
                                    </tr> 
 
                                </tbody> 
 
                            </table> 
 
                        </div> 
 
                    </div> 
 
                </div> 
 
            </div> 
        </div> 
 
    </div> 
 
 
    {{-- ================= PAGE SPACING ================= --}} 
    <style> 
        .course-show-container { 
            margin-top: 100px; 
            padding-top: 30px; 
            padding-bottom: 50px; 
        } 
    </style> 
@endsection
