@extends('layouts.app')

@section('content')
    <div class="container mt-5 pt-5" style="margin-top: 100px !important;">

        <div class="row">
            <div class="col-md-10 m-auto">

                <div class="card border-0 shadow-lg">

                    {{-- HEADER --}}
                    <div class="card-header bg-primary text-white text-center">
                        <h5 class="mb-0">
                            <i class="fas fa-chart-line me-2"></i>
                            {{ __('language.Result Details') }}

                            <span class="badge bg-dark ms-2">
                                #{{ $result->id }}
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
                                        <i class="fas fa-user me-1"></i>
                                        {{ __('language.User') }}
                                    </th>

                                    <th>
                                        <i class="fas fa-book me-1"></i>
                                        {{ __('language.Exam') }}
                                    </th>

                                    <th>
                                        <i class="fas fa-arrow-trend-up me-1"></i>
                                        {{ __('language.Score') }}
                                    </th>

                                    <th>
                                        <i class="fas fa-calculator me-1"></i>
                                        {{ __('language.Total') }}
                                    </th>

                                    <th>
                                        <i class="fas fa-circle-check me-1"></i>
                                        {{ __('language.Status') }}
                                    </th>

                                    <th>
                                        <i class="fas fa-calendar-days me-1"></i>
                                        {{ __('language.Date') }}
                                    </th>

                                    <th>
                                        <i class="fas fa-house me-1"></i>
                                        {{ __('language.Actions') }}
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>

                                    <td>{{ $result->id }}</td>

                                    <td>
                                        
                                            {{ $result->user_id }}
                                       
                                    </td>

                                    <td>
                                        
                                            {{ $result->exam_id }}
                                        
                                    </td>

                                    <td>
                                       
                                            {{ $result->score }}
                                    
                                    </td>

                                    <td>
                                     
                                            {{ $result->total }}
                                      
                                    </td>

                                    <td>

                                        @if ($result->status == 'pass')
                                          
                                                <i class="fas fa-circle-check me-1"></i>
                                                {{ __('language.Pass') }}
                                           
                                        @else
                                            
                                                <i class="fas fa-circle-xmark me-1"></i>
                                                {{ __('language.Fail') }}
                                           
                                        @endif

                                    </td>

                                    <td>
                                        <i class="fas fa-clock me-1 text-muted"></i>
                                        {{ $result->created_at }}
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
