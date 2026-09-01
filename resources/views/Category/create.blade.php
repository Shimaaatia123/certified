@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-5 pt-5 px-4">

        <div class="row">
            <div class="col-lg-11 col-xl-10 m-auto">

                <div class="card shadow border-0">

                    <div class="card-header bg-success text-white text-center py-2">
                        <i class="fa-solid fa-layer-group me-2"></i>
                        {{ __('language.✨Create Category') }}
                    </div>

                    <div class="card-body py-2">

                        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">

                                {{-- LEFT COLUMN --}}
                                <div class="col-md-6">

                                    <!-- Title EN -->
                                    <label class="form-label small mb-1">
                                        <i class="fa-solid fa-font text-primary me-2"></i>
                                        {{ __('language.Title EN') }}
                                    </label>
                                    <input type="text" name="title_en" class="form-control form-control-sm mb-2">

                                    <!-- Description EN -->
                                    <label class="form-label small mb-1">
                                        <i class="fa-solid fa-align-left text-info me-2"></i>
                                        {{ __('language.Description EN') }}
                                    </label>
                                    <textarea name="description_en" class="form-control form-control-sm mb-2" rows="2"></textarea>

                                </div>

                                {{-- RIGHT COLUMN --}}
                                <div class="col-md-6">

                                    <!-- Title AR -->
                                    <label class="form-label small mb-1">
                                        <i class="fa-solid fa-language text-success me-2"></i>
                                        {{ __('language.Title AR') }}
                                    </label>
                                    <input type="text" name="title_ar" class="form-control form-control-sm mb-2">

                                    <!-- Description AR -->
                                    <label class="form-label small mb-1">
                                        <i class="fa-solid fa-align-right text-warning me-2"></i>
                                        {{ __('language.Description AR') }}
                                    </label>
                                    <textarea name="description_ar" class="form-control form-control-sm mb-2" rows="2"></textarea>

                                </div>

                            </div>

                            <div class="row">

                                {{-- IMAGE --}}
                                <div class="col-md-6">
                                    <label class="form-label small mb-1">
                                        <i class="fa-solid fa-image text-danger me-2"></i>
                                        {{ __('language.Image') }}
                                    </label>
                                    <input type="file" name="image" class="form-control form-control-sm mb-2">
                                </div>

                                {{-- STATUS --}}
                                <div class="col-md-6">
                                    <label class="form-label small mb-1">
                                        <i class="fa-solid fa-signal text-dark me-2"></i>
                                        {{ __('language.Status') }}
                                    </label>
                                    <select name="status" class="form-control form-control-sm mb-2">
                                        <option value="1">
                                            {{ __('language.Active') }}
                                        </option>
                                        <option value="0">
                                            {{ __('language.Inactive') }}
                                        </option>
                                    </select>
                                </div>

                            </div>

                            <!-- Button -->
                            <button class="btn btn-success w-100 btn-sm">
                                <i class="fa-solid fa-floppy-disk me-2"></i>
                                {{ __('language.Save Category') }}
                            </button>

                        </form>

                    </div>

                </div>

            </div>
        </div>

    </div>
@endsection