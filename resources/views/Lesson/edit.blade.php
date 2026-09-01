@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-5 pt-5 px-4">

        <div class="row">
            <div class="col-lg-11 col-xl-10 m-auto">

                <div class="card border-0 shadow-lg">

                    {{-- HEADER --}}
                    <div class="card-header bg-warning text-dark text-center py-2">
                        <h6 class="mb-0">
                            <i class="fas fa-pen-to-square me-2"></i>
                            {{ __('language.Edit Lesson') }}

                            <span class="badge bg-dark ms-2">
                                #{{ $lesson->id }}
                            </span>
                        </h6>
                    </div>

                    {{-- BODY --}}
                    <div class="card-body py-2">

                        <form action="{{ route('lessons.update', $lesson->id) }}" method="POST"
                            enctype="multipart/form-data">

                            @csrf
                            @method('PUT')

                            <div class="row">

                                {{-- LEFT COLUMN --}}
                                <div class="col-md-6">

                                    {{-- COURSE --}}
                                    <label class="small mb-1">
                                        <i class="fas fa-book me-1 text-primary"></i>
                                        {{ __('language.Course') }}
                                    </label>
                                    <input type="number" name="course_id" value="{{ old('course_id', $lesson->course_id) }}"
                                        class="form-control form-control-sm mb-2">

                                    {{-- TITLE AR --}}
                                    <label class="small mb-1">
                                        <i class="fas fa-language me-1 text-success"></i>
                                        {{ __('language.Title AR') }}
                                    </label>
                                    <input type="text" name="title_ar" value="{{ old('title_ar', $lesson->title_ar) }}"
                                        class="form-control form-control-sm mb-2">

                                    {{-- CONTENT AR --}}
                                    <label class="small mb-1">
                                        <i class="fas fa-file-lines me-1 text-success"></i>
                                        {{ __('language.Content AR') }}
                                    </label>
                                    <textarea name="content_ar" class="form-control form-control-sm mb-2" rows="2">{{ old('content_ar', $lesson->content_ar) }}</textarea>

                                    {{-- VIDEO --}}
                                    <label class="small mb-1">
                                        <i class="fas fa-video me-1 text-danger"></i>
                                        {{ __('language.Video URL') }}
                                    </label>
                                    <input type="url" name="video_url" value="{{ old('video_url', $lesson->video_url) }}"
                                        class="form-control form-control-sm mb-2">

                                </div>

                                {{-- RIGHT COLUMN --}}
                                <div class="col-md-6">

                                    {{-- TITLE EN --}}
                                    <label class="small mb-1">
                                        <i class="fas fa-language me-1 text-info"></i>
                                        {{ __('language.Title EN') }}
                                    </label>
                                    <input type="text" name="title_en" value="{{ old('title_en', $lesson->title_en) }}"
                                        class="form-control form-control-sm mb-2">

                                    {{-- CONTENT EN --}}
                                    <label class="small mb-1">
                                        <i class="fas fa-file-lines me-1 text-info"></i>
                                        {{ __('language.Content EN') }}
                                    </label>
                                    <textarea name="content_en" class="form-control form-control-sm mb-2" rows="2">{{ old('content_en', $lesson->content_en) }}</textarea>

                                    {{-- ORDER --}}
                                    <label class="small mb-1">
                                        <i class="fas fa-list-ol me-1 text-warning"></i>
                                        {{ __('language.Order') }}
                                    </label>
                                    <input type="number" name="order" value="{{ old('order', $lesson->order) }}"
                                        class="form-control form-control-sm mb-2">

                                </div>

                            </div>

                            {{-- STATUS + BUTTON in one row --}}
                            <div class="row align-items-end">
                                <div class="col-md-8">
                                    <label class="small mb-1">
                                        <i class="fas fa-toggle-on me-1 text-primary"></i>
                                        {{ __('language.Status') }}
                                    </label>

                                    <select name="status" class="form-control form-control-sm">

                                        <option value="1" {{ $lesson->status == 1 ? 'selected' : '' }}>
                                            {{ __('language.Active') }}
                                        </option>

                                        <option value="0" {{ $lesson->status == 0 ? 'selected' : '' }}>
                                            {{ __('language.Inactive') }}
                                        </option>

                                    </select>
                                </div>

                                <div class="col-md-4">
                                    {{-- BUTTON --}}
                                    <button class="btn btn-warning btn-sm w-100">
                                        <i class="fas fa-floppy-disk me-2"></i>
                                        {{ __('language.Update Lesson') }}
                                    </button>
                                </div>
                            </div>

                        </form>

                    </div>

                </div>

            </div>
        </div>

    </div>
@endsection