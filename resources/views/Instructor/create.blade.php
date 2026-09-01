@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-5 pt-5 px-4">

        <div class="row">
            <div class="col-lg-11 col-xl-10 m-auto">

                <div class="card shadow border-0">

                    <div class="card-header bg-success text-white text-center py-2">
                        <h6 class="mb-0">
                            <i class="fas fa-user-plus me-2"></i>
                            {{ __('language.Create Instructor') }}
                        </h6>
                    </div>

                    <div class="card-body py-2">

                        <form action="{{ route('instructors.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf

                            <div class="row">

                                {{-- LEFT COLUMN --}}
                                <div class="col-md-6">

                                    <label class="small mb-1">
                                        <i class="fas fa-user me-1 text-primary"></i>
                                        {{ __('language.Name') }}
                                    </label>
                                    <input type="text" name="name" class="form-control form-control-sm mb-2" value="{{ old('name') }}">

                                    @error('name')
                                        <div class="alert alert-danger py-1 px-2 small mb-2">
                                            {{ $message }}
                                        </div>
                                    @enderror


                                    <label class="small mb-1">
                                        <i class="fas fa-envelope me-1 text-danger"></i>
                                        {{ __('language.Email') }}
                                    </label>
                                    <input type="email" name="email" class="form-control form-control-sm mb-2" value="{{ old('email') }}">

                                    @error('email')
                                        <div class="alert alert-danger py-1 px-2 small mb-2">
                                            {{ $message }}
                                        </div>
                                    @enderror


                                    <label class="small mb-1">
                                        <i class="fas fa-phone me-1 text-primary"></i>
                                        {{ __('language.Phone') }}
                                    </label>
                                    <input type="text" name="phone" class="form-control form-control-sm mb-2" value="{{ old('phone') }}">

                                    @error('phone')
                                        <div class="alert alert-danger py-1 px-2 small mb-2">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                                {{-- RIGHT COLUMN --}}
                                <div class="col-md-6">

                                    <label class="small mb-1">
                                        <i class="fas fa-file-lines me-1 text-success"></i>
                                        {{ __('language.Bio') }}
                                    </label>
                                    <textarea name="bio" rows="3" class="form-control form-control-sm mb-2">{{ old('bio') }}</textarea>

                                    @error('bio')
                                        <div class="alert alert-danger py-1 px-2 small mb-2">
                                            {{ $message }}
                                        </div>
                                    @enderror


                                    <label class="small mb-1">
                                        <i class="fas fa-image me-1 text-info"></i>
                                        {{ __('language.Image') }}
                                    </label>
                                    <input type="file" name="image" class="form-control form-control-sm mb-2">

                                    @error('image')
                                        <div class="alert alert-danger py-1 px-2 small mb-2">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                            </div>

                            {{-- STATUS + BUTTON in one row --}}
                            <div class="row align-items-end">
                                <div class="col-md-8">
                                    <label class="small mb-1">
                                        <i class="fas fa-toggle-on me-1 text-success"></i>
                                        {{ __('language.Status') }}
                                    </label>

                                    <select name="status" class="form-control form-control-sm">

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
                                </div>

                                <div class="col-md-4">
                                    <button class="btn btn-success btn-sm w-100">
                                        <i class="fas fa-circle-plus me-2"></i>
                                        {{ __('language.Create New Instructor') }}
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