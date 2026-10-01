@extends('layouts.app')

@section('content')
    <div class="container mt-5 pt-5" style="margin-top: 100px !important;">

        <div class="row">
            <div class="col-md-11 m-auto">

                <div class="card border-0 shadow-lg">

                    {{-- HEADER --}}
                    <div class="card-header bg-primary text-white text-center">
                        <h5 class="mb-0">
                            <i class="fas fa-book-open me-2"></i>
                            {{ __('language.Lesson Details') }}

                            <span class="badge bg-dark ms-2">
                                #{{ $lesson->id }}
                            </span>
                        </h5>
                    </div>

                    {{-- BODY --}}
                    <div class="card-body">

                        <table class="table table-bordered table-hover text-center align-middle">

                            <thead class="table-dark">
                                <tr>
                                    <th>
                                        <i class="fas fa-fingerprint me-1"></i>
                                        {{ __('language.ID💎') }}
                                    </th>

                                    <th>
                                        <i class="fas fa-book me-1"></i>
                                        {{ __('language.Course') }}
                                    </th>

                                    <th>
                                        <i class="fas fa-language me-1"></i>
                                        {{ __('language.Title AR') }}
                                    </th>

                                    <th>
                                        <i class="fas fa-language me-1"></i>
                                        {{ __('language.Title EN') }}
                                    </th>

                                    <th>
                                        <i class="fas fa-circle-play me-1"></i>
                                        {{ __('language.Video') }}
                                    </th>

                                    <th>
                                        <i class="fas fa-list-ol me-1"></i>
                                        {{ __('language.Order') }}
                                    </th>

                                    <th>
                                        <i class="fas fa-toggle-on me-1"></i>
                                        {{ __('language.Status') }}
                                    </th>

                                    <th>
                                        <i class="fas fa-calendar-days me-1"></i>
                                        {{ __('language.Created At') }}
                                    </th>

                                    <th>
                                        <i class="fas fa-house me-1"></i>
                                        {{ __('language.Back Home') }}
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>

                                    <td>{{ $lesson->id }}</td>

                                    
                                    <td>

                                         <i class="badge bg-info text-dark"></i>
                                            {{ $lesson->course_id }}
                                        
                                    </td>

                                    <td>{{ $lesson->title_ar }}</td>

                                    <td>{{ $lesson->title_en }}</td>

                                    <td>
                                        <a href="{{ $lesson->video_url }}" target="_blank" class="btn btn-info btn-sm">
                                            <i class="fas fa-play me-1"></i>
                                            {{ __('language.Watch') }}
                                        </a>
                                    </td>

                                    <td>
                                          <i class="badge bg-secondary"></i>
                                            {{ $lesson->order }}
                                        
                                    </td>

                                    <td>
                                        @if ($lesson->status == 1)
                                            
                                                <i class="fas fa-circle-check me-1"></i>
                                                {{ __('language.Active') }}
                                            
                                        @else
                                           
                                                <i class="fas fa-circle-xmark me-1"></i>
                                                {{ __('language.Inactive') }}
                                          
                                        @endif
                                    </td>

                                    <td>
                                        <i class="fas fa-clock me-1 text-muted"></i>
                                        {{ $lesson->created_at }}
                                    </td>

                                    <td>
                                        <a href="{{ route('admin.dashboard') }}" class="btn btn-success btn-sm">
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
