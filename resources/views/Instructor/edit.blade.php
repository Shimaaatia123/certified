@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-5 pt-5 px-4">

        <div class="row">
            <div class="col-lg-11 col-xl-10 m-auto">

                <div class="card shadow border-0">

                    <div class="card-header bg-warning text-dark text-center py-2">
                        <h6 class="mb-0">
                            <i class="fas fa-user-pen me-2"></i>
                            {{ __('language.Edit Instructor') }}

                            <span class="badge bg-dark ms-2">
                                #{{ $instructor->id }}
                            </span>
                        </h6>
                    </div>

                    <div class="card-body py-2">

                        <form action="{{ route('instructors.update', $instructor->id) }}" method="POST"
                            enctype="multipart/form-data">

                            @csrf
                            @method('PUT')

                            <div class="row">

                                {{-- LEFT COLUMN --}}
                                <div class="col-md-6">

                                    <label class="small mb-1">
                                        <i class="fas fa-user me-1 text-primary"></i>
                                        {{ __('language.Name') }}
                                    </label>
                                    <input type="text" name="name" value="{{ old('name', $instructor->name) }}"
                                        class="form-control form-control-sm mb-2">

                                    <label class="small mb-1">
                                        <i class="fas fa-envelope me-1 text-danger"></i>
                                        {{ __('language.Email') }}
                                    </label>
                                    <input type="email" name="email" value="{{ old('email', $instructor->email) }}"
                                        class="form-control form-control-sm mb-2">

                                    <label class="small mb-1">
                                        <i class="fas fa-phone me-1 text-primary"></i>
                                        {{ __('language.Phone') }}
                                    </label>
                                    <input type="text" name="phone" value="{{ old('phone', $instructor->phone) }}"
                                        class="form-control form-control-sm mb-2">

                                    <label class="small mb-1">
                                        <i class="fas fa-file-lines me-1 text-success"></i>
                                        {{ __('language.Bio') }}
                                    </label>
                                    <textarea name="bio" rows="2" class="form-control form-control-sm mb-2">{{ old('bio', $instructor->bio) }}</textarea>

                                </div>

                                {{-- RIGHT COLUMN --}}
                                <div class="col-md-6">

                                    <label class="small mb-1">
                                        <i class="fas fa-image me-1 text-info"></i>
                                        {{ __('language.Current Image') }}
                                    </label>

                                    <div class="d-flex align-items-center gap-2 mb-2">
                                        <div>
                                            @if ($instructor->Inst_image)
                                                <img src="{{ asset('/img/instructors/' . $instructor->Inst_image) }}" width="45"
                                                    height="45" class="rounded shadow">
                                            @else
                                                <span class="text-muted small">
                                                    <i class="fas fa-image me-1"></i>
                                                    {{ __('language.No Image') }}
                                                </span>
                                            @endif
                                        </div>

                                        <div class="flex-grow-1">
                                            <label class="small mb-1">
                                                <i class="fas fa-camera me-1 text-warning"></i>
                                                {{ __('language.Change Image') }}
                                            </label>
                                            <input type="file" name="image" class="form-control form-control-sm">
                                        </div>
                                    </div>

                                </div>

                            </div>

                            {{-- STATUS + BUTTON in one row --}}
                            <div class="row align-items-end">
                                <div class="col-md-8">
                                    <label class="small mb-1">
                                        <i class="fas fa-toggle-on me-1 text-success"></i>
                                        {{ __('language.Status') }}
                                    </label>

                                    <select name="status" class="form-control form-control-sm">
                                        <option value="1" {{ $instructor->status == 1 ? 'selected' : '' }}>
                                            {{ __('language.Active') }}
                                        </option>

                                        <option value="0" {{ $instructor->status == 0 ? 'selected' : '' }}>
                                            {{ __('language.Inactive') }}
                                        </option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <button class="btn btn-warning btn-sm w-100">
                                        <i class="fas fa-floppy-disk me-2"></i>
                                        {{ __('language.Update Instructor') }}
                                    </button>
                                </div>
                            </div>

                        </form>

                    </div>

                </div>

            </div>
        </div>

    </div>
@endsection