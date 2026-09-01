@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-5 pt-5 px-4">

        <div class="row">
            <div class="col-lg-11 col-xl-10 m-auto">

                <div class="card shadow border-0">

                    <div class="card-header bg-warning text-dark text-center py-2">
                        <i class="fa-solid fa-pen-to-square me-2"></i>
                        {{ __('language.✨Edit Category #') }}{{ $category->id }}
                    </div>

                    <div class="card-body py-2">

                        <form action="{{ route('categories.update', $category->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">

                                {{-- LEFT COLUMN --}}
                                <div class="col-md-6">

                                    <!-- Title EN -->
                                    <label class="form-label small mb-1">
                                        <i class="fa-solid fa-font text-primary me-2"></i>
                                        {{ __('language.Title EN') }}
                                    </label>
                                    <input type="text" name="title_en" value="{{ $category->title_en }}"
                                        class="form-control form-control-sm mb-2">

                                    <!-- Description EN -->
                                    <label class="form-label small mb-1">
                                        <i class="fa-solid fa-align-left text-info me-2"></i>
                                        {{ __('language.Description EN') }}
                                    </label>
                                    <textarea name="description_en" class="form-control form-control-sm mb-2" rows="2">{{ $category->description_en }}</textarea>

                                </div>

                                {{-- RIGHT COLUMN --}}
                                <div class="col-md-6">

                                    <!-- Title AR -->
                                    <label class="form-label small mb-1">
                                        <i class="fa-solid fa-language text-success me-2"></i>
                                        {{ __('language.Title AR') }}
                                    </label>
                                    <input type="text" name="title_ar" value="{{ $category->title_ar }}"
                                        class="form-control form-control-sm mb-2">

                                    <!-- Description AR -->
                                    <label class="form-label small mb-1">
                                        <i class="fa-solid fa-align-right text-warning me-2"></i>
                                        {{ __('language.Description AR') }}
                                    </label>
                                    <textarea name="description_ar" class="form-control form-control-sm mb-2" rows="2">{{ $category->description_ar }}</textarea>

                                </div>

                            </div>

                            <div class="row">

                                {{-- IMAGE --}}
                                <div class="col-md-6">
                                    <label class="form-label small mb-1">
                                        <i class="fa-solid fa-image text-danger me-2"></i>
                                        {{ __('language.Image') }}
                                    </label>

                                    <div class="d-flex align-items-center gap-2">
                                        <input type="file" name="image" class="form-control form-control-sm">

                                        @if ($category->image)
                                            <img src="{{ asset('storage/' . $category->image) }}" width="40"
                                                class="rounded shadow-sm">
                                        @endif
                                    </div>
                                </div>

                                {{-- STATUS --}}
                                <div class="col-md-6">
                                    <label class="form-label small mb-1">
                                        <i class="fa-solid fa-signal text-dark me-2"></i>
                                        {{ __('language.Status') }}
                                    </label>
                                    <select name="status" class="form-control form-control-sm">
                                        <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>
                                            {{ __('language.Active') }}
                                        </option>

                                        <option value="0" {{ $category->status == 0 ? 'selected' : '' }}>
                                            {{ __('language.Inactive') }}
                                        </option>
                                    </select>
                                </div>

                            </div>

                            <!-- Button -->
                            <button class="btn btn-primary w-100 btn-sm mt-2">
                                <i class="fa-solid fa-floppy-disk me-2"></i>
                                {{ __('language.Update Category') }}
                            </button>

                        </form>

                    </div>

                </div>

            </div>
        </div>

    </div>
@endsection