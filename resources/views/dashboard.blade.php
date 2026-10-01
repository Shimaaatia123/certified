@extends('layouts.app')

@section('content')
    {{-- ================= CARDS ================= --}}
    {{-- =========================================================
    DASHBOARD STATISTICS
     ========================================================= --}}

    <div class="row g-4 mt-5 pt-4 dashboard-stats" style="margin-top: 100px !important;">

        {{-- =====================================================
        USERS
        ====================================================== --}}
        <div class="col-xl-2 col-lg-4 col-md-6">

            <div class="stat-card stat-users">

                <div class="stat-card-top">

                    <div class="stat-icon">
                        <i class="bi bi-people-fill"></i>
                    </div>

                    <span class="stat-label">
                        {{ __('language.Users') }}
                    </span>

                </div>

                <div class="stat-content">

                    <h3>
                        {{ $users_count }}
                    </h3>

                    <span class="stat-description">
                        <i class="bi bi-person-check-fill"></i>
                        {{ __('language.Total Users') }}
                    </span>

                </div>

            </div>

        </div>


        {{-- =====================================================
        COURSES
         ====================================================== --}}
        <div class="col-xl-2 col-lg-4 col-md-6">

            <div class="stat-card stat-courses">

                <div class="stat-card-top">

                    <div class="stat-icon">
                        <i class="bi bi-book-fill"></i>
                    </div>

                    <span class="stat-label">
                        {{ __('language.Courses') }}
                    </span>

                </div>

                <div class="stat-content">

                    <h3>
                        {{ $courses_count }}
                    </h3>

                    <span class="stat-description">
                        <i class="bi bi-journal-check"></i>
                        {{ __('language.Total Courses') }}
                    </span>

                </div>

            </div>

        </div>


        {{-- =====================================================
        EXAMS
        ====================================================== --}}
        <div class="col-xl-2 col-lg-4 col-md-6">

            <div class="stat-card stat-exams">

                <div class="stat-card-top">

                    <div class="stat-icon">
                        <i class="bi bi-file-earmark-text-fill"></i>
                    </div>

                    <span class="stat-label">
                        {{ __('language.Exams') }}
                    </span>

                </div>

                <div class="stat-content">

                    <h3>
                        {{ $exams_count }}
                    </h3>

                    <span class="stat-description">
                        <i class="bi bi-clipboard-check-fill"></i>
                        {{ __('language.Total Exams') }}
                    </span>

                </div>

            </div>

        </div>


        {{-- =====================================================
        INSTRUCTORS
        ====================================================== --}}
        <div class="col-xl-2 col-lg-4 col-md-6">

            <div class="stat-card stat-instructors">

                <div class="stat-card-top">

                    <div class="stat-icon">
                        <i class="bi bi-person-workspace"></i>
                    </div>

                    <span class="stat-label">
                        {{ __('language.Instructors') }}
                    </span>

                </div>

                <div class="stat-content">

                    <h3>
                        {{ $instructors_count }}
                    </h3>

                    <span class="stat-description">
                        <i class="bi bi-person-badge-fill"></i>
                        {{ __('language.Total Instructors') }}
                    </span>

                </div>

            </div>

        </div>


        {{-- =====================================================
        CERTIFICATES
        ====================================================== --}}
        <div class="col-xl-2 col-lg-4 col-md-6">

            <div class="stat-card stat-certificates">

                <div class="stat-card-top">

                    <div class="stat-icon">
                        <i class="bi bi-patch-check-fill"></i>
                    </div>

                    <span class="stat-label">
                        {{ __('language.Certificates') }}
                    </span>

                </div>

                <div class="stat-content">

                    <h3>
                        {{ $certificates_count }}
                    </h3>

                    <span class="stat-description">
                        <i class="bi bi-shield-check"></i>
                        {{ __('language.Total Certificates') }}
                    </span>

                </div>

            </div>

        </div>


        {{-- =====================================================
        CONTACT MESSAGES
        ====================================================== --}}
        <div class="col-xl-2 col-lg-4 col-md-6">

            <div class="stat-card stat-messages">

                <div class="stat-card-top">

                    <div class="stat-icon">
                        <i class="bi bi-envelope-fill"></i>
                    </div>

                    <span class="stat-label">
                        {{ __('language.Messages') }}
                    </span>

                </div>

                <div class="stat-content">

                    <h3>
                        {{ $contacts_count }}
                    </h3>

                    <span class="stat-description">
                        <i class="bi bi-chat-dots-fill"></i>
                        {{ __('language.Total Messages') }}
                    </span>

                </div>

            </div>

        </div>

    </div>


    {{-- =========================================================
    STATISTICS CARDS STYLE
    ========================================================= --}}

    <style>
        .dashboard-stats {
            position: relative;
        }


        /* =====================================================
                               CARD
                            ====================================================== */

        .stat-card {

            position: relative;

            min-height: 175px;

            padding: 22px;

            border-radius: 20px;

            background: rgba(255, 255, 255, 0.92);

            border: 1px solid rgba(0, 0, 0, 0.06);

            box-shadow:
                0 10px 30px rgba(15, 23, 42, 0.08),
                0 2px 8px rgba(15, 23, 42, 0.04);

            overflow: hidden;

            transition:
                transform 0.35s ease,
                box-shadow 0.35s ease,
                border-color 0.35s ease;

        }


        /* =====================================================
                               TOP ACCENT
                            ====================================================== */

        .stat-card::before {

            content: "";

            position: absolute;

            top: 0;
            left: 0;

            width: 100%;
            height: 4px;

            background: currentColor;

            opacity: 0.85;

        }


        /* =====================================================
                               HOVER
                            ====================================================== */

        .stat-card:hover {

            transform: translateY(-8px);

            box-shadow:
                0 18px 40px rgba(15, 23, 42, 0.14),
                0 5px 15px rgba(15, 23, 42, 0.08);

        }


        /* =====================================================
                               TOP ROW
                            ====================================================== */

        .stat-card-top {

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 10px;

        }


        /* =====================================================
                               ICON
                            ====================================================== */

        .stat-icon {

            width: 52px;
            height: 52px;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 15px;

            font-size: 23px;

            background: rgba(0, 0, 0, 0.05);

            transition:
                transform 0.35s ease,
                box-shadow 0.35s ease;

        }


        .stat-card:hover .stat-icon {

            transform: scale(1.08) rotate(-3deg);

        }


        /* =====================================================
                               LABEL
                            ====================================================== */

        .stat-label {

            font-size: 14px;

            font-weight: 700;

            color: #64748b;

            text-transform: uppercase;

            letter-spacing: 0.4px;

        }


        /* =====================================================
                               CONTENT
                            ====================================================== */

        .stat-content {

            margin-top: 20px;

        }


        .stat-content h3 {

            margin: 0;

            font-size: 34px;

            line-height: 1;

            font-weight: 800;

            color: #0f172a;

            letter-spacing: -1px;

        }


        /* =====================================================
                               DESCRIPTION
                            ====================================================== */

        .stat-description {

            display: inline-flex;

            align-items: center;

            gap: 6px;

            margin-top: 12px;

            font-size: 12px;

            color: #94a3b8;

        }


        .stat-description i {

            font-size: 13px;

        }


        /* =====================================================
                               USERS
                            ====================================================== */

        .stat-users {

            color: #2563eb;

        }

        .stat-users .stat-icon {

            color: #2563eb;

            background: rgba(37, 99, 235, 0.10);

        }


        /* =====================================================
                               COURSES
                            ====================================================== */

        .stat-courses {

            color: #16a34a;

        }

        .stat-courses .stat-icon {

            color: #16a34a;

            background: rgba(22, 163, 74, 0.10);

        }


        /* =====================================================
                               EXAMS
                            ====================================================== */

        .stat-exams {

            color: #dc2626;

        }

        .stat-exams .stat-icon {

            color: #dc2626;

            background: rgba(220, 38, 38, 0.10);

        }


        /* =====================================================
                               INSTRUCTORS
                            ====================================================== */

        .stat-instructors {

            color: #d97706;

        }

        .stat-instructors .stat-icon {

            color: #d97706;

            background: rgba(217, 119, 6, 0.10);

        }


        /* =====================================================
                               CERTIFICATES
                            ====================================================== */

        .stat-certificates {

            color: #0891b2;

        }

        .stat-certificates .stat-icon {

            color: #0891b2;

            background: rgba(8, 145, 178, 0.10);

        }


        /* =====================================================
                               MESSAGES
                            ====================================================== */

        .stat-messages {

            color: #64748b;

        }

        .stat-messages .stat-icon {

            color: #64748b;

            background: rgba(100, 116, 139, 0.10);

        }


        /* =====================================================
                               RESPONSIVE
                            ====================================================== */

        @media (max-width: 1199px) {

            .stat-card {

                min-height: 165px;

            }

        }


        @media (max-width: 767px) {

            .dashboard-stats {

                margin-top: 70px !important;

                padding-top: 20px !important;

            }

            .stat-card {

                min-height: 155px;

            }

            .stat-content h3 {

                font-size: 30px;

            }

        }

        .dashboard-stats {
            position: relative;

            padding-left: 32px;
            padding-right: 32px;

            margin-left: 0;
            margin-right: 0;
        }

        /* =====================================================
    DASHBOARD HEADER BADGES FIX
    Prevent count badges from overlapping icons/text
    ===================================================== */

        .dashboard-stats+.container .card-header h5,
        .container .card-header h5 {
            display: inline-flex;
            align-items: center;
            flex-wrap: nowrap;
            gap: 8px;
            margin: 0;
            line-height: 1.4;
        }

        .container .card-header h5>i {
            flex: 0 0 auto;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .container .card-header h5>.badge {
            position: static !important;
            display: inline-flex !important;
            align-items: center;
            justify-content: center;
            flex: 0 0 auto;
            min-width: 28px;
            min-height: 24px;
            padding: 4px 8px;
            margin: 0 !important;
            line-height: 1;
            vertical-align: middle;
            white-space: nowrap;
        }
    </style>

    <div class="container mt-2 pt-2">
        <div class="row">

            {{-- ================= USERS ================= --}}
            <div class="col-md-12 mb-5">
                <div class="card border-0 shadow-lg">
                    {{-- HEADER --}}
                    <div class="card-header bg-dark text-white py-3">
                        <div class="d-flex justify-content-between align-items-center">

                            <h5 class="mb-0">
                                <i class="bi bi-people-fill me-2"></i>
                                {{ __('language.Users') }}

                                <span class="badge bg-primary ms-2">
                                    {{ $users_count }}
                                </span>
                            </h5>

                            <a href="{{ route('users.create') }}" class="btn btn-success">
                                <i class="bi bi-person-plus-fill me-1"></i>
                                {{ __('language.Create User') }}

                            </a>

                        </div>
                    </div>
                    {{-- BODY --}}
                    <div class="card-body">

                        @if (session('users_message'))
                            <div class="alert alert-success text-center">
                                {{ session('users_message') }}
                            </div>
                        @endif

                        <table class="table table-hover table-bordered text-center align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>
                                        <i class="bi bi-key-fill me-1"></i>
                                        {{ __('language.ID💎') }}
                                    </th>
                                    <th>
                                        <i class="bi bi-person-fill"></i>
                                        {{ __('language.Name') }}
                                    </th>
                                    <th>
                                        <i class="bi bi-envelope-fill"></i>
                                        {{ __('language.Email') }}
                                    </th>
                                    <th>
                                        <i class="bi bi-gear-fill"></i>
                                        {{ __('language.Operations') }}
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <div class="d-flex gap-2 justify-content-center">

                                                <a href="{{ route('users.show', $user->id) }}"
                                                    class="btn btn-success btn-sm">
                                                    <i class="bi bi-eye-fill"></i>
                                                </a>

                                                <a href="{{ route('users.edit', $user->id) }}"
                                                    class="btn btn-primary btn-sm">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>

                                                <a href="{{ route('users.delete', $user->id) }}"
                                                    class="btn btn-danger btn-sm">
                                                    <i class="bi bi-trash-fill"></i>
                                                </a>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>


            {{-- ================= COURSES ================= --}}
            <div class="col-md-12 mb-5">
                <div class="card border-0 shadow-lg">
                    {{-- HEADER --}}
                    <div class="card-header bg-dark text-white border-0">
                        <div class="d-flex justify-content-between align-items-center">

                            <h5 class="mb-0">
                                <i class="bi bi-book-fill me-2"></i>
                                {{ __('language.Courses') }}
                                <span class="badge bg-primary ms-2">
                                    {{ $courses_count }}
                                </span>
                            </h5>

                            <a href="{{ route('courses.create') }}" class="btn btn-success btn-sm">
                                <i class="bi bi-plus-circle me-1"></i>
                                {{ __('language.Create Course') }}
                            </a>

                        </div>
                    </div>
                    {{-- BODY --}}
                    <div class="card-body">

                        @if (session('courses_message'))
                            <div class="alert alert-success text-center">
                                {{ session('courses_message') }}
                            </div>
                        @endif

                        <table class="table table-hover table-bordered text-center align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>
                                        <i class="bi bi-key-fill me-1"></i>
                                        {{ __('language.ID💎') }}
                                    </th>

                                    <th>
                                        <i class="bi bi-image"></i> {{ __('language.Image') }}
                                    </th>

                                    <th>
                                        <i class="bi bi-type"></i> {{ __('language.Title') }}
                                    </th>

                                    <th>
                                        <i class="bi bi-currency-dollar"></i> {{ __('language.Price') }}
                                    </th>

                                    <th>
                                        <i class="bi bi-clock-fill me-1"></i>
                                        {{ __('language.Duration') }}
                                    </th>

                                    <th>
                                        <i class="bi bi-award-fill me-1"></i>
                                        {{ __('language.Badge') }}
                                    </th>

                                    <th>
                                        <i class="bi bi-toggle-on"></i> {{ __('language.Status') }}
                                    </th>

                                    <th>
                                        <i class="bi bi-gear-fill"></i> {{ __('language.Actions') }}
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($courses as $course)
                                    <tr>
                                        <td>{{ $course->id }}</td>

                                        <td>
                                            @if ($course->image)
                                                <img src="{{ asset('storage/' . $course->image) }}" width="50"
                                                    height="50" class="rounded">
                                            @else
                                                {{ __('language.No Image') }}
                                            @endif
                                        </td>

                                        <td>{{ $course->title }}</td>
                                        <td>${{ $course->price }}</td>
                                        <td>{{ __('language.' . $course->duration) }}</td>
                                        <td>{{ __('language.' . $course->badge) }}</td>


                                        <td>
                                            @if ($course->status == 1)
                                                <i class="badge bg-success"></i>{{ __('language.Active') }}
                                            @else
                                                <i class="badge bg-danger"></i>{{ __('language.Inactive') }}
                                            @endif
                                        </td>


                                        <td>
                                            <div class="d-flex gap-2 justify-content-center">

                                                <a href="{{ route('courses.show', $course->id) }}"
                                                    class="btn btn-success btn-sm">
                                                    <i class="bi bi-eye-fill"></i>
                                                </a>

                                                <a href="{{ route('courses.edit', $course->id) }}"
                                                    class="btn btn-primary btn-sm">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>

                                                <a href="{{ route('courses.delete', $course->id) }}"
                                                    class="btn btn-danger btn-sm">
                                                    <i class="bi bi-trash-fill"></i>
                                                </a>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>


            {{-- ================= INSTRUCTORS ================= --}}
            <div class="col-md-12 mb-5">
                <div class="card border-0 shadow-lg">

                    {{-- HEADER --}}
                    <div class="card-header bg-dark text-white border-0">
                        <div class="d-flex justify-content-between align-items-center">

                            <h5 class="mb-0">
                                <i class="bi bi-person-workspace me-2"></i>
                                {{ __('language.Instructors') }}
                                <span class="badge bg-primary ms-2">
                                    {{ $instructors_count }}
                                </span>
                            </h5>

                            <a href="{{ route('instructors.create') }}" class="btn btn-success btn-sm">
                                <i class="bi bi-person-plus-fill me-1"></i>
                                {{ __('language.Create Instructor') }}
                            </a>

                        </div>
                    </div>

                    {{-- BODY --}}
                    <div class="card-body">

                        @if (session('instructors_message'))
                            <div class="alert alert-success text-center">
                                {{ session('instructors_message') }}
                            </div>
                        @endif

                        <table class="table table-hover table-bordered text-center align-middle">

                            <thead class="table-dark">
                                <tr>
                                    <th>
                                        <i class="bi bi-key-fill"></i> {{ __('language.ID💎') }}
                                    </th>

                                    <th>
                                        <i class="bi bi-image"></i> {{ __('language.Image') }}
                                    </th>

                                    <th>
                                        <i class="bi bi-person-fill"></i> {{ __('language.Name') }}
                                    </th>

                                    <th>
                                        <i class="bi bi-envelope-fill"></i> {{ __('language.Email') }}
                                    </th>

                                    <th>
                                        <i class="bi bi-telephone-fill"></i> {{ __('language.Phone') }}
                                    </th>

                                    <th>
                                        <i class="bi bi-toggle-on"></i> {{ __('language.Status') }}
                                    </th>

                                    <th>
                                        <i class="bi bi-gear-fill"></i> {{ __('language.Actions') }}
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($instructors as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>

                                        <td>
                                            @if ($item->image)
                                                <img src="{{ asset('storage/' . $item->image) }}" width="45"
                                                    height="45" class="rounded-circle border">
                                            @else
                                                {{ __('language.No Image') }}
                                            @endif
                                        </td>

                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email ?? '-' }}</td>
                                        <td>{{ $item->phone ?? '-' }}</td>

                                        <td>
                                            @if ($item->status == 1)
                                                <i class="badge bg-success"></i> {{ __('language.Active') }}
                                            @else
                                                <i class="badge bg-danger"></i> {{ __('language.Inactive') }}
                                            @endif
                                        </td>

                                        <td>
                                            <div class="d-flex gap-2 justify-content-center">

                                                <a href="{{ route('instructors.show', $item->id) }}"
                                                    class="btn btn-success btn-sm">
                                                    <i class="bi bi-eye-fill"></i>
                                                </a>

                                                <a href="{{ route('instructors.edit', $item->id) }}"
                                                    class="btn btn-primary btn-sm">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>

                                                <a href="{{ route('instructors.delete', $item->id) }}"
                                                    class="btn btn-danger btn-sm">
                                                    <i class="bi bi-trash-fill"></i>
                                                </a>

                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>

                        </table>

                    </div>
                </div>
            </div>


            {{-- ================= ENROLLMENTS ================= --}}
            <div class="col-md-12 mb-5">
                <div class="card border-0 shadow-lg">

                    {{-- HEADER --}}
                    <div class="card-header bg-dark text-white border-0">
                        <div class="d-flex justify-content-between align-items-center">

                            <h5 class="mb-0">
                                <i class="bi bi-journal-check me-2"></i>
                                {{ __('language.Enrollments') }}
                                <span class="badge bg-primary ms-2">
                                    {{ $enrollments_count }}
                                </span>
                            </h5>

                            <a href="{{ route('enrollments.create') }}" class="btn btn-success btn-sm">
                                <i class="bi bi-plus-circle me-1"></i>
                                {{ __('language.Create Enrollment') }}
                            </a>

                        </div>
                    </div>

                    {{-- BODY --}}
                    <div class="card-body">

                        @if (session('enrollments_message'))
                            <div class="alert alert-success text-center">
                                {{ session('enrollments_message') }}
                            </div>
                        @endif

                        <table class="table table-hover table-bordered text-center align-middle">

                            <thead class="table-dark">
                                <tr>
                                    <th>
                                        <i class="bi bi-key-fill"></i> {{ __('language.ID💎') }}
                                    </th>

                                    <th>
                                        <i class="bi bi-person-fill"></i> {{ __('language.User') }}
                                    </th>

                                    <th>
                                        <i class="bi bi-book-fill"></i> {{ __('language.Course') }}
                                    </th>

                                    <th>
                                        <i class="bi bi-calendar-date"></i> {{ __('language.Date') }}
                                    </th>

                                    <th>
                                        <i class="bi bi-toggle-on"></i> {{ __('language.Status') }}
                                    </th>

                                    <th>
                                        <i class="bi bi-gear-fill"></i> {{ __('language.Actions') }}
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($enrollments as $item)
                                    <tr>

                                        <td>{{ $item->id }}</td>

                                        <td>{{ $item->user->name ?? '-' }}</td>

                                        <td>{{ $item->course->title ?? '-' }}</td>

                                        <td>{{ $item->enrollment_date ?? '-' }}</td>

                                        <td>
                                            @if ($item->status == 'active')
                                                <i class="badge bg-success"></i>{{ __('language.Active') }}
                                            @elseif($item->status == 'pending')
                                                <i class="badge bg-warning text-dark"></i>{{ __('language.Pending') }}
                                            @else
                                                <i class="badge bg-secondary"></i>{{ __('language.Completed') }}
                                            @endif
                                        </td>

                                        <td>
                                            <div class="d-flex gap-2 justify-content-center">

                                                <a href="{{ route('enrollments.show', $item->id) }}"
                                                    class="btn btn-success btn-sm">
                                                    <i class="bi bi-eye-fill"></i>
                                                </a>

                                                <a href="{{ route('enrollments.edit', $item->id) }}"
                                                    class="btn btn-primary btn-sm">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>

                                                <a href="{{ route('enrollments.delete', $item->id) }}"
                                                    class="btn btn-danger btn-sm">
                                                    <i class="bi bi-trash-fill"></i>
                                                </a>

                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>

                        </table>

                    </div>
                </div>
            </div>


            {{-- ================= LESSONS ================= --}}
            <div class="col-md-12 mb-5">
                <div class="card border-0 shadow-lg">

                    {{-- HEADER --}}
                    <div class="card-header bg-dark text-white border-0">
                        <div class="d-flex justify-content-between align-items-center">

                            <h5 class="mb-0">
                                <i class="bi bi-easel2-fill me-2"></i>
                                {{ __('language.Lessons') }}
                                <span class="badge bg-primary ms-2">
                                    {{ $lessons_count }}
                                </span>
                            </h5>

                            <a href="{{ route('lessons.create') }}" class="btn btn-success btn-sm">
                                <i class="bi bi-plus-circle me-1"></i>
                                {{ __('language.Create Lesson') }}
                            </a>

                        </div>
                    </div>

                    {{-- BODY --}}
                    <div class="card-body">

                        @if (session('lessons_message'))
                            <div class="alert alert-success text-center">
                                {{ session('lessons_message') }}
                            </div>
                        @endif

                        <table class="table table-hover table-bordered text-center align-middle">

                            <thead class="table-dark">
                                <tr>

                                    <th>
                                        <i class="bi bi-key-fill"></i> {{ __('language.ID💎') }}
                                    </th>

                                    <th>
                                        <i class="bi bi-book-fill"></i> {{ __('language.Course') }}
                                    </th>

                                    <th>
                                        <i class="bi bi-type"></i> {{ __('language.Title(✨)') }}
                                    </th>

                                    <th>
                                        <i class="bi bi-list-ol"></i> {{ __('language.Order') }}
                                    </th>

                                    <th>
                                        <i class="bi bi-toggle-on"></i> {{ __('language.Status') }}
                                    </th>

                                    <th>
                                        <i class="bi bi-gear-fill"></i> {{ __('language.Actions') }}
                                    </th>

                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($lessons as $item)
                                    <tr>

                                        <td>{{ $item->id }}</td>

                                        <td>{{ $item->course->title ?? 'No Course' }}</td>

                                        <td>{{ $item->title }}</td>

                                        <td>
                                            <i class="badge bg-secondary"></i>{{ $item->order }}

                                        </td>

                                        <td>
                                            @if ($item->status == 1)
                                                <i class="badge bg-success"></i>{{ __('language.Active') }}
                                            @else
                                                <i class="badge bg-danger"></i>{{ __('language.Inactive') }}
                                            @endif
                                        </td>

                                        <td>
                                            <div class="d-flex gap-2 justify-content-center">

                                                <a href="{{ route('lessons.show', $item->id) }}"
                                                    class="btn btn-success btn-sm">
                                                    <i class="bi bi-eye-fill"></i>
                                                </a>

                                                <a href="{{ route('lessons.edit', $item->id) }}"
                                                    class="btn btn-primary btn-sm">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>

                                                <a href="{{ route('lessons.delete', $item->id) }}"
                                                    class="btn btn-danger btn-sm">
                                                    <i class="bi bi-trash-fill"></i>
                                                </a>

                                            </div>
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>

                        </table>

                    </div>
                </div>
            </div>


            {{-- ================= CERTIFICATES ================= --}}
            <div class="col-md-12 mb-5">
                <div class="card border-0 shadow-lg">

                    {{-- HEADER --}}
                    <div class="card-header bg-dark text-white border-0">
                        <div class="d-flex justify-content-between align-items-center">

                            <h5 class="mb-0">
                                <i class="bi bi-patch-check-fill me-2"></i>
                                {{ __('language.Certificates') }}
                                <span class="badge bg-primary ms-2">
                                    {{ $certificates_count }}
                                </span>
                            </h5>

                            <a href="{{ route('certificates.create') }}" class="btn btn-success btn-sm">
                                <i class="bi bi-plus-circle me-1"></i>
                                {{ __('language.Create Certificate') }}
                            </a>

                        </div>
                    </div>

                    {{-- BODY --}}
                    <div class="card-body">

                        @if (session('certificates_message'))
                            <div class="alert alert-success text-center">
                                {{ session('certificates_message') }}
                            </div>
                        @endif

                        <table class="table table-hover table-bordered text-center align-middle">

                            <thead class="table-dark">
                                <tr>

                                    <th>
                                        <i class="bi bi-key-fill"></i> {{ __('language.ID💎') }}
                                    </th>

                                    <th>
                                        <i class="bi bi-person-fill"></i> {{ __('language.User') }}
                                    </th>

                                    <th>
                                        <i class="bi bi-book-fill"></i> {{ __('language.Course') }}
                                    </th>

                                    <th>
                                        <i class="bi bi-upc-scan"></i> {{ __('language.Code') }}
                                    </th>

                                    <th>
                                        <i class="bi bi-calendar-event"></i> {{ __('language.Date') }}
                                    </th>

                                    <th>
                                        <i class="bi bi-toggle-on"></i> {{ __('language.Status') }}
                                    </th>

                                    <th>
                                        <i class="bi bi-gear-fill"></i> {{ __('language.Actions') }}
                                    </th>

                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($certificates as $item)
                                    <tr>

                                        <td>{{ $item->id }}</td>

                                        <td>{{ $item->user->name ?? 'Deleted User' }}</td>

                                        <td>{{ $item->course->title ?? 'Deleted Course' }}</td>

                                        <td>

                                            {{ $item->certificate_code }}

                                        </td>

                                        <td>{{ $item->issue_date ?? '-' }}</td>

                                        <td>
                                            @if ($item->status == 'valid')
                                                {{ __('language.Valid') }}
                                            @else
                                                {{ __('language.Revoked') }}
                                            @endif
                                        </td>

                                        <td>
                                            <div class="d-flex gap-2 justify-content-center">

                                                <a href="{{ route('certificates.show', $item->id) }}"
                                                    class="btn btn-success btn-sm">
                                                    <i class="bi bi-eye-fill"></i>
                                                </a>

                                                <a href="{{ route('certificates.edit', $item->id) }}"
                                                    class="btn btn-primary btn-sm">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>

                                                <a href="{{ route('certificates.delete', $item->id) }}"
                                                    class="btn btn-danger btn-sm">
                                                    <i class="bi bi-trash-fill"></i>
                                                </a>

                                            </div>
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>

                        </table>

                    </div>
                </div>
            </div>


            {{-- ================= EXAMS ================= --}}
            <div class="col-md-12 mb-5">
                <div class="card border-0 shadow-lg">

                    {{-- HEADER --}}
                    <div class="card-header bg-dark text-white border-0">
                        <div class="d-flex justify-content-between align-items-center">

                            <h5 class="mb-0">
                                <i class="bi bi-journal-text me-2"></i>
                                {{ __('language.Exams') }}
                                <span class="badge bg-primary ms-2">
                                    {{ $exams_count }}
                                </span>
                            </h5>

                            <a href="{{ route('exams.create') }}" class="btn btn-success btn-sm">
                                <i class="bi bi-plus-circle me-1"></i>
                                {{ __('language.Create Exam') }}
                            </a>

                        </div>
                    </div>

                    {{-- BODY --}}
                    <div class="card-body">

                        @if (session('exams_message'))
                            <div class="alert alert-success text-center">
                                {{ session('exams_message') }}
                            </div>
                        @endif

                        <table class="table table-hover table-bordered text-center align-middle">

                            <thead class="table-dark">
                                <tr>

                                    <th>
                                        <i class="bi bi-key-fill"></i> {{ __('language.ID💎') }}
                                    </th>

                                    <th>
                                        <i class="bi bi-book-fill"></i> {{ __('language.Course') }}
                                    </th>

                                    <th>
                                        <i class="bi bi-type"></i> {{ __('language.Title(✨)') }}
                                    </th>

                                    <th>
                                        <i class="bi bi-bar-chart-fill"></i> {{ __('language.Total Marks') }}
                                    </th>

                                    <th>
                                        <i class="bi bi-check2-circle"></i> {{ __('language.Pass Marks') }}
                                    </th>

                                    <th>
                                        <i class="bi bi-clock-fill"></i> {{ __('language.Duration') }}
                                    </th>

                                    <th>
                                        <i class="bi bi-toggle-on"></i> {{ __('language.Status') }}
                                    </th>

                                    <th>
                                        <i class="bi bi-gear-fill"></i> {{ __('language.Actions') }}
                                    </th>

                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($exams as $item)
                                    <tr>

                                        <td>{{ $item->id }}</td>

                                        <td>{{ $item->course->title ?? 'No Course' }}</td>

                                        <td>{{ $item->title }}</td>

                                        <td>

                                            {{ $item->total_marks }}

                                        </td>

                                        <td>

                                            {{ $item->pass_marks }}

                                        </td>

                                        <td>{{ $item->duration ?? '-' }} {{ __('language.min') }}</td>

                                        <td>
                                            @if ($item->status == 1)
                                                {{ __('language.Active') }}
                                            @else
                                                {{ __('language.Inactive') }}
                                            @endif
                                        </td>

                                        <td>
                                            <div class="d-flex gap-2 justify-content-center">

                                                <a href="{{ route('exams.show', $item->id) }}"
                                                    class="btn btn-success btn-sm">
                                                    <i class="bi bi-eye-fill"></i>
                                                </a>

                                                <a href="{{ route('exams.edit', $item->id) }}"
                                                    class="btn btn-primary btn-sm">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>

                                                <a href="{{ route('exams.delete', $item->id) }}"
                                                    class="btn btn-danger btn-sm">
                                                    <i class="bi bi-trash-fill"></i>
                                                </a>

                                            </div>
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>

                        </table>

                    </div>
                </div>
            </div>


            {{-- ================= QUESTIONS ================= --}}
            <div class="col-md-12 mb-5">
                <div class="card border-0 shadow-lg">

                    {{-- HEADER --}}
                    <div class="card-header bg-dark text-white border-0">
                        <div class="d-flex justify-content-between align-items-center">

                            <h5 class="mb-0">
                                <i class="bi bi-question-circle-fill me-2"></i>
                                {{ __('language.Questions') }}
                                <span class="badge bg-primary ms-2">
                                    {{ $questions_count }}
                                </span>
                            </h5>

                            <a href="{{ route('questions.create') }}" class="btn btn-success btn-sm">
                                <i class="bi bi-plus-circle me-1"></i>
                                {{ __('language.Create Question') }}
                            </a>

                        </div>
                    </div>

                    {{-- BODY --}}
                    <div class="card-body">

                        @if (session('questions_message'))
                            <div class="alert alert-success text-center">
                                {{ session('questions_message') }}
                            </div>
                        @endif

                        <table class="table table-hover table-bordered text-center align-middle">

                            <thead class="table-dark">
                                <tr>

                                    <th>
                                        <i class="bi bi-key-fill"></i> {{ __('language.ID💎') }}
                                    </th>

                                    <th>
                                        <i class="bi bi-journal-text"></i> {{ __('language.Exam') }}
                                    </th>

                                    <th>
                                        <i class="bi bi-chat-left-text"></i> {{ __('language.Question(✨)') }}
                                    </th>

                                    <th>
                                        <i class="bi bi-star-fill"></i> {{ __('language.Mark') }}
                                    </th>

                                    <th>
                                        <i class="bi bi-ui-checks"></i> {{ __('language.Type') }}
                                    </th>

                                    <th>
                                        <i class="bi bi-gear-fill"></i> {{ __('language.Actions') }}
                                    </th>

                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($questions as $item)
                                    <tr>

                                        <td>{{ $item->id }}</td>

                                        <td>{{ $item->exam->title_en ?? 'No Exam' }}</td>

                                        <td>{{ Str::limit($item->question_en, 50) }}</td>

                                        <td>

                                            {{ $item->mark }}

                                        </td>

                                        <td>
                                            @if ($item->type == 'mcq')
                                                {{ __('language.MCQ') }}
                                            @elseif($item->type == 'true_false')
                                                {{ __('language.True/False') }}
                                            @else
                                                {{ __('language.Text') }}
                                            @endif
                                        </td>

                                        <td>
                                            <div class="d-flex gap-2 justify-content-center">

                                                <a href="{{ route('questions.show', $item->id) }}"
                                                    class="btn btn-success btn-sm">
                                                    <i class="bi bi-eye-fill"></i>
                                                </a>

                                                <a href="{{ route('questions.edit', $item->id) }}"
                                                    class="btn btn-primary btn-sm">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>

                                                <a href="{{ route('questions.delete', $item->id) }}"
                                                    class="btn btn-danger btn-sm">
                                                    <i class="bi bi-trash-fill"></i>
                                                </a>

                                            </div>
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>

                        </table>

                    </div>
                </div>
            </div>


            {{-- ================= ANSWERS ================= --}}
            <div class="col-md-12 mb-5">
                <div class="card border-0 shadow-lg">

                    {{-- HEADER --}}
                    <div class="card-header bg-dark text-white border-0">
                        <div class="d-flex justify-content-between align-items-center">

                            <h5 class="mb-0">
                                <i class="bi bi-card-checklist me-2"></i>
                                {{ __('language.Answers') }}
                                <span class="badge bg-primary ms-2">
                                    {{ $answers_count }}
                                </span>
                            </h5>

                            <a href="{{ route('answers.create') }}" class="btn btn-success btn-sm">
                                <i class="bi bi-plus-circle me-1"></i>
                                {{ __('language.Create Answer') }}
                            </a>

                        </div>
                    </div>

                    {{-- BODY --}}
                    <div class="card-body">

                        @if (session('answers_message'))
                            <div class="alert alert-success text-center">
                                {{ session('answers_message') }}
                            </div>
                        @endif

                        <table class="table table-hover table-bordered text-center align-middle">

                            <thead class="table-dark">
                                <tr>

                                    <th>
                                        <i class="bi bi-key-fill"></i> {{ __('language.ID💎') }}
                                    </th>

                                    <th>
                                        <i class="bi bi-question-circle-fill"></i> {{ __('language.Question') }}
                                    </th>

                                    <th>
                                        <i class="bi bi-chat-left-text"></i> {{ __('language.Answer(✨)') }}
                                    </th>

                                    <th>
                                        <i class="bi bi-check2-circle"></i> {{ __('language.Status') }}
                                    </th>

                                    <th>
                                        <i class="bi bi-gear-fill"></i> {{ __('language.Actions') }}
                                    </th>

                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($answers as $item)
                                    <tr>

                                        <td>{{ $item->id }}</td>

                                        <td>{{ Str::limit($item->question->question ?? 'No Question', 50) }}</td>

                                        <td>{{ Str::limit($item->answer, 50) }}</td>

                                        <td>
                                            @if ($item->is_correct)
                                                {{ __('language.Correct') }}
                                            @else
                                                {{ __('language.Wrong') }}
                                            @endif
                                        </td>

                                        <td>
                                            <div class="d-flex gap-2 justify-content-center">

                                                <a href="{{ route('answers.show', $item->id) }}"
                                                    class="btn btn-success btn-sm">
                                                    <i class="bi bi-eye-fill"></i>
                                                </a>

                                                <a href="{{ route('answers.edit', $item->id) }}"
                                                    class="btn btn-primary btn-sm">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>

                                                <a href="{{ route('answers.delete', $item->id) }}"
                                                    class="btn btn-danger btn-sm">
                                                    <i class="bi bi-trash-fill"></i>
                                                </a>

                                            </div>
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>

                        </table>

                    </div>
                </div>
            </div>


            {{-- ================= RESULTS ================= --}}
            <div class="col-md-12 mb-5">
                <div class="card border-0 shadow-lg">

                    <div class="card-header bg-dark text-white border-0">
                        <div class="d-flex justify-content-between align-items-center">

                            <h5 class="mb-0">
                                <i class="bi bi-bar-chart-fill me-2"></i>
                                {{ __('language.Results') }}
                                <span class="badge bg-primary ms-2">
                                    {{ $results_count }}
                                </span>
                            </h5>

                            <a href="{{ route('results.create') }}" class="btn btn-success btn-sm">
                                <i class="bi bi-plus-circle me-1"></i>
                                {{ __('language.Create Result') }}
                            </a>

                        </div>
                    </div>

                    <div class="card-body">

                        @if (session('results_message'))
                            <div class="alert alert-success text-center">
                                {{ session('results_message') }}
                            </div>
                        @endif

                        <table class="table table-hover table-bordered text-center align-middle">

                            <thead class="table-dark">
                                <tr>
                                    <th><i class="bi bi-key-fill"></i> {{ __('language.ID💎') }}</th>
                                    <th><i class="bi bi-person-fill"></i> {{ __('language.User') }}</th>
                                    <th><i class="bi bi-journal-text"></i> {{ __('language.Exam') }}</th>
                                    <th><i class="bi bi-graph-up"></i> {{ __('language.Score') }}</th>
                                    <th><i class="bi bi-bar-chart"></i> {{ __('language.Total') }}</th>
                                    <th><i class="bi bi-check2-circle"></i> {{ __('language.Status') }}</th>
                                    <th><i class="bi bi-gear-fill"></i> {{ __('language.Actions') }}</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($results as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->user->name ?? '-' }}</td>
                                        <td>{{ $item->exam->title_en ?? '-' }}</td>

                                        <td>{{ $item->score }}</td>
                                        <td>{{ $item->total }}</td>

                                        <td>
                                            @if ($item->status == 'pass')
                                                {{ __('language.Pass') }}
                                            @else
                                                {{ __('language.Fail') }}
                                            @endif
                                        </td>

                                        <td>
                                            <div class="d-flex gap-2 justify-content-center">

                                                <a href="{{ route('results.show', $item->id) }}"
                                                    class="btn btn-success btn-sm">
                                                    <i class="bi bi-eye-fill"></i>
                                                </a>

                                                <a href="{{ route('results.edit', $item->id) }}"
                                                    class="btn btn-primary btn-sm">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>

                                                <a href="{{ route('results.delete', $item->id) }}"
                                                    class="btn btn-danger btn-sm">
                                                    <i class="bi bi-trash-fill"></i>
                                                </a>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>

                    </div>
                </div>
            </div>


            {{-- ================= CATEGORIES ================= --}}
            <div class="col-md-12 mb-5">
                <div class="card border-0 shadow-lg">

                    <div class="card-header bg-dark text-white border-0">
                        <div class="d-flex justify-content-between align-items-center">

                            <h5 class="mb-0">
                                <i class="bi bi-grid-fill me-2"></i>
                                {{ __('language.Categories') }}
                                <span class="badge bg-primary ms-2">
                                    {{ $categories_count }}
                                </span>
                            </h5>

                            <a href="{{ route('categories.create') }}" class="btn btn-success btn-sm">
                                <i class="bi bi-plus-circle me-1"></i>
                                {{ __('language.Create Category') }}
                            </a>

                        </div>
                    </div>

                    <div class="card-body">

                        @if (session('categories_message'))
                            <div class="alert alert-success text-center">
                                {{ session('categories_message') }}
                            </div>
                        @endif

                        <table class="table table-hover table-bordered text-center align-middle">

                            <thead class="table-dark">
                                <tr>
                                    <th><i class="bi bi-key-fill"></i> {{ __('language.ID💎') }}</th>
                                    <th><i class="bi bi-image"></i> {{ __('language.Image') }}</th>
                                    <th><i class="bi bi-tag-fill"></i> {{ __('language.Title(✨)') }}</th>
                                    <th><i class="bi bi-toggle-on"></i> {{ __('language.Status') }}</th>
                                    <th><i class="bi bi-gear-fill"></i> {{ __('language.Actions') }}</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($categories as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>

                                        <td>
                                            @if ($item->image)
                                                <img src="{{ asset('storage/' . $item->image) }}" width="45"
                                                    height="45" class="rounded-circle border">
                                            @else
                                                {{ __('language.No Image') }}
                                            @endif
                                        </td>

                                        <td>{{ $item->title }}</td>

                                        <td>
                                            @if ($item->status == 1)
                                                <i class="fas fa-circle-check me-1"></i>
                                                {{ __('language.Active') }}
                                            @else
                                                <i class="fas fa-circle-xmark me-1"></i>
                                                {{ __('language.Inactive') }}
                                            @endif
                                        </td>

                                        <td>
                                            <div class="d-flex gap-2 justify-content-center">

                                                <a href="{{ route('categories.show', $item->id) }}"
                                                    class="btn btn-success btn-sm">
                                                    <i class="bi bi-eye-fill"></i>
                                                </a>

                                                <a href="{{ route('categories.edit', $item->id) }}"
                                                    class="btn btn-primary btn-sm">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>

                                                <a href="{{ route('categories.delete', $item->id) }}"
                                                    class="btn btn-danger btn-sm">
                                                    <i class="bi bi-trash-fill"></i>
                                                </a>

                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>

                        </table>

                    </div>
                </div>
            </div>


            {{-- ================= REVIEWS ================= --}}
            <div class="col-md-12 mb-5">
                <div class="card border-0 shadow-lg">

                    <div class="card-header bg-dark text-white border-0">
                        <div class="d-flex justify-content-between align-items-center">

                            <h5 class="mb-0">
                                <i class="bi bi-star-fill me-2"></i>
                                {{ __('language.Reviews') }}
                                <span class="badge bg-primary ms-2">
                                    {{ $reviews_count }}
                                </span>
                            </h5>

                            <a href="{{ route('reviews.create') }}" class="btn btn-success btn-sm">
                                <i class="bi bi-plus-circle me-1"></i>
                                {{ __('language.Create Review') }}
                            </a>

                        </div>
                    </div>

                    <div class="card-body">

                        @if (session('reviews_message'))
                            <div class="alert alert-success text-center">
                                {{ session('reviews_message') }}
                            </div>
                        @endif

                        <table class="table table-hover table-bordered text-center align-middle">

                            <thead class="table-dark">
                                <tr>
                                    <th><i class="bi bi-key-fill"></i> {{ __('language.ID💎') }}</th>
                                    <th><i class="bi bi-person-fill"></i> {{ __('language.User') }}</th>
                                    <th><i class="bi bi-book-fill"></i> {{ __('language.Course') }}</th>
                                    <th><i class="bi bi-star-fill"></i> {{ __('language.Rating') }}</th>
                                    <th><i class="bi bi-gear-fill"></i> {{ __('language.Actions') }}</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($reviews as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>
                                            {{ $item->user?->name ?? __('language.Unknown User') }}
                                        </td>
                                        <td>
                                            {{ $item->course?->title ?? __('language.Unknown Course') }}
                                        </td>
                                        <td>{{ $item->rating }}</td>

                                        <td>
                                            <div class="d-flex gap-2 justify-content-center">

                                                <a href="{{ route('reviews.show', $item->id) }}"
                                                    class="btn btn-success btn-sm">
                                                    <i class="bi bi-eye-fill"></i>
                                                </a>

                                                <a href="{{ route('reviews.edit', $item->id) }}"
                                                    class="btn btn-primary btn-sm">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>

                                                <a href="{{ route('reviews.delete', $item->id) }}"
                                                    class="btn btn-danger btn-sm">
                                                    <i class="bi bi-trash-fill"></i>
                                                </a>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>

                    </div>
                </div>
            </div>

            {{-- ================= CONTACT MESSAGES ================= --}}
            <div class="col-md-12 mb-5">
                <div class="card border-0 shadow-lg">

                    <div class="card-header bg-dark text-white border-0">
                        <div class="d-flex justify-content-between align-items-center">

                            <h5 class="mb-0">
                                <i class="bi bi-envelope-fill me-2"></i>
                                {{ __('language.Messages') }}
                                <span class="badge bg-primary ms-2">
                                    {{ $contacts_count }}
                                </span>
                            </h5>

                            <a href="{{ route('contacts.create') }}" class="btn btn-success btn-sm">
                                <i class="bi bi-plus-circle me-1"></i>
                                {{ __('language.Create Message') }}
                            </a>

                        </div>
                    </div>

                    <div class="card-body">

                        @if (session('contacts_message'))
                            <div class="alert alert-success text-center">
                                {{ session('contacts_message') }}
                            </div>
                        @endif

                        <table class="table table-hover table-bordered text-center align-middle">

                            <thead class="table-dark">
                                <tr>
                                    <th><i class="bi bi-key-fill"></i> {{ __('language.ID💎') }}</th>
                                    <th><i class="bi bi-person-fill"></i> {{ __('language.Name') }}</th>
                                    <th><i class="bi bi-envelope-fill"></i> {{ __('language.Email') }}</th>
                                    <th><i class="bi bi-chat-dots-fill"></i> {{ __('language.Subject') }}</th>
                                    <th><i class="bi bi-toggle-on"></i> {{ __('language.Status') }}</th>
                                    <th><i class="bi bi-gear-fill"></i> {{ __('language.Actions') }}</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($contacts as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->subject ?? '-' }}</td>

                                        <td>
                                            @if ($item->status == 'new')
                                                {{ __('language.New(✨)') }}
                                            @elseif($item->status == 'read')
                                                {{ __('language.Read🔵') }}
                                            @else
                                                {{ __('language.Replied🌸') }}
                                            @endif
                                        </td>

                                        <td>
                                            <div class="d-flex gap-2 justify-content-center">

                                                <a href="{{ route('contacts.show', $item->id) }}"
                                                    class="btn btn-success btn-sm">
                                                    <i class="bi bi-eye-fill"></i>
                                                </a>

                                                <a href="{{ route('contacts.edit', $item->id) }}"
                                                    class="btn btn-primary btn-sm">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>

                                                <a href="{{ route('contacts.delete', $item->id) }}"
                                                    class="btn btn-danger btn-sm">
                                                    <i class="bi bi-trash-fill"></i>
                                                </a>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
