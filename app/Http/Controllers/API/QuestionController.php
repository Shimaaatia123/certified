<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuestionResource;
use App\Models\Exam;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = QuestionResource::collection(Question::all());

        $data = [
            "msg💌"    => "Return All Data🔄",
            "status📌" => 200,
            "data🌍"   => $questions,
        ];

        return response()->json($data);
    }

    public function show($id)
    {
        $questions = Question::find($id);

        if ($questions) {
            $data = [
                "msg💌"    => "Return One Of Point✅",
                "status📌" => 200,
                "data🌍"   => new QuestionResource($questions),
            ];

            return response()->json($data);
        }

        $data = [
            "msg💌"    => "No Such ID ❌",
            "status📌" => 404,
            "data🌍"   => null,
        ];

        return response()->json($data);
    }

    public function destroy($id)
    {
        $questions = Question::find($id);

        if ($questions) {
            $questions->delete();

            $data = [
                "msg💌"    => "Question Deleted Successfully 🗑️",
                "status📌" => 200,
                "data🌍"   => null,
            ];

            return response()->json($data);
        }

        $data = [
            "msg💌"    => "No Such ID ❌",
            "status📌" => 404,
            "data🌍"   => null,
        ];

        return response()->json($data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'exam_id'     => ['required', 'exists:exams,id'],
            'question_ar' => ['required', 'string', 'min:3'],
            'question_en' => ['required', 'string', 'min:3'],
            'mark'        => ['required', 'numeric', 'min:1'],
            'type'        => ['required', 'in:mcq,true_false,text'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                "msg💌"    => "Validation Required ❌",
                "status📌" => 422,
                "data🌍"   => $validator->errors(),
            ]);
        }

        $data = $validator->validated();

        $exam = Exam::findOrFail($data['exam_id']);

        $currentMarks = Question::where('exam_id', $data['exam_id'])->sum('mark');

        if (($currentMarks + $data['mark']) > $exam->total_marks) {
            return response()->json([
                "msg💌"    => "Validation Error ❌",
                "status📌" => 422,
                "data🌍"   => [
                    "mark" => "Total questions marks cannot exceed exam total marks",
                ],
            ]);
        }

        $question = Question::create($data);

        return response()->json([
            "msg💌"    => "Question Created Successfully 🎉",
            "status📌" => 200,
            "data🌍"   => new QuestionResource($question),
        ]);
    }

    public function update(Request $request, $id)
    {
        $question = Question::find($id);

        if (! $question) {
            return response()->json([
                "msg💌"    => "No Such ID ❌",
                "status📌" => 404,
                "data🌍"   => null,
            ]);
        }

        $validator = Validator::make($request->all(), [
            'exam_id'     => ['sometimes', 'required', 'exists:exams,id'],
            'question_ar' => ['sometimes', 'required', 'string', 'min:3'],
            'question_en' => ['sometimes', 'required', 'string', 'min:3'],
            'mark'        => ['sometimes', 'required', 'numeric', 'min:1'],
            'type'        => ['sometimes', 'required', 'in:mcq,true_false,text'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                "msg💌"    => "Validation Required ❌",
                "status📌" => 422,
                "data🌍"   => $validator->errors(),
            ]);
        }

        $data = $validator->validated();

        $examId = $data['exam_id'] ?? $question->exam_id;
        $mark   = $data['mark'] ?? $question->mark;

        $exam = Exam::findOrFail($examId);

        $currentMarks = Question::where('exam_id', $examId)
            ->where('id', '!=', $question->id)
            ->sum('mark');

        if (($currentMarks + $mark) > $exam->total_marks) {
            return response()->json([
                "msg💌"    => "Validation Error ❌",
                "status📌" => 422,
                "data🌍"   => [
                    "mark" => "Total questions marks cannot exceed exam total marks",
                ],
            ]);
        }

        $question->update($data);

        return response()->json([
            "msg💌"    => "Question Updated Successfully 🎉",
            "status📌" => 200,
            "data🌍"   => new QuestionResource($question),
        ]);
    }
}
