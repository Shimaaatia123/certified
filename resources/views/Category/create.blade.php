@extends('layouts.app')

@section('content')
    <div class="container mt-4">

        <div class="row">
            <div class="col-md-8 m-auto">

                <div class="card shadow border-0">

                    <div class="card-header bg-success text-white text-center">
                        <i class="fa-solid fa-layer-group me-2"></i>
                        {{ __('language.✨Create Category') }}
                    </div>

                    <div class="card-body">

                        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Title EN -->
                            <label class="form-label">
                                <i class="fa-solid fa-font text-primary me-2"></i>
                                {{ __('language.Title EN') }}
                            </label>
                            <input type="text" name="title_en" class="form-control mb-3">

                            <!-- Title AR -->
                            <label class="form-label">
                                <i class="fa-solid fa-language text-success me-2"></i>
                                {{ __('language.Title AR') }}
                            </label>
                            <input type="text" name="title_ar" class="form-control mb-3">

                            <!-- Description EN -->
                            <label class="form-label">
                                <i class="fa-solid fa-align-left text-info me-2"></i>
                                {{ __('language.Description EN') }}
                            </label>
                            <textarea name="description_en" class="form-control mb-3"></textarea>

                            <!-- Description AR -->
                            <label class="form-label">
                                <i class="fa-solid fa-align-right text-warning me-2"></i>
                                {{ __('language.Description AR') }}
                            </label>
                            <textarea name="description_ar" class="form-control mb-3"></textarea>

                            <!-- Image -->
                            <label class="form-label">
                                <i class="fa-solid fa-image text-danger me-2"></i>
                                {{ __('language.Image') }}
                            </label>
                            <input type="file" name="image" class="form-control mb-3">

                            <!-- Status -->
                            <label class="form-label">
                                <i class="fa-solid fa-signal text-dark me-2"></i>
                                {{ __('language.Status') }}
                            </label>
                            <select name="status" class="form-control mb-3">
                                <option value="1">
                                    <i class="fa-solid fa-check"></i>
                                    {{ __('language.Active') }}
                                </option>
                                <option value="0">
                                    <i class="fa-solid fa-xmark"></i>
                                    {{ __('language.Inactive') }}
                                </option>
                            </select>

                            <!-- Button -->
                            <button class="btn btn-success w-100 py-2">
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
