<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\EnrollmentResource;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EnrollmentController extends Controller
{
    public function index()
    {
        $enrollments = EnrollmentResource::collection(Enrollment::all());

        $data = [
            "msg💌"    => "Return All Data🔄",
            "status📌" => 200,
            "data🌍"   => $enrollments,
        ];

        return response()->json($data);
    }

    public function show($id)
    {
        $enrollments = Enrollment::find($id);

        if ($enrollments) {
            $data = [
                "msg💌"    => "Return One Of Point✅",
                "status📌" => 200,
                "data🌍"   => new EnrollmentResource($enrollments),
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
        $enrollments = Enrollment::find($id);

        if ($enrollments) {
            $enrollments->delete();

            $data = [
                "msg💌"    => "Enrollments Deleted Successfully 🗑️",
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
            'user_id'   => ['required', 'exists:users,id'],
            'course_id' => ['required', 'exists:courses,id'],
            'status'    => ['required', 'in:pending,active,completed'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                "msg💌"    => "Validation Required ❌",
                "status📌" => 422,
                "data🌍"   => $validator->errors(),
            ]);
        }

        $data = $validator->validated();

        $enrollment = Enrollment::firstOrCreate(
            [
                'user_id'   => $data['user_id'],
                'course_id' => $data['course_id'],
            ],
            [
                'enrollment_date' => now(),
                'status'          => $data['status'],
            ]
        );

        return response()->json([
            "msg💌"    => "Enrollment Created Successfully 🎉",
            "status📌" => 200,
            "data🌍"   => new EnrollmentResource($enrollment),
        ]);
    }

    public function update(Request $request, $id)
    {
        $enrollment = Enrollment::find($id);

        if (! $enrollment) {
            return response()->json([
                "msg💌"    => "No Such ID ❌",
                "status📌" => 404,
                "data🌍"   => null,
            ]);
        }

        $validator = Validator::make($request->all(), [
            'user_id'   => ['sometimes', 'required', 'exists:users,id'],
            'course_id' => ['sometimes', 'required', 'exists:courses,id'],
            'status'    => ['sometimes', 'required', 'in:pending,active,completed'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                "msg💌"    => "Validation Required ❌",
                "status📌" => 422,
                "data🌍"   => $validator->errors(),
            ]);
        }

        $data = $validator->validated();

        $userId   = $data['user_id'] ?? $enrollment->user_id;
        $courseId = $data['course_id'] ?? $enrollment->course_id;

        $exists = Enrollment::where('user_id', $userId)
            ->where('course_id', $courseId)
            ->where('id', '!=', $enrollment->id)
            ->exists();

        if ($exists) {
            return response()->json([
                "msg💌"    => "Validation Error ❌",
                "status📌" => 422,
                "data🌍"   => [
                    "enrollment" => "This user is already enrolled in this course",
                ],
            ]);
        }

        $enrollment->update($data);

        return response()->json([
            "msg💌"    => "Enrollment Updated Successfully 🎉",
            "status📌" => 200,
            "data🌍"   => new EnrollmentResource($enrollment),
        ]);
    }
}
