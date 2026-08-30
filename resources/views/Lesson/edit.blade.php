@extends('layouts.app')

@section('content')
    <div class="container mt-4">

        <div class="row">
            <div class="col-md-8 m-auto">

                <div class="card border-0 shadow-lg">

                    {{-- HEADER --}}
                    <div class="card-header bg-warning text-dark text-center">
                        <h5 class="mb-0">
                            <i class="fas fa-pen-to-square me-2"></i>
                            {{ __('language.Edit Lesson') }}

                            <span class="badge bg-dark ms-2">
                                #{{ $lesson->id }}
                            </span>
                        </h5>
                    </div>

                    {{-- BODY --}}
                    <div class="card-body">

                        <form action="{{ route('lessons.update', $lesson->id) }}" method="POST"
                            enctype="multipart/form-data">

                            @csrf
                            @method('PUT')

                            {{-- COURSE --}}
                            <label>
                                <i class="fas fa-book me-1 text-primary"></i>
                                {{ __('language.Course') }}
                            </label>
                            <input type="number" name="course_id" value="{{ old('course_id', $lesson->course_id) }}"
                                class="form-control mb-3">

                            {{-- TITLE AR --}}
                            <label>
                                <i class="fas fa-language me-1 text-success"></i>
                                {{ __('language.Title AR') }}
                            </label>
                            <input type="text" name="title_ar" value="{{ old('title_ar', $lesson->title_ar) }}"
                                class="form-control mb-3">

                            {{-- TITLE EN --}}
                            <label>
                                <i class="fas fa-language me-1 text-info"></i>
                                {{ __('language.Title EN') }}
                            </label>
                            <input type="text" name="title_en" value="{{ old('title_en', $lesson->title_en) }}"
                                class="form-control mb-3">

                            {{-- CONTENT AR --}}
                            <label>
                                <i class="fas fa-file-lines me-1 text-success"></i>
                                {{ __('language.Content AR') }}
                            </label>
                            <textarea name="content_ar" class="form-control mb-3" rows="3">{{ old('content_ar', $lesson->content_ar) }}</textarea>

                            {{-- CONTENT EN --}}
                            <label>
                                <i class="fas fa-file-lines me-1 text-info"></i>
                                {{ __('language.Content EN') }}
                            </label>
                            <textarea name="content_en" class="form-control mb-3" rows="3">{{ old('content_en', $lesson->content_en) }}</textarea>

                            {{-- VIDEO --}}
                            <label>
                                <i class="fas fa-video me-1 text-danger"></i>
                                {{ __('language.Video URL') }}
                            </label>
                            <input type="url" name="video_url" value="{{ old('video_url', $lesson->video_url) }}"
                                class="form-control mb-3">

                            {{-- ORDER --}}
                            <label>
                                <i class="fas fa-list-ol me-1 text-warning"></i>
                                {{ __('language.Order') }}
                            </label>
                            <input type="number" name="order" value="{{ old('order', $lesson->order) }}"
                                class="form-control mb-3">

                            {{-- STATUS --}}
                            <label>
                                <i class="fas fa-toggle-on me-1 text-primary"></i>
                                {{ __('language.Status') }}
                            </label>

                            <select name="status" class="form-control mb-4">

                                <option value="1" {{ $lesson->status == 1 ? 'selected' : '' }}>
                                    {{ __('language.Active') }}
                                </option>

                                <option value="0" {{ $lesson->status == 0 ? 'selected' : '' }}>
                                    {{ __('language.Inactive') }}
                                </option>

                            </select>

                            {{-- BUTTON --}}
                            <button class="btn btn-warning w-100">
                                <i class="fas fa-floppy-disk me-2"></i>
                                {{ __('language.Update Lesson') }}
                            </button>

                        </form>

                    </div>

                </div>

            </div>
        </div>

    </div>
@endsection
