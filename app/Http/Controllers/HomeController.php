<?php
namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Category;
use App\Models\Certificate;
use App\Models\Contact_Message;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Exam;
use App\Models\Instructor;
use App\Models\Lesson;
use App\Models\Question;
use App\Models\Result;
use App\Models\Review;
use App\Models\User;

class HomeController extends Controller
{

    public function index()
    {

        return view('dashboard', [

            // ================= COUNTS =================
            'users_count'        => User::count(),
            'categories_count'   => Category::count(),
            'courses_count'      => Course::count(),
            'instructors_count'  => Instructor::count(),
            'enrollments_count'  => Enrollment::count(),
            'exams_count'        => Exam::count(),
            'questions_count'    => Question::count(),
            'answers_count'      => Answer::count(),
            'results_count'      => Result::count(),
            'lessons_count'      => Lesson::count(),
            'reviews_count'      => Review::count(),
            'certificates_count' => Certificate::count(),
            'contacts_count'     => Contact_Message::count(),

            // ================= RECENT DATA =================
            'users'              => User::latest()->take(5)->get(),
            'courses'            => Course::latest()->take(5)->get(),
            'instructors'        => Instructor::latest()->take(5)->get(),
            'reviews'            => Review::latest()->take(5)->get(),
            'contacts'           => Contact_Message::latest()->take(5)->get(),

            'enrollments'        => Enrollment::with(['user', 'course'])
                ->latest()
                ->take(10)
                ->get(),

            'certificates'       => Certificate::with(['user', 'course'])
                ->latest()
                ->take(10)
                ->get(),

            'exams'              => Exam::with('course')->latest()->take(5)->get(),
            'questions'          => Question::with('exam')->latest()->take(5)->get(),
            'answers'            => Answer::with('question')->latest()->take(5)->get(),
            'results'            => Result::with(['user', 'exam'])->latest()->take(5)->get(),
            'lessons'            => Lesson::with('course')->latest()->take(10)->get(),
            'categories'         => Category::latest()->take(10)->get(),
        ]);
    }
}
