@extends('layouts.app')

@section('content')
    <div class="container mt-4">

        <div class="row">
            <div class="col-md-8 m-auto">

                <div class="card shadow border-0">

                    <div class="card-header bg-success text-white text-center">
                        <h5 class="mb-0">
                            <i class="fas fa-user-plus me-2"></i>
                            {{ __('language.Create Instructor') }}
                        </h5>
                    </div>

                    <div class="card-body">

                        <form action="{{ route('instructors.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf

                            <label>
                                <i class="fas fa-user me-1 text-primary"></i>
                                {{ __('language.Name') }}
                            </label>
                            <input type="text" name="name" class="form-control mb-3" value="{{ old('name') }}">

                            @error('name')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror


                            <label>
                                <i class="fas fa-envelope me-1 text-danger"></i>
                                {{ __('language.Email') }}
                            </label>
                            <input type="email" name="email" class="form-control mb-3" value="{{ old('email') }}">

                            @error('email')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror


                            <label>
                                <i class="fas fa-file-lines me-1 text-success"></i>
                                {{ __('language.Bio') }}
                            </label>
                            <textarea name="bio" rows="4" class="form-control mb-3">{{ old('bio') }}</textarea>

                            @error('bio')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror


                            <label>
                                <i class="fas fa-image me-1 text-info"></i>
                                {{ __('language.Image') }}
                            </label>
                            <input type="file" name="image" class="form-control mb-3">

                            @error('image')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror


                            <label>
                                <i class="fas fa-phone me-1 text-primary"></i>
                                {{ __('language.Phone') }}
                            </label>
                            <input type="text" name="phone" class="form-control mb-3" value="{{ old('phone') }}">

                            @error('phone')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror


                            <label>
                                <i class="fas fa-toggle-on me-1 text-success"></i>
                                {{ __('language.Status') }}
                            </label>

                            <select name="status" class="form-control mb-4">

                                <option value="">
                                    {{ __('language.Choose Status') }}
                                </option>

                                <option value="1">
                                    {{ __('language.Active') }}
                                </option>

                                <option value="0">
                                    {{ __('language.Inactive') }}
                                </option>

                            </select>

                            <button class="btn btn-success w-100">
                                <i class="fas fa-circle-plus me-2"></i>
                                {{ __('language.Create New Instructor') }}
                            </button>

                        </form>

                    </div>

                </div>

            </div>
        </div>

    </div>
@endsection
