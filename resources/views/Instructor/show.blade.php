@extends('layouts.app')

@section('content')
    <div class="container mt-5 pt-5">

        <div class="row">
            <div class="col-md-9 m-auto">

                <div class="card shadow border-0">

                    {{-- Header --}}
                    <div class="card-header bg-dark text-white text-center">
                        <h5 class="mb-0">
                            <i class="fas fa-chalkboard-user me-2"></i>
                            {{ __('language.Instructor Details') }}

                            <span class="badge bg-primary ms-2">
                                #{{ $instructor->id }}
                            </span>
                        </h5>
                    </div>

                    {{-- Body --}}
                    <div class="card-body">

                        <div class="row align-items-center">

                            {{-- Image --}}
                            <div class="col-md-4 text-center mb-3">

                                @if ($instructor->image)
                                    <img src="{{ asset('storage/' . $instructor->image) }}" class="rounded-circle shadow"
                                        width="170" height="170" alt="{{ __('language.Instructor Image') }}">
                                @else
                                    <div class="text-muted">
                                        <i class="fas fa-image fa-3x mb-2"></i>
                                        <p>{{ __('language.No Image') }}</p>
                                    </div>
                                @endif

                            </div>

                            {{-- Details --}}
                            <div class="col-md-8">

                                <table class="table table-bordered table-hover align-middle">

                                    <tr>
                                        <th width="35%">
                                            <i class="fas fa-fingerprint me-2"></i>
                                            {{ __('language.ID💎') }}
                                        </th>
                                        <td>{{ $instructor->id }}</td>
                                    </tr>

                                    <tr>
                                        <th>
                                            <i class="fas fa-user me-2"></i>
                                            {{ __('language.Name') }}
                                        </th>
                                        <td>{{ $instructor->name }}</td>
                                    </tr>

                                    <tr>
                                        <th>
                                            <i class="fas fa-envelope me-2"></i>
                                            {{ __('language.Email') }}
                                        </th>
                                        <td>{{ $instructor->email }}</td>
                                    </tr>

                                    <tr>
                                        <th>
                                            <i class="fas fa-file-lines me-2"></i>
                                            {{ __('language.Bio') }}
                                        </th>
                                        <td>{{ $instructor->bio }}</td>
                                    </tr>

                                    <tr>
                                        <th>
                                            <i class="fas fa-mobile-screen-button me-2"></i>
                                            {{ __('language.Phone') }}
                                        </th>
                                        <td>{{ $instructor->phone ?? '-' }}</td>
                                    </tr>

                                    <tr>
                                        <th>
                                            <i class="fas fa-signal me-2"></i>
                                            {{ __('language.Status') }}
                                        </th>
                                        <td>
                                            @if ($instructor->status == 1)
                                               
                                                    <i class="fas fa-circle-check me-1"></i>
                                                    {{ __('language.Active') }}
                                               
                                            @else
                                               
                                                    <i class="fas fa-circle-xmark me-1"></i>
                                                    {{ __('language.Inactive') }}
                                               
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>
                                            <i class="fas fa-calendar-days me-2"></i>
                                            {{ __('language.Created At') }}
                                        </th>
                                        <td>{{ $instructor->created_at }}</td>
                                    </tr>

                                </table>

                            </div>

                        </div>

                        <div class="text-center mt-4">
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-success">
                                <i class="fas fa-house me-2"></i>
                                {{ __('language.Back Home') }}
                            </a>
                        </div>

                    </div>

                </div>

            </div>
        </div>

    </div>
@endsection
