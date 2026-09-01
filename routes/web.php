<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

require __DIR__ . '/auth.php';

Route::group(
    [
        'prefix'     => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ], function () { //...

        Route::view('/', 'pages.welcome')->name('home');

        Route::get('/courses', [CourseController::class, 'page'])
            ->name('courses.route');

        Route::view('/about', 'pages.about')->name('about');

        Route::view('/features', 'pages.features')->name('features');

        Route::view('/certificates', 'pages.certificates')->name('certificates');

        Route::view('/contact', 'pages.contact')->name('contact');

        Route::post('/contact/send', [ContactMessageController::class, 'store'])
            ->name('contact.send');

        Route::get('/dashboard', function () {
            return view('dashboard');
        })->middleware(['auth', 'verified'])->name('dashboard');

        Route::middleware('auth')->group(function () {
            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        });

        Route::group(["middleware" => "CheckBoundary"], function () {

            Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
                ->name('admin.home');

            // USERS
            Route::get("/users/show/{id}", [UserController::class, "show"])->name("users.show");
            Route::get("/users/delete/{id}", [UserController::class, "delete"])->name("users.delete");
            Route::get("/users/create", [UserController::class, "create"])->name("users.create");
            Route::post("/users/store", [UserController::class, "store"])->name("users.store");
            Route::get("/users/edit/{id}", [UserController::class, "edit"])->name("users.edit");
            Route::put("/users/update/{id}", [UserController::class, "update"])
                ->name("users.update");

            //COURSES
            Route::get("/courses/show/{id}", [CourseController::class, "show"])->name("courses.show");
            Route::get("/courses/delete/{id}", [CourseController::class, "delete"])->name("courses.delete");
            Route::get("/courses/create", [CourseController::class, "create"])->name("courses.create");
            Route::post("/courses/store", [CourseController::class, "store"])->name("courses.store");
            Route::get("/courses/edit/{id}", [CourseController::class, "edit"])->name("courses.edit");
            Route::put("/courses/update/{id}", [CourseController::class, "update"])->name("courses.update");

            //INSTRUCTORS
            Route::get("/instructors/show/{id}", [InstructorController::class, "show"])->name("instructors.show");
            Route::get("/instructors/delete/{id}", [InstructorController::class, "delete"])->name("instructors.delete");
            Route::get("/instructors/create", [InstructorController::class, "create"])->name("instructors.create");
            Route::post("/instructors/store", [InstructorController::class, "store"])->name("instructors.store");
            Route::get("/instructors/edit/{id}", [InstructorController::class, "edit"])->name("instructors.edit");
            Route::put("/instructors/update/{id}", [InstructorController::class, "update"])->name("instructors.update");

            //ENROLLMENTS
            Route::get("/enrollments/show/{id}", [EnrollmentController::class, "show"])->name("enrollments.show");
            Route::get("/enrollments/delete/{id}", [EnrollmentController::class, "delete"])->name("enrollments.delete");
            Route::get("/enrollments/create", [EnrollmentController::class, "create"])->name("enrollments.create");
            Route::post("/enrollments/store", [EnrollmentController::class, "store"])->name("enrollments.store");
            Route::get("/enrollments/edit/{id}", [EnrollmentController::class, "edit"])->name("enrollments.edit");
            Route::put("/enrollments/update/{id}", [EnrollmentController::class, "update"])->name("enrollments.update");

            //LESSONS
            Route::get("/lessons/show/{id}", [LessonController::class, "show"])->name("lessons.show");
            Route::get("/lessons/delete/{id}", [LessonController::class, "delete"])->name("lessons.delete");
            Route::get("/lessons/create", [LessonController::class, "create"])->name("lessons.create");
            Route::post("/lessons/store", [LessonController::class, "store"])->name("lessons.store");
            Route::get("/lessons/edit/{id}", [LessonController::class, "edit"])->name("lessons.edit");
            Route::put("/lessons/update/{id}", [LessonController::class, "update"])->name("lessons.update");

            //CERTIFICATES
            Route::get("/certificates/show/{id}", [CertificateController::class, "show"])->name("certificates.show");
            Route::get("/certificates/delete/{id}", [CertificateController::class, "delete"])->name("certificates.delete");
            Route::get("/certificates/create", [CertificateController::class, "create"])->name("certificates.create");
            Route::post("/certificates/store", [CertificateController::class, "store"])->name("certificates.store");
            Route::get("/certificates/edit/{id}", [CertificateController::class, "edit"])->name("certificates.edit");
            Route::put("/certificates/update/{id}", [CertificateController::class, "update"])->name("certificates.update");

            //EXAMS
            Route::get("/exams/show/{id}", [ExamController::class, "show"])->name("exams.show");
            Route::get("/exams/delete/{id}", [ExamController::class, "delete"])->name("exams.delete");
            Route::get("/exams/create", [ExamController::class, "create"])->name("exams.create");
            Route::post("/exams/store", [ExamController::class, "store"])->name("exams.store");
            Route::get("/exams/edit/{id}", [ExamController::class, "edit"])->name("exams.edit");
            Route::put("/exams/update/{id}", [ExamController::class, "update"])->name("exams.update");

            //QUESTIONS
            Route::get("/questions/show/{id}", [QuestionController::class, "show"])->name("questions.show");
            Route::get("/questions/delete/{id}", [QuestionController::class, "delete"])->name("questions.delete");
            Route::get("/questions/create", [QuestionController::class, "create"])->name("questions.create");
            Route::post("/questions/store", [QuestionController::class, "store"])->name("questions.store");
            Route::get("/questions/edit/{id}", [QuestionController::class, "edit"])->name("questions.edit");
            Route::put("/questions/update/{id}", [QuestionController::class, "update"])->name("questions.update");

            //ANSWERS
            Route::get("/answers/show/{id}", [AnswerController::class, "show"])->name("answers.show");
            Route::get("/answers/delete/{id}", [AnswerController::class, "delete"])->name("answers.delete");
            Route::get("/answers/create", [AnswerController::class, "create"])->name("answers.create");
            Route::post("/answers/store", [AnswerController::class, "store"])->name("answers.store");
            Route::get("/answers/edit/{id}", [AnswerController::class, "edit"])->name("answers.edit");
            Route::put("/answers/update/{id}", [AnswerController::class, "update"])->name("answers.update");

            //RESULTS
            Route::get("/results/show/{id}", [ResultController::class, "show"])->name("results.show");
            Route::get("/results/delete/{id}", [ResultController::class, "delete"])->name("results.delete");
            Route::get("/results/create", [ResultController::class, "create"])->name("results.create");
            Route::post("/results/store", [ResultController::class, "store"])->name("results.store");
            Route::get("/results/edit/{id}", [ResultController::class, "edit"])->name("results.edit");
            Route::put("/results/update/{id}", [ResultController::class, "update"])->name("results.update");

            //CATEGORIES
            Route::get("/categories/show/{id}", [CategoryController::class, "show"])->name("categories.show");
            Route::get("/categories/delete/{id}", [CategoryController::class, "delete"])->name("categories.delete");
            Route::get("/categories/create", [CategoryController::class, "create"])->name("categories.create");
            Route::post("/categories/store", [CategoryController::class, "store"])->name("categories.store");
            Route::get("/categories/edit/{id}", [CategoryController::class, "edit"])->name("categories.edit");
            Route::put("/categories/update/{id}", [CategoryController::class, "update"])->name("categories.update");

            //REVIEWS
            Route::get("/reviews/show/{id}", [ReviewController::class, "show"])->name("reviews.show");
            Route::get("/reviews/delete/{id}", [ReviewController::class, "delete"])->name("reviews.delete");
            Route::get("/reviews/create", [ReviewController::class, "create"])->name("reviews.create");
            Route::post("/reviews/store", [ReviewController::class, "store"])->name("reviews.store");
            Route::get("/reviews/edit/{id}", [ReviewController::class, "edit"])->name("reviews.edit");
            Route::put("/reviews/update/{id}", [ReviewController::class, "update"])->name("reviews.update");

            //CONTACT MESSAGES
            Route::get("/contacts/show/{id}", [ContactMessageController::class, "show"])->name("contacts.show");
            Route::get("/contacts/delete/{id}", [ContactMessageController::class, "delete"])->name("contacts.delete");
            Route::get("/contacts/create", [ContactMessageController::class, "create"])->name("contacts.create");
            Route::post("/contacts/store", [ContactMessageController::class, "store"])->name("contacts.store");
            Route::get("/contacts/edit/{id}", [ContactMessageController::class, "edit"])->name("contacts.edit");
            Route::put("/contacts/update/{id}", [ContactMessageController::class, "update"])->name("contacts.update");

        });

    });
