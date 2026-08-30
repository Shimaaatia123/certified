@extends('layouts.app')

@section('content')
<div class="container mt-2 pt-3" style="margin-top: 100px !important;">

    <div class="row">
        <div class="col-md-9 m-auto">

            <div class="card shadow border-0">

                <div class="card-header bg-dark text-white text-center">
                    <i class="fa-solid fa-circle-info me-2"></i>
                    {{ __('language.Answer Details #') }}{{ $answer->id }}
                </div>

                <div class="card-body">

                    <table class="table table-bordered table-hover align-middle text-center">

                        <!-- ID -->
                        <tr>
                            <th>
                                <i class="fa-solid fa-fingerprint text-info me-2"></i>
                                {{ __('language.ID💎') }}
                            </th>
                            <td>{{ $answer->id }}</td>
                        </tr>

                        <!-- Question ID -->
                        <tr>
                            <th>
                                <i class="fa-solid fa-circle-question text-primary me-2"></i>
                                {{ __('language.Question ID') }}
                            </th>
                            <td>
                             
                                    <i class="fa-solid fa-hashtag me-1"></i>
                                    {{ $answer->question_id }}
                                
                            </td>
                        </tr>

                        <!-- Answer AR -->
                        <tr>
                            <th>
                                <i class="fa-solid fa-language text-success me-2"></i>
                                {{ __('language.Answer Arabic') }}
                            </th>
                            <td class="text-end">
                                <i class="fa-solid fa-quote-right text-success me-1"></i>
                                {{ $answer->answer_ar }}
                            </td>
                        </tr>

                        <!-- Answer EN -->
                        <tr>
                            <th>
                                <i class="fa-solid fa-font text-warning me-2"></i>
                                {{ __('language.Answer English') }}
                            </th>
                            <td class="text-start">
                                <i class="fa-solid fa-quote-left text-warning me-1"></i>
                                {{ $answer->answer_en }}
                            </td>
                        </tr>

                        <!-- Is Correct -->
                        <tr>
                            <th>
                                <i class="fa-solid fa-check-circle text-danger me-2"></i>
                                {{ __('language.Is Correct?') }}
                            </th>
                            <td>
                                @if ($answer->is_correct)
                                  
                                        <i class="fa-solid fa-circle-check me-1"></i>
                                        {{ __('language.✔ Correct🌸') }}
                                 
                                @else
                                   
                                        <i class="fa-solid fa-circle-xmark me-1"></i>
                                        {{ __('language.✖ Wrong') }}
                                   
                                @endif
                            </td>
                        </tr>

                        <!-- Created At -->
                        <tr>
                            <th>
                                <i class="fa-solid fa-clock text-secondary me-2"></i>
                                {{ __('language.Created At') }}
                            </th>
                            <td>{{ $answer->created_at }}</td>
                        </tr>

                        <!-- Updated At -->
                        <tr>
                            <th>
                                <i class="fa-solid fa-clock-rotate-left text-secondary me-2"></i>
                                {{ __('language.Updated At') }}
                            </th>
                            <td>{{ $answer->updated_at }}</td>
                        </tr>

                    </table>

                    <!-- Actions -->
                    <div class="text-center mt-3">

                        <a href="{{ route('answers.edit', $answer->id) }}" class="btn btn-warning px-4">
                            <i class="fa-solid fa-pen-to-square me-2"></i>
                            {{ __('language.Edit') }}
                        </a>

                    </div>

                </div>

            </div>

        </div>
    </div>

</div>
@endsection