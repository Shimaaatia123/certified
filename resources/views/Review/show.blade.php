@extends('layouts.app')

@section('content')
    <div class="container mt-5 pt-5" style="margin-top: 100px !important;">

        <div class="row">
            <div class="col-md-9 m-auto">

                <div class="card shadow-lg border-0">

                    {{-- HEADER --}}
                    <div class="card-header bg-primary text-white text-center">
                        <h5 class="mb-0">
                            <i class="fas fa-star me-2"></i>
                            {{ __('language.Review Details') }}

                            <span class="badge bg-dark ms-2">
                                #{{ $review->id }}
                            </span>
                        </h5>
                    </div>

                    {{-- BODY --}}
                    <div class="card-body p-0">

                        <table class="table table-hover text-center align-middle mb-0">

                            <thead class="table-dark">
                                <tr>
                                    <th>
                                        <i class="fas fa-fingerprint me-1"></i>
                                        {{ __('language.ID💎') }}
                                    </th>

                                    <th>
                                        <i class="fas fa-user me-1"></i>
                                        {{ __('language.User') }}
                                    </th>

                                    <th>
                                        <i class="fas fa-book me-1"></i>
                                        {{ __('language.Course') }}
                                    </th>

                                    <th>
                                        <i class="fas fa-star me-1"></i>
                                        {{ __('language.Rating') }}
                                    </th>

                                    <th>
                                        <i class="fas fa-comment me-1"></i>
                                        {{ __('language.Comment') }}
                                    </th>

                                    <th>
                                        <i class="fas fa-circle-info me-1"></i>
                                        {{ __('language.Status') }}
                                    </th>

                                    <th>
                                        <i class="fas fa-calendar-days me-1"></i>
                                        {{ __('language.Created At') }}
                                    </th>

                                    <th>
                                        <i class="fas fa-house me-1"></i>
                                        {{ __('language.Actions') }}
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>

                                    <td>
                                        
                                            {{ $review->id }}
                                      
                                    </td>

                                    <td>
                                        <i class="fas fa-user text-primary me-1"></i>
                                        {{ $review->user_id }}
                                    </td>

                                    <td>
                                        <i class="fas fa-book text-success me-1"></i>
                                        {{ $review->course_id }}
                                    </td>

                                    <td>
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $review->rating)
                                                <i class="fas fa-star text-warning"></i>
                                            @else
                                                <i class="far fa-star text-warning"></i>
                                            @endif
                                        @endfor
                                    </td>

                                    <td>
                                        <span class="text-muted">
                                            {{ $review->comment ?? __('language.No Comment') }}
                                        </span>
                                    </td>

                                    <td>
                                        @if ($review->status == 1)
                                            
                                                <i class="fas fa-circle-check me-1"></i>
                                                {{ __('language.Approved') }}
                                           
                                        @else
                                           
                                                <i class="fas fa-clock me-1"></i>
                                                {{ __('language.Pending') }}
                                            
                                        @endif
                                    </td>

                                    <td>
                                        <i class="fas fa-clock text-muted me-1"></i>
                                        {{ $review->created_at->format('Y-m-d') }}
                                    </td>

                                    <td>
                                        <a href="{{ route('admin.home') }}" class="btn btn-success btn-sm">
                                            <i class="fas fa-house me-1"></i>
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
