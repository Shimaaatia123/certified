<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReviewResource;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = ReviewResource::collection(Review::all());

        $data = [
            "msg💌"    => "Return All Data🔄",
            "status📌" => 200,
            "data🌍"   => $reviews,
        ];

        return response()->json($data);
    }

    public function show($id)
    {
        $reviews = Review::find($id);

        if ($reviews) {
            $data = [
                "msg💌"    => "Return One Of Point✅",
                "status📌" => 200,
                "data🌍"   => new ReviewResource($reviews),
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
        $reviews = Review::find($id);

        if ($reviews) {
            $reviews->delete();

            $data = [
                "msg💌"    => "Review Deleted Successfully 🗑️",
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
            'rating'    => ['required', 'numeric', 'min:1', 'max:5'],
            'comment'   => ['required', 'string', 'min:3'],
            'status'    => ['required', 'in:0,1'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                "msg💌"    => "Validation Required ❌",
                "status📌" => 422,
                "data🌍"   => $validator->errors(),
            ]);
        }

        $data = $validator->validated();

        $exists = Review::where('user_id', $data['user_id'])
            ->where('course_id', $data['course_id'])
            ->exists();

        if ($exists) {
            return response()->json([
                "msg💌"    => "Validation Error ❌",
                "status📌" => 422,
                "data🌍"   => [
                    "review" => "This user already reviewed this course",
                ],
            ]);
        }

        $review = Review::create($data);

        return response()->json([
            "msg💌"    => "Review Created Successfully 🎉",
            "status📌" => 200,
            "data🌍"   => new ReviewResource($review),
        ]);
    }

    public function update(Request $request, $id)
    {
        $review = Review::find($id);

        if (! $review) {
            return response()->json([
                "msg💌"    => "No Such ID ❌",
                "status📌" => 404,
                "data🌍"   => null,
            ]);
        }

        $validator = Validator::make($request->all(), [
            'user_id'   => ['sometimes', 'required', 'exists:users,id'],
            'course_id' => ['sometimes', 'required', 'exists:courses,id'],
            'rating'    => ['sometimes', 'required', 'numeric', 'min:1', 'max:5'],
            'comment'   => ['sometimes', 'required', 'string', 'min:3'],
            'status'    => ['sometimes', 'required', 'in:0,1'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                "msg💌"    => "Validation Required ❌",
                "status📌" => 422,
                "data🌍"   => $validator->errors(),
            ]);
        }

        $data = $validator->validated();

        $userId   = $data['user_id'] ?? $review->user_id;
        $courseId = $data['course_id'] ?? $review->course_id;

        $exists = Review::where('user_id', $userId)
            ->where('course_id', $courseId)
            ->where('id', '!=', $review->id)
            ->exists();

        if ($exists) {
            return response()->json([
                "msg💌"    => "Validation Error ❌",
                "status📌" => 422,
                "data🌍"   => [
                    "review" => "This user already reviewed this course",
                ],
            ]);
        }

        $review->update($data);

        return response()->json([
            "msg💌"    => "Review Updated Successfully 🎉",
            "status📌" => 200,
            "data🌍"   => new ReviewResource($review),
        ]);
    }
}
