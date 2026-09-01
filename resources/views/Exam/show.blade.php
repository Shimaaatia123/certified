@extends('layouts.app')

@section('content')
  <div class="container mt-5 pt-5" style="margin-top: 100px !important;">

        <div class="row">
            <div class="col-md-11 m-auto">

                <div class="card border-0 shadow-lg">

                    <div class="card-header bg-dark text-white text-center">
                        <h4 class="mb-0">
                            <i class="fas fa-file-signature me-2"></i>
                            {{ __('language.Exam Details') }}

                            <span class="badge bg-primary ms-2">
                                #{{ $exam->id }}
                            </span>
                        </h4>
                    </div>

                    <div class="card-body">

                        <table class="table table-hover table-bordered text-center align-middle">

                            <thead class="table-dark">
                                <tr>
                                    <th>
                                        <i class="fas fa-key me-1"></i>
                                        {{ __('language.ID💎') }}
                                    </th>

                                    <th>
                                        <i class="fas fa-book-open me-1"></i>
                                        {{ __('language.Course ID') }}
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
                                        <i class="fas fa-star me-1"></i>
                                        {{ __('language.Total Marks') }}
                                    </th>

                                    <th>
                                        <i class="fas fa-check-circle me-1"></i>
                                        {{ __('language.Pass Marks') }}
                                    </th>

                                    <th>
                                        <i class="fas fa-clock me-1"></i>
                                        {{ __('language.Duration') }}
                                    </th>

                                    <th>
                                        <i class="fas fa-toggle-on me-1"></i>
                                        {{ __('language.Status') }}
                                    </th>

                                    <th>
                                        <i class="fas fa-calendar-plus me-1"></i>
                                        {{ __('language.Created At') }}
                                    </th>

                                    <th>
                                        <i class="fas fa-gears me-1"></i>
                                        {{ __('language.Actions') }}
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>

                                    <td>{{ $exam->id }}</td>

                                    <td>{{ $exam->course_id }}</td>

                                    <td>{{ $exam->title_ar }}</td>

                                    <td>{{ $exam->title_en }}</td>

                                    <td>
                                            
                                            {{ $exam->total_marks }}
                                        
                                    </td>

                                    <td>
                                        
                                            {{ $exam->pass_marks }}
                                        
                                    </td>

                                    <td>
                                       
                                            {{ $exam->duration }}
                                            {{ __('language.Minutes') }}
                                     
                                    </td>

                                    <td>
                                        @if ($exam->status == 1)
                                           
                                                <i class="fas fa-circle-check me-1"></i>
                                                {{ __('language.Active') }}
                                            
                                        @else
                                           
                                                <i class="fas fa-circle-xmark me-1"></i>
                                                {{ __('language.Inactive') }}
                                          
                                        @endif
                                    </td>

                                    <td>{{ $exam->created_at }}</td>

                                    <td>
                                        <a href="{{ route('admin.home') }}" class="btn btn-primary btn-sm">
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
