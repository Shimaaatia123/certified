@extends('layouts.app')

@section('content')
   <div class="container mt-5 pt-5" style="margin-top: 100px !important;">
        <div class="row">
            <div class="col-md-10 m-auto">

                <div class="card border-0 shadow-lg">

                    {{-- HEADER --}}
                    <div class="card-header bg-primary text-white text-center">
                        <h5 class="mb-0">
                            <i class="fas fa-user-shield me-2"></i>
                            {{ __('language.User Details') }}

                            <span class="badge bg-dark ms-2">
                                #{{ $user->id }}
                            </span>
                        </h5>
                    </div>

                    {{-- BODY --}}
                    <div class="card-body p-0">

                        <table class="table table-hover table-bordered text-center align-middle mb-0">

                            <thead class="table-dark">
                                <tr>
                                    <th>
                                        <i class="fas fa-fingerprint me-1"></i>
                                        {{ __('language.ID💎') }}
                                    </th>

                                    <th>
                                        <i class="fas fa-user me-1"></i>
                                        {{ __('language.Name') }}
                                    </th>

                                    <th>
                                        <i class="fas fa-envelope me-1"></i>
                                        {{ __('language.Email') }}
                                    </th>

                                    <th>
                                        <i class="fas fa-user-shield me-1"></i>
                                        {{ __('language.Role') }}
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
                                        {{ __('language.Actions') }}
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>

                                    <td>
                                         <i class="badge bg-secondary"></i>
                                            {{ $user->id }}
                                       
                                    </td>

                                    <td>
                                        <i class="fas fa-user text-primary me-1"></i>
                                        {{ $user->name }}
                                    </td>

                                    <td>
                                        <i class="fas fa-envelope text-info me-1"></i>
                                        {{ $user->email }}
                                    </td>

                                    <td>
                                       <i class="badge bg-dark text-white"></i>
                                            {{ $user->role }}
                                       
                                    </td>

                                    <td>
                                        @if ($user->status)
                                            
                                                <i class="fas fa-check me-1"></i>
                                                {{ __('language.Active') }}
                                            
                                        @else
                                            
                                                <i class="fas fa-xmark me-1"></i>
                                                {{ __('language.Inactive') }}
                                          
                                        @endif
                                    </td>

                                    <td>
                                        <i class="fas fa-clock text-muted me-1"></i>
                                        {{ $user->created_at }}
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
