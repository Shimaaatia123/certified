<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function index()
    {
        $answers = Answer::all();
        return view('Answer', ["answer" => $answers]);
    }

    public function show($id)
    {
        $answers = Answer::findOrFail($id);
        return view("Answer.show", ["answer" => $answers]);
    }

    public function delete($id)
    {
        $answers = Answer::findOrFail($id);
        $answers->delete();
        return redirect()->route("admin.home")->with("answers_message", "Answer Deleted Successfully✨");
    }

    public function create()
    {
        return view("Answer.create");
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'question_id' => ['required', 'exists:questions,id'],
            'answer_ar'   => ['required', 'string'],
            'answer_en'   => ['required', 'string'],
        ]);

        Answer::create([
            'question_id' => $data['question_id'],
            'answer_ar'   => $data['answer_ar'],
            'answer_en'   => $data['answer_en'],
            'is_correct'  => filter_var($request->is_correct, FILTER_VALIDATE_BOOLEAN),
        ]);

        return redirect()->route("admin.home")
            ->with('answers_message', 'Answer Added Successfully 🎉');
    }

    public function edit($id)
    {
        $answers = Answer::findOrFail($id);
        return view("Answer.edit", ["answer" => $answers]);
    }

    public function update(Request $request, $id)
    {
        $answer = Answer::findOrFail($id);

        $data = $request->validate([

            'question_id' => ['required', 'exists:questions,id'],

            'answer_ar'   => ['required', 'string'],

            'answer_en'   => ['required', 'string'],

        ]);

        $answer->update([

            'question_id' => $data['question_id'],

            'answer_ar'   => $data['answer_ar'],

            'answer_en'   => $data['answer_en'],

            'is_correct'  => filter_var(
                $request->is_correct,
                FILTER_VALIDATE_BOOLEAN
            ),

        ]);

        return redirect()->route("admin.home")
            ->with('answers_message', 'Answer Updated Successfully ✨');
    }
}
