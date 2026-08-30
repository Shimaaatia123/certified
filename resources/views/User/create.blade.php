@extends('layouts.app')

@section('content')
    <div class="container mt-4">

        <div class="row">
            <div class="col-md-8 m-auto">

                <div class="card border-0 shadow-lg">

                    {{-- HEADER --}}
                    <div class="card-header bg-success text-white text-center">
                        <h5 class="mb-0">
                            <i class="fas fa-user-plus me-2"></i>
                            {{ __('language.Create User') }}
                        </h5>
                    </div>

                    {{-- BODY --}}
                    <div class="card-body">

                        <form action="{{ route('users.store') }}" method="POST">
                            @csrf

                            {{-- NAME --}}
                            <label>
                                <i class="fas fa-user me-1 text-primary"></i>
                                {{ __('language.Name') }}
                            </label>

                            <input type="text" name="name" class="form-control mb-3" value="{{ old('name') }}">

                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            {{-- EMAIL --}}
                            <label>
                                <i class="fas fa-envelope me-1 text-info"></i>
                                {{ __('language.Email') }}
                            </label>

                            <input type="email" name="email" class="form-control mb-3" value="{{ old('email') }}">

                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            {{-- PASSWORD --}}
                            <label>
                                <i class="fas fa-lock me-1 text-danger"></i>
                                {{ __('language.Password') }}
                            </label>

                            <input type="password" name="password" class="form-control mb-3">

                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            {{-- ROLE --}}
                            <label>
                                <i class="fas fa-user-shield me-1 text-dark"></i>
                                {{ __('language.Role') }}
                            </label>

                            <select name="role" class="form-control mb-3">

                                <option value="">
                                    {{ __('language.Choose Role') }}
                                </option>

                                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>
                                    {{ __('language.Admin') }}
                                </option>

                                <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>
                                    {{ __('language.User') }}
                                </option>

                            </select>

                            @error('role')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            {{-- STATUS --}}
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

                            @error('status')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            {{-- BUTTON --}}
                            <button type="submit" class="btn btn-success w-100">
                                <i class="fas fa-circle-plus me-2"></i>
                                {{ __('language.Save User') }}
                            </button>

                        </form>

                    </div>

                </div>

            </div>
        </div>

    </div>
@endsection
