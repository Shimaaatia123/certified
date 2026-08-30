@extends('layouts.app')

@section('content')
    <div class="container mt-4">

        <div class="row">
            <div class="col-md-8 m-auto">

                <div class="card shadow border-0">

                    <div class="card-header bg-warning text-dark text-center">
                        <h5 class="mb-0">
                            <i class="fas fa-user-pen me-2"></i>
                            {{ __('language.Edit Instructor') }}

                            <span class="badge bg-dark ms-2">
                                #{{ $instructor->id }}
                            </span>
                        </h5>
                    </div>

                    <div class="card-body">

                        <form action="{{ route('instructors.update', $instructor->id) }}" method="POST"
                            enctype="multipart/form-data">

                            @csrf
                            @method('PUT')

                            <label>
                                <i class="fas fa-user me-1 text-primary"></i>
                                {{ __('language.Name') }}
                            </label>
                            <input type="text" name="name" value="{{ old('name', $instructor->name) }}"
                                class="form-control mb-3">

                            <label>
                                <i class="fas fa-envelope me-1 text-danger"></i>
                                {{ __('language.Email') }}
                            </label>
                            <input type="email" name="email" value="{{ old('email', $instructor->email) }}"
                                class="form-control mb-3">

                            <label>
                                <i class="fas fa-file-lines me-1 text-success"></i>
                                {{ __('language.Bio') }}
                            </label>
                            <textarea name="bio" class="form-control mb-3">{{ old('bio', $instructor->bio) }}</textarea>

                            <label>
                                <i class="fas fa-image me-1 text-info"></i>
                                {{ __('language.Current Image') }}
                            </label>

                            <div class="mb-3">
                                @if ($instructor->Inst_image)
                                    <img src="{{ asset('/img/instructors/' . $instructor->Inst_image) }}" width="90"
                                        height="90" class="rounded shadow">
                                @else
                                    <span class="text-muted">
                                        <i class="fas fa-image me-1"></i>
                                        {{ __('language.No Image') }}
                                    </span>
                                @endif
                            </div>

                            <label>
                                <i class="fas fa-camera me-1 text-warning"></i>
                                {{ __('language.Change Image') }}
                            </label>
                            <input type="file" name="image" class="form-control mb-3">

                            <label>
                                <i class="fas fa-phone me-1 text-primary"></i>
                                {{ __('language.Phone') }}
                            </label>
                            <input type="text" name="phone" value="{{ old('phone', $instructor->phone) }}"
                                class="form-control mb-3">

                            <label>
                                <i class="fas fa-toggle-on me-1 text-success"></i>
                                {{ __('language.Status') }}
                            </label>

                            <select name="status" class="form-control mb-4">
                                <option value="1" {{ $instructor->status == 1 ? 'selected' : '' }}>
                                    {{ __('language.Active') }}
                                </option>

                                <option value="0" {{ $instructor->status == 0 ? 'selected' : '' }}>
                                    {{ __('language.Inactive') }}
                                </option>
                            </select>

                            <button class="btn btn-warning w-100">
                                <i class="fas fa-floppy-disk me-2"></i>
                                {{ __('language.Update Instructor') }}
                            </button>

                        </form>

                    </div>

                </div>

            </div>
        </div>

    </div>
@endsection
