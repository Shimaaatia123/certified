@extends('layouts.app')

@section('content')
   <div class="container mt-5 pt-5" style="margin-top: 100px !important;">

        <div class="row">
            <div class="col-md-9 m-auto">

                <div class="card shadow border-0">

                    <div class="card-header bg-dark text-white text-center">
                        <i class="fa-solid fa-certificate me-2"></i>
                        {{ __('language.✨Certificate Details #') }}{{ $certificate->id }}
                    </div>

                    <div class="card-body">

                        <table class="table table-bordered table-hover align-middle text-center">

                            <!-- User -->
                            <tr>
                                <th>
                                    <i class="fa-solid fa-user text-primary me-2"></i>
                                    {{ __('language.User') }}
                                </th>
                                <td>
                                    <i class="fa-solid fa-user-circle text-primary me-1"></i>
                                    {{ $certificate->user_id }}
                                </td>
                            </tr>

                            <!-- Course -->
                            <tr>
                                <th>
                                    <i class="fa-solid fa-book text-success me-2"></i>
                                    {{ __('language.Course') }}
                                </th>
                                <td>
                                    <i class="fa-solid fa-book-open text-success me-1"></i>
                                    {{ $certificate->course_id }}
                                </td>
                            </tr>

                            <!-- Code -->
                            <tr>
                                <th>
                                    <i class="fa-solid fa-barcode text-warning me-2"></i>
                                    {{ __('language.Code') }}
                                </th>
                                <td>
                                    
                                        <i class="fa-solid fa-key me-1"></i>
                                        {{ $certificate->certificate_code }}
                                   
                                </td>
                            </tr>

                            <!-- Issue Date -->
                            <tr>
                                <th>
                                    <i class="fa-solid fa-calendar text-info me-2"></i>
                                    {{ __('language.Issue Date') }}
                                </th>
                                <td>
                                    <i class="fa-solid fa-calendar-day text-info me-1"></i>
                                    {{ $certificate->issue_date }}
                                </td>
                            </tr>

                            <!-- Status -->
                            <tr>
                                <th>
                                    <i class="fa-solid fa-signal text-danger me-2"></i>
                                    {{ __('language.Status') }}
                                </th>
                                <td>
                                    @if ($certificate->status == 'valid')
                                        
                                            <i class="fa-solid fa-circle-check me-1"></i>
                                            {{ __('language.Valid') }}
                                        
                                    @else
                                       
                                            <i class="fa-solid fa-circle-xmark me-1"></i>
                                            {{ __('language.Revoked') }}
                                       
                                    @endif
                                </td>
                            </tr>

                            <!-- Created At -->
                            <tr>
                                <th>
                                    <i class="fa-solid fa-clock text-secondary me-2"></i>
                                    {{ __('language.Created At') }}
                                </th>
                                <td>
                                    <i class="fa-solid fa-clock text-secondary me-1"></i>
                                    {{ $certificate->created_at }}
                                </td>
                            </tr>

                        </table>

                        <!-- Back Button -->
                        <div class="text-center mt-3">
                            <a href="{{ route('admin.home') }}" class="btn btn-success px-4">
                                <i class="fa-solid fa-house me-2"></i>
                                {{ __('language.Back') }}
                            </a>
                        </div>

                    </div>

                </div>

            </div>
        </div>

    </div>
@endsection
