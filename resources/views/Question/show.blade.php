@extends('layouts.app')

@section('content')
   <div class="container mt-5 pt-5" style="margin-top: 100px !important;">

        <div class="row">
            <div class="col-md-10 m-auto">

                <div class="card border-0 shadow-lg">

                    {{-- HEADER --}}
                    <div class="card-header bg-primary text-white text-center">
                        <h5 class="mb-0">
                            <i class="fas fa-circle-question me-2"></i>
                            {{ __('language.Question Details') }}

                            <span class="badge bg-dark ms-2">
                                #{{ $question->id }}
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
                                        <i class="fas fa-file-lines me-1"></i>
                                        {{ __('language.Exam') }}
                                    </th>

                                    <th>
                                        <i class="fas fa-language me-1"></i>
                                        {{ __('language.Question AR') }}
                                    </th>

                                    <th>
                                        <i class="fas fa-language me-1"></i>
                                        {{ __('language.Question EN') }}
                                    </th>

                                    <th>
                                        <i class="fas fa-star me-1"></i>
                                        {{ __('language.Mark') }}
                                    </th>

                                    <th>
                                        <i class="fas fa-list-check me-1"></i>
                                        {{ __('language.Type') }}
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

                                    <td>{{ $question->id }}</td>

                                    <td>
                                      
                                            {{ $question->exam_id }}
                                        
                                    </td>

                                    <td>{{ $question->question_ar }}</td>

                                    <td>{{ $question->question_en }}</td>

                                    <td>
                                        
                                            {{ $question->mark }}
                                        
                                    </td>

                                    <td>

                                        @if ($question->type == 'mcq')
                                           
                                                <i class="fas fa-circle-check me-1"></i>
                                                {{ __('language.MCQ') }}
                                            
                                        @elseif($question->type == 'true_false')
                                         
                                                <i class="fas fa-toggle-on me-1"></i>
                                                {{ __('language.True/False') }}
                                           
                                        @else
                                           
                                                <i class="fas fa-pen me-1"></i>
                                                {{ __('language.Text') }}
                                         
                                        @endif

                                    </td>

                                    <td>
                                        <i class="fas fa-clock me-1 text-muted"></i>
                                        {{ $question->created_at }}
                                    </td>

                                    <td>
                                        <a href="{{ route('home') }}" class="btn btn-success btn-sm">
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
