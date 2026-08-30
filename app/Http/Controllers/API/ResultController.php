<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ResultResource;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ResultController extends Controller
{
    public function index()
    {
        $results = ResultResource::collection(Result::all());
        $data    = [
            "msg💌"    => "Return All Data🔄",
            "status📌" => 200,
            "data🌍"   => $results,
        ];
        return response()->json($data);
    }

    public function show($id)
    {
        $results = Result::find($id);
        if ($results) {

            $data = [
                "msg💌"    => "Return One Of Point✅",
                "status📌" => 200,
                "data🌍"   => new ResultResource($results),
            ];
            return response()->json($data);
        } else {
            $data = [
                "msg💌"    => "No Such ID ❌",
                "status📌" => 404,
                "data🌍"   => null,
            ];
            return response()->json($data);
        }
    }

    public function destroy($id)
    {
        $results = Result::find($id);
        if ($results) {
            $results->delete();
            $data = [
                "msg💌"    => "Result Deleted Successfully 🗑️",
                "status📌" => 200,
                "data🌍"   => null,
            ];
            return response()->json($data);
        } else {
            $data = [
                "msg💌"    => "No Such ID ❌",
                "status📌" => 404,
                "data🌍"   => null,
            ];
            return response()->json($data);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => ['required', 'exists:users,id'],
            'exam_id' => ['required', 'exists:exams,id'],
            'score'   => ['required', 'numeric', 'min:0'],
            'total'   => ['required', 'numeric', 'min:1'],
            'status'  => ['required', 'in:pass,fail'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                "msg💌"    => "Validation Required ❌",
                "status📌" => 422,
                "data🌍"   => $validator->errors(),
            ]);
        }

        $data = $validator->validated();

        // 🔥 Business rule
        if ($data['score'] > $data['total']) {
            return response()->json([
                "msg💌"    => "Validation Error ❌",
                "status📌" => 422,
                "data🌍"   => [
                    "score" => "Score cannot be greater than total marks",
                ],
            ]);
        }

        // 🔥 Percentage
        $percentage = ($data['score'] / $data['total']) * 100;

        // 🔥 Grade logic
        $grade = match (true) {
            $percentage >= 85 => 'A',
            $percentage >= 75 => 'B',
            $percentage >= 65 => 'C',
            $percentage >= 50 => 'D',
            default           => 'F',
        };

        $data['percentage'] = $percentage;
        $data['grade']      = $grade;

        $result = Result::create($data);

        return response()->json([
            "msg💌"    => "Result Created Successfully 🎉",
            "status📌" => 200,
            "data🌍"   => new ResultResource($result),
        ]);
    }

    public function update(Request $request, $id)
    {
        $result = Result::find($id);

        if (! $result) {
            return response()->json([
                "msg💌"    => "No Such ID ❌",
                "status📌" => 404,
                "data🌍"   => null,
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'user_id' => ['required', 'exists:users,id'],
            'exam_id' => ['required', 'exists:exams,id'],
            'score'   => ['required', 'numeric', 'min:0'],
            'total'   => ['required', 'numeric', 'min:1'],
            'status'  => ['required', 'in:pass,fail'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                "msg💌"    => "Validation Required ❌",
                "status📌" => 422,
                "data🌍"   => $validator->errors(),
            ], 422);
        }

        $validated = $validator->validated();

        // Business Rule
        if ($validated['score'] > $validated['total']) {
            return response()->json([
                "msg💌"    => "Validation Error ❌",
                "status📌" => 422,
                "data🌍"   => [
                    "score" => "Score cannot be greater than total marks",
                ],
            ], 422);
        }

        // حساب النسبة
        $percentage = ($validated['score'] / $validated['total']) * 100;

        // حساب التقدير
        $grade = match (true) {
            $percentage >= 85 => 'A',
            $percentage >= 75 => 'B',
            $percentage >= 65 => 'C',
            $percentage >= 50 => 'D',
            default           => 'F',
        };

        $validated['percentage'] = $percentage;
        $validated['grade']      = $grade;

        $result->update($validated);

        return response()->json([
            "msg💌"    => "Result Updated Successfully 🎉",
            "status📌" => 200,
            "data🌍"   => new ResultResource($result->fresh()),
        ], 200);
    }

}
