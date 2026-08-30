@extends('layouts.app')

@section('content')
    <div class="container mt-5 pt-5" style="margin-top: 100px !important;">

        <div class="row">
            <div class="col-md-9 m-auto">

                <div class="card shadow border-0">

                    <div class="card-header bg-dark text-white text-center">
                        <h5 class="mb-0">
                            <i class="fa-solid fa-graduation-cap me-2"></i>
                            {{ __('language.✨Enrollment Details') }}
                            <span class="badge bg-primary ms-2">#{{ $enrollment->id }}</span>
                        </h5>
                    </div>

                    <div class="card-body">

                        <table class="table table-bordered table-hover text-center align-middle">

                            <thead class="table-dark">
                                <tr>
                                    <th>
                                        <i class="fa-solid fa-fingerprint text-info me-1"></i>
                                        {{ __('language.ID💎') }}
                                    </th>

                                    <th>
                                        <i class="fa-solid fa-user text-primary me-1"></i>
                                        {{ __('language.User') }}
                                    </th>

                                    <th>
                                        <i class="fa-solid fa-book text-success me-1"></i>
                                        {{ __('language.Course') }}
                                    </th>

                                    <th>
                                        <i class="fa-solid fa-calendar text-warning me-1"></i>
                                        {{ __('language.Date') }}
                                    </th>

                                    <th>
                                        <i class="fa-solid fa-signal text-danger me-1"></i>
                                        {{ __('language.Status') }}
                                    </th>

                                    <th>
                                        <i class="fa-solid fa-clock text-secondary me-1"></i>
                                        {{ __('language.Created At') }}
                                    </th>

                                    <th>
                                        <i class="fa-solid fa-gears text-light me-1"></i>
                                        {{ __('language.Actions') }}
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>

                                    <td>{{ $enrollment->id }}</td>

                                    <td>
                                        <i class="fa-solid fa-user-circle text-primary me-1"></i>
                                        {{ $enrollment->user_id }}
                                    </td>

                                    <td>
                                        <i class="fa-solid fa-book-open text-success me-1"></i>
                                        {{ $enrollment->course_id }}
                                    </td>

                                    <td>
                                        <i class="fa-solid fa-calendar-day text-warning me-1"></i>
                                        {{ $enrollment->enrollment_date }}
                                    </td>

                                    <td>
                                        @if ($enrollment->status == 'active')
                                           
                                                <i class="fa-solid fa-check me-1"></i>
                                                {{ __('language.Active') }}
                                            
                                        @elseif ($enrollment->status == 'pending')
                                           
                                                <i class="fa-solid fa-clock me-1"></i>
                                                {{ __('language.Pending') }}
                                           
                                        @elseif ($enrollment->status == 'completed')
                                            
                                                <i class="fa-solid fa-circle-check me-1"></i>
                                                {{ __('language.Completed') }}
                                         
                                        @else
                                           
                                                <i class="fa-solid fa-question me-1"></i>
                                                {{ __('language.Unknown') }}
                                           
                                        @endif
                                    </td>

                                    <td>
                                        <i class="fa-solid fa-clock text-secondary me-1"></i>
                                        {{ $enrollment->created_at }}
                                    </td>

                                    <td>
                                        <a href="{{ route('home') }}" class="btn btn-success btn-sm">
                                            <i class="fa-solid fa-house me-1"></i>
                                            {{ __('language.Back Home') }}
                                        </a>
                                    </td>

                                </tr>
                            </tbody>

                        </table>

                    </div>

                </div>

            </div>
        </div>

    </div>
@endsection
