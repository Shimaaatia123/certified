<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function index()
    {
        $exams = Exam::all();
        return view('Exam', ["exam" => $exams]);
    }

    public function show($id)
    {
        $exams = Exam::findOrFail($id);
        return view("Exam.show", ["exam" => $exams]);
    }

    public function delete($id)
    {
        $exams = Exam::findOrFail($id);
        $exams->delete();
        return redirect()->route("admin.dashboard")->with("exams_message", "Exam Deleted Successfully ✨");
    }

    public function create()
    {
        return view("Exam.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id'   => ['required', 'exists:courses,id'],
            'title_ar'    => ['required', 'string', 'max:255'],
            'title_en'    => ['required', 'string', 'max:255'],
            'total_marks' => ['required', 'numeric', 'min:1'],
            'pass_marks'  => ['required', 'numeric', 'lt:total_marks'],
            'duration'    => ['required', 'numeric', 'min:1'],
            'status'      => ['required'],
        ]);

        Exam::create([
            'course_id'   => $request->course_id,
            'title_ar'    => $request->title_ar,
            'title_en'    => $request->title_en,
            'total_marks' => $request->total_marks,
            'pass_marks'  => $request->pass_marks,
            'duration'    => $request->duration,
            'status'      => $request->status,
        ]);

        return redirect()->route("admin.dashboard")
            ->with("exams_message", "Exam Added Successfully 🎉");
    }

    public function edit($id)
    {
        $exams = Exam::findOrFail($id);
        return view("Exam.edit", ["exam" => $exams]);
    }

    public function update(Request $request, $id)
    {
        $exam = Exam::findOrFail($id);

        $request->validate([

            'course_id'   => ['required', 'exists:courses,id'],

            'title_ar'    => ['required', 'string', 'max:255'],

            'title_en'    => ['required', 'string', 'max:255'],

            'total_marks' => ['required', 'numeric', 'min:1'],

            'pass_marks'  => ['required', 'numeric', 'lt:total_marks'],

            'duration'    => ['required', 'numeric', 'min:1'],

            'status'      => ['required'],

        ]);

        $exam->update([

            'course_id'   => $request->course_id,
            'title_ar'    => $request->title_ar,
            'title_en'    => $request->title_en,
            'total_marks' => $request->total_marks,
            'pass_marks'  => $request->pass_marks,
            'duration'    => $request->duration,
            'status'      => $request->status,

        ]);

        return redirect()->route("admin.dashboard")
            ->with("exams_message", "Exam Updated Successfully ✨");
    }
}
