<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        return view('Question', ["question" => $questions]);
    }

    public function show($id)
    {
        $questions = Question::findOrFail($id);
        return view("Question.show", ["question" => $questions]);
    }

    public function delete($id)
    {
        $questions = Question::findOrFail($id);
        $questions->delete();
        return redirect()->route("admin.dashboard")->with("questions_message", "Question Deleted Successfully ✨");
    }

    public function create()
    {
        return view("Question.create");
    }

    public function store(Request $request)
    {
        // 1️⃣ Validation
        $request->validate([
           
            'exam_id'     => ['required', 'exists:exams,id'],
            'question_ar' => ['required', 'string', 'min:3'],
            'question_en' => ['required', 'string', 'min:3'],
            'mark'        => ['required', 'numeric', 'min:1'],
            'type'        => ['required', 'in:mcq,true_false,text'],
        ]);

        // 2️⃣ 🔥 Business Logic
        $exam = Exam::findOrFail($request->exam_id);

        $currentMarks = Question::where('exam_id', $request->exam_id)->sum('mark');

        if (($currentMarks + $request->mark) > $exam->total_marks) {
            return back()->withErrors([
                'mark' => 'Total questions marks cannot exceed exam total marks',
            ]);
        }

        // 3️⃣ Save
        Question::create([
           
            "exam_id"     => $request->exam_id,
            "question_ar" => $request->question_ar,
            "question_en" => $request->question_en,
            "mark"        => $request->mark,
            "type"        => $request->type,
        ]);

        return redirect()->route("admin.dashboard")
            ->with("questions_message", "Question Added Successfully 🎉");
    }

    public function edit($id)
    {
        $questions = Question::findOrFail($id);
        return view("Question.edit", ["question" => $questions]);
    }

      public function update(Request $request, $id)
    {
        // 1. جلب السؤال الحالي
        $question = Question::findOrFail($id);

        // 2. Validation
        $request->validate([

            'exam_id'     => [
                'required',
                'exists:exams,id',
            ],

            'question_ar' => [
                'required',
                'string',
                'min:3',
            ],

            'question_en' => [
                'required',
                'string',
                'min:3',
            ],

            'mark'        => [
                'required',
                'numeric',
                'min:1',
            ],

            'type'        => [
                'required',
                Rule::in(['mcq', 'true_false', 'text']),
            ],
        ]);

        // 3. جلب الامتحان
        $exam = Exam::findOrFail($request->exam_id);

        // 4. حساب مجموع الدرجات الحالية بدون السؤال الحالي
        $currentMarks = Question::where('exam_id', $request->exam_id)
            ->where('id', '!=', $question->id)
            ->sum('mark');

        // 5. التحقق من إجمالي الدرجات
        if (($currentMarks + $request->mark) > $exam->total_marks) {
            return back()->withErrors([
                'mark' => 'Total questions marks cannot exceed exam total marks',
            ])->withInput();
        }

        // 6. تجهيز البيانات
        $data = [
            
            'exam_id'     => $request->exam_id,
            'question_ar' => $request->question_ar,
            'question_en' => $request->question_en,
            'mark'        => $request->mark,
            'type'        => $request->type,
        ];

        // 7. تحديث
        $question->update($data);

        // 8. redirect
        return redirect()->route('admin.dashboard')
            ->with('questions_message', 'Question Updated Successfully ✨🎉');
    }
}
