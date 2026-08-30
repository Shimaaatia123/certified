<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AnswerController extends Controller
{
    public function index()
    {
        return response()->json([
            "msg💌"    => "Return All Data 🔄",
            "status📌" => 200,
            "data🌍"   => Answer::all(),
        ], 200);
    }

    public function show($id)
    {
        $answer = Answer::find($id);

        if (! $answer) {
            return response()->json([
                "msg💌"    => "No Such ID ❌",
                "status📌" => 404,
                "data🌍"   => null,
            ], 404);
        }

        return response()->json([
            "msg💌"    => "Return Answer Successfully ✅",
            "status📌" => 200,
            "data🌍"   => $answer,
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'question_id' => ['required', 'exists:questions,id'],
            'answer_ar'   => ['required', 'string', 'min:2'],
            'answer_en'   => ['required', 'string', 'min:2'],
            'is_correct'  => ['required', 'boolean'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                "msg💌"    => "Validation Error ❌",
                "status📌" => 422,
                "errors🌍" => $validator->errors(),
            ], 422);
        }

        $answer = Answer::create([
            'question_id' => $request->question_id,
            'answer_ar'   => $request->answer_ar,
            'answer_en'   => $request->answer_en,
            'is_correct'  => $request->boolean('is_correct'),
        ]);

        return response()->json([
            "msg💌"    => "Answer Added Successfully 🎉",
            "status📌" => 201,
            "data🌍"   => $answer,
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $answer = Answer::find($id);

        if (! $answer) {
            return response()->json([
                "msg💌"    => "No Such ID ❌",
                "status📌" => 404,
                "data🌍"   => null,
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'question_id' => ['required', 'exists:questions,id'],
            'answer_ar'   => ['required', 'string', 'min:2'],
            'answer_en'   => ['required', 'string', 'min:2'],
            'is_correct'  => ['required', 'boolean'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                "msg💌"    => "Validation Error ❌",
                "status📌" => 422,
                "errors🌍" => $validator->errors(),
            ], 422);
        }

        $answer->update([
            'question_id' => $request->question_id,
            'answer_ar'   => $request->answer_ar,
            'answer_en'   => $request->answer_en,
            'is_correct'  => $request->boolean('is_correct'),
        ]);

        return response()->json([
            "msg💌"    => "Answer Updated Successfully ✨",
            "status📌" => 200,
            "data🌍"   => $answer,
        ], 200);
    }

    public function destroy($id)
    {
        $answer = Answer::find($id);

        if (! $answer) {
            return response()->json([
                "msg💌"    => "No Such ID ❌",
                "status📌" => 404,
                "data🌍"   => null,
            ], 404);
        }

        $answer->delete();

        return response()->json([
            "msg💌"    => "Answer Deleted Successfully 🗑️",
            "status📌" => 200,
        ], 200);
    }
}
