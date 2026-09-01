@extends('layouts.app')

@section('content')
      <div class="container mt-2 pt-2" style="margin-top: 100px !important;">


        <div class="row">
            <div class="col-md-10 m-auto">

                <div class="card shadow border-0">

                    <div class="card-header bg-dark text-white text-center">
                        <i class="fa-solid fa-envelope-open-text me-2"></i>
                        {{ __('language.Contact Message Details #') }}{{ $contact->id }}
                    </div>

                    <div class="card-body">

                        <table class="table table-bordered text-center align-middle">

                            <tr>
                                <th><i class="fa-solid fa-user"></i> {{ __('language.Name') }}</th>
                                <td>{{ $contact->name }}</td>
                            </tr>

                            <tr>
                                <th><i class="fa-solid fa-at"></i> {{ __('language.Email') }}</th>
                                <td>{{ $contact->email }}</td>
                            </tr>

                            <tr>
                                <th><i class="fa-solid fa-heading"></i> {{ __('language.Subject') }}</th>
                                <td>{{ $contact->subject }}</td>
                            </tr>

                            <tr>
                                <th><i class="fa-solid fa-message"></i> {{ __('language.Message') }}</th>
                                <td>{{ $contact->message }}</td>
                            </tr>

                            <tr>
                                <th><i class="fa-solid fa-signal"></i> {{ __('language.Status') }}</th>
                                <td>
                                    @if ($contact->status == 'new')
                                        {{ __('language.New(✨)') }}
                                    @elseif($contact->status == 'read')
                                        {{ __('language.Read🔵') }}
                                    @else
                                        {{ __('language.Replied🌸') }}
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <th><i class="fa-solid fa-calendar"></i> {{ __('language.Created At') }}</th>
                                <td>{{ $contact->created_at }}</td>
                            </tr>

                        </table>

                        <div class="text-center">
                            <a href="{{ route('admin.home') }}" class="btn btn-success">
                                <i class="fa-solid fa-house"></i> {{ __('language.Back Home') }}
                            </a>
                        </div>

                    </div>

                </div>

            </div>
        </div>

    </div>
@endsection
