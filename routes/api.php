<?php

use App\Http\Controllers\API\AnswerController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\CertificateController;
use App\Http\Controllers\API\ContactMessageController;
use App\Http\Controllers\API\CourseController;
use App\Http\Controllers\API\EnrollmentController;
use App\Http\Controllers\API\ExamController;
use App\Http\Controllers\API\InstructorController;
use App\Http\Controllers\API\LessonController;
use App\Http\Controllers\API\QuestionController;
use App\Http\Controllers\API\ResultController;
use App\Http\Controllers\API\ReviewController;
use App\Http\Controllers\API\UserController;
use Illuminate\Support\Facades\Route;

//Users
Route::get("/users/all", [UserController::class, "index"]);
Route::get("/users/show/{id}", [UserController::class, "show"]);
Route::delete("/users/{id}", [UserController::class, "destroy"]);
Route::post("/users/store", [UserController::class, "store"]);
Route::put("/users/{id}", [UserController::class, "update"]);

// Categories
Route::get('/categories/all', [CategoryController::class, 'index']);
Route::get('/categories/show/{id}', [CategoryController::class, 'show']);
Route::post('/categories/store', [CategoryController::class, 'store']);
Route::put('/categories/{id}', [CategoryController::class, 'update']);
Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);

//Answers
Route::get('/answers/all', [AnswerController::class, 'index']);
Route::get('/answers/show/{id}', [AnswerController::class, 'show']);
Route::post('/answers/store', [AnswerController::class, 'store']);
Route::put('/answers/{id}', [AnswerController::class, 'update']);
Route::delete('/answers/{id}', [AnswerController::class, 'destroy']);

//ContactMessages
Route::get("/contacts/all", [ContactMessageController::class, "index"]);
Route::get("/contacts/show/{id}", [ContactMessageController::class, "show"]);
Route::delete("/contacts/{id}", [ContactMessageController::class, "destroy"]);
Route::post("/contacts/store", [ContactMessageController::class, "store"]);
Route::put("/contacts/{id}", [ContactMessageController::class, "update"]);

//Exams
Route::get("/exams/all", [ExamController::class, "index"]);
Route::get("/exams/show/{id}", [ExamController::class, "show"]);
Route::delete("/exams/{id}", [ExamController::class, "destroy"]);
Route::post("/exams/store", [ExamController::class, "store"]);
Route::put("/exams/{id}", [ExamController::class, "update"]);
 
//Questions
Route::get("/questions/all", [QuestionController::class, "index"]);
Route::get("/questions/show/{id}", [QuestionController::class, "show"]);
Route::delete("/questions/{id}", [QuestionController::class, "destroy"]);
Route::post("/questions/store", [QuestionController::class, "store"]);
Route::put('/questions/{id}', [QuestionController::class, 'update']);

//Results
Route::get("/results/all", [ResultController::class, "index"]);
Route::get("/results/show/{id}", [ResultController::class, "show"]);
Route::delete("/results/{id}", [ResultController::class, "destroy"]);
Route::post("/results/store", [ResultController::class, "store"]);
Route::put("/results/{id}", [ResultController::class, "update"]);

//Reviews
Route::get("/reviews/all", [ReviewController::class, "index"]);
Route::get("/reviews/show/{id}", [ReviewController::class, "show"]);
Route::delete("/reviews/{id}", [ReviewController::class, "destroy"]);
Route::post("/reviews/store", [ReviewController::class, "store"]);
Route::put("/reviews/{id}", [ReviewController::class, "update"]);

//Lessons
Route::get("/lessons/all", [LessonController::class, "index"]);
Route::get("/lessons/show/{id}", [LessonController::class, "show"]);
Route::delete("/lessons/{id}", [LessonController::class, "destroy"]);
Route::post("/lessons/store", [LessonController::class, "store"]);
Route::put("/lessons/{id}", [LessonController::class, "update"]);

//Certificates
Route::get("/certificates/all", [CertificateController::class, "index"]);
Route::get("/certificates/show/{id}", [CertificateController::class, "show"]);
Route::delete("/certificates/{id}", [CertificateController::class, "destroy"]);
Route::post("/certificates/store", [CertificateController::class, "store"]);
Route::put("/certificates/{id}", [CertificateController::class, "update"]);
Route::get("/certificates/verify", [CertificateController::class, "verify"]);

//Courses
Route::get("/courses/all", [CourseController::class, "index"]);
Route::get("/courses/show/{id}", [CourseController::class, "show"]);
Route::delete("/courses/{id}", [CourseController::class, "destroy"]);
Route::post("/courses/store", [CourseController::class, "store"]);
Route::put("/courses/{id}", [CourseController::class, "update"]);

//Instructors
Route::get("/instructors/all", [InstructorController::class, "index"]);
Route::get("/instructors/show/{id}", [InstructorController::class, "show"]);
Route::delete("/instructors/{id}", [InstructorController::class, "destroy"]);
Route::post("/instructors/store", [InstructorController::class, "store"]);
Route::put("/instructors/{id}", [InstructorController::class, "update"]);

//Enrollments
Route::get("/enrollments/all", [EnrollmentController::class, "index"]);
Route::get("/enrollments/show/{id}", [EnrollmentController::class, "show"]);
Route::delete("/enrollments/{id}", [EnrollmentController::class, "destroy"]);
Route::post("/enrollments/store", [EnrollmentController::class, "store"]);
Route::put("/enrollments/{id}", [EnrollmentController::class, "update"]);
