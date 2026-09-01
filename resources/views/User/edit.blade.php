@extends('layouts.app')

@section('content')
<div class="container mt-5 pt-5">

    <div class="row">
        <div class="col-md-8 m-auto">

            <div class="card border-0 shadow-lg">

                {{-- HEADER --}}
                <div class="card-header bg-warning text-dark text-center">
                    <h5 class="mb-0">
                        <i class="fas fa-user-pen me-2"></i>
                        {{ __('language.Update User') }}

                        <span class="badge bg-dark ms-2">
                            #{{ $user->id }}
                        </span>
                    </h5>
                </div>

                {{-- BODY --}}
                <div class="card-body">

                    <form method="POST" action="{{ route('users.update', $user->id) }}">
                        @csrf
                        @method('PUT')

                        {{-- NAME --}}
                        <label>
                            <i class="fas fa-user me-1 text-primary"></i>
                            {{ __('language.Name') }}
                        </label>

                        <input type="text"
                               name="name"
                               value="{{ old('name', $user->name) }}"
                               class="form-control mb-3">

                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        {{-- EMAIL --}}
                        <label>
                            <i class="fas fa-envelope me-1 text-info"></i>
                            {{ __('language.Email') }}
                        </label>

                        <input type="email"
                               name="email"
                               value="{{ old('email', $user->email) }}"
                               class="form-control mb-3">

                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        {{-- PASSWORD --}}
                        <label>
                            <i class="fas fa-lock me-1 text-danger"></i>
                            {{ __('language.Password') }}
                        </label>

                        <input type="password"
                               name="password"
                               class="form-control mb-3"
                               placeholder="{{ __('language.Leave empty to keep current password') }}">

                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        {{-- ROLE --}}
                        <label>
                            <i class="fas fa-user-shield me-1 text-dark"></i>
                            {{ __('language.Role') }}
                        </label>

                        <select name="role" class="form-control mb-3">

                            <option value="user"
                                {{ $user->role == 'user' ? 'selected' : '' }}>
                                {{ __('language.User') }}
                            </option>

                            <option value="admin"
                                {{ $user->role == 'admin' ? 'selected' : '' }}>
                                {{ __('language.Admin') }}
                            </option>

                        </select>

                        {{-- STATUS --}}
                        <label>
                            <i class="fas fa-toggle-on me-1 text-success"></i>
                            {{ __('language.Status') }}
                        </label>

                        <select name="status" class="form-control mb-4">

                            <option value="1"
                                {{ $user->status == 1 ? 'selected' : '' }}>
                                {{ __('language.Active') }}
                            </option>

                            <option value="0"
                                {{ $user->status == 0 ? 'selected' : '' }}>
                                {{ __('language.Inactive') }}
                            </option>

                        </select>

                        {{-- BUTTON --}}
                        <button type="submit" class="btn btn-success w-100">
                            <i class="fas fa-circle-check me-2"></i>
                            {{ __('language.Update User') }}
                        </button>

                    </form>

                </div>

            </div>

        </div>
    </div>

</div>
@endsection