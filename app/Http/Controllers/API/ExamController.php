<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ExamResource;
use App\Models\Exam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExamController extends Controller
{
    public function index()
    {
        $exams = ExamResource::collection(Exam::all());

        return response()->json([
            "msg💌"    => "Return All Data🔄",
            "status📌" => 200,
            "data🌍"   => $exams,
        ]);
    }

    public function show($id)
    {
        $exam = Exam::find($id);

        if ($exam) {
            return response()->json([
                "msg💌"    => "Return One Of Point✅",
                "status📌" => 200,
                "data🌍"   => new ExamResource($exam),
            ]);
        }

        return response()->json([
            "msg💌"    => "No Such ID ❌",
            "status📌" => 404,
            "data🌍"   => null,
        ], 404);
    }

    public function destroy($id)
    {
        $exam = Exam::find($id);

        if ($exam) {
            $exam->delete();

            return response()->json([
                "msg💌"    => "Exam Deleted Successfully 🗑️",
                "status📌" => 200,
                "data🌍"   => null,
            ]);
        }

        return response()->json([
            "msg💌"    => "No Such ID ❌",
            "status📌" => 404,
            "data🌍"   => null,
        ], 404);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id'          => ['required', 'unique:exams,id'],
            'course_id'   => ['required', 'exists:courses,id'],
            'title_ar'    => ['required', 'string', 'max:255'],
            'title_en'    => ['required', 'string', 'max:255'],
            'total_marks' => ['required', 'numeric', 'min:1'],
            'pass_marks'  => ['required', 'numeric', 'lt:total_marks'],
            'duration'    => ['required', 'numeric', 'min:1'],
            'status' => ['required', 'boolean'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                "msg💌"    => "Validation Required ❌",
                "status📌" => 422,
                "data🌍"   => $validator->errors(),
            ], 422);
        }

        $data = $validator->validated();

        $exam = Exam::create($data);

        return response()->json([
            "msg💌"    => "Exam Created Successfully 🎉",
            "status📌" => 200,
            "data🌍"   => new ExamResource($exam),
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $exam = Exam::find($id);

        if (! $exam) {
            return response()->json([
                "msg💌"    => "No Such ID ❌",
                "status📌" => 404,
                "data🌍"   => null,
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'course_id'   => ['required', 'exists:courses,id'],
            'title_ar'    => ['required', 'string', 'max:255'],
            'title_en'    => ['required', 'string', 'max:255'],
            'total_marks' => ['required', 'numeric', 'min:1'],
            'pass_marks'  => ['required', 'numeric', 'lt:total_marks'],
            'duration'    => ['required', 'numeric', 'min:1'],
            'status' => ['required', 'boolean'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                "msg💌"    => "Validation Required ❌",
                "status📌" => 422,
                "data🌍"   => $validator->errors(),
            ], 422);
        }

        $validated = $validator->validated();

        $exam->update($validated);

        return response()->json([
            "msg💌"    => "Exam Updated Successfully 🎉",
            "status📌" => 200,
            "data🌍"   => new ExamResource($exam->fresh()),
        ], 200);
    }
}