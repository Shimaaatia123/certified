<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\LessonResource;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class LessonController extends Controller
{
    public function index()
    {
        $lessons = LessonResource::collection(Lesson::all());

        $data = [
            "msg💌"    => "Return All Data🔄",
            "status📌" => 200,
            "data🌍"   => $lessons,
        ];

        return response()->json($data);
    }

    public function show($id)
    {
        $lessons = Lesson::find($id);

        if ($lessons) {
            $data = [
                "msg💌"    => "Return One Of Point✅",
                "status📌" => 200,
                "data🌍"   => new LessonResource($lessons),
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
        $lessons = Lesson::find($id);

        if ($lessons) {
            $lessons->delete();

            $data = [
                "msg💌"    => "Lesson Deleted Successfully 🗑️",
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
            'course_id'  => ['required', 'exists:courses,id'],
            'title_ar'   => ['required', 'string', 'min:3'],
            'title_en'   => ['required', 'string', 'min:3'],
            'content_ar' => ['required'],
            'content_en' => ['required'],
            'video_url'  => ['nullable', 'url'],
            'status'     => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                "msg💌"    => "Validation Required ❌",
                "status📌" => 422,
                "data🌍"   => $validator->errors(),
            ]);
        }

        $data = $validator->validated();

        $lastOrder = Lesson::where('course_id', $data['course_id'])->max('order');

        $data['order'] = $lastOrder ? $lastOrder + 1 : 1;

        if (! empty($data['video_url'])) {
            $isYoutube = Str::contains($data['video_url'], 'youtube.com') ||
            Str::contains($data['video_url'], 'youtu.be');

            if (! $isYoutube && ! filter_var($data['video_url'], FILTER_VALIDATE_URL)) {
                return response()->json([
                    "msg💌"    => "Invalid video URL ❌",
                    "status📌" => 422,
                    "data🌍"   => null,
                ]);
            }
        }

        $lesson = Lesson::create($data);

        return response()->json([
            "msg💌"    => "Lesson Created Successfully 🎉",
            "status📌" => 200,
            "data🌍"   => new LessonResource($lesson),
        ]);
    }

    public function update(Request $request, $id)
    {
        $lesson = Lesson::find($id);

        if (! $lesson) {
            return response()->json([
                "msg💌"    => "No Such ID ❌",
                "status📌" => 404,
                "data🌍"   => null,
            ]);
        }

        $validator = Validator::make($request->all(), [
            'course_id'  => ['sometimes', 'required', 'exists:courses,id'],
            'title_ar'   => ['sometimes', 'required', 'string', 'min:3'],
            'title_en'   => ['sometimes', 'required', 'string', 'min:3'],
            'content_ar' => ['sometimes', 'required'],
            'content_en' => ['sometimes', 'required'],
            'video_url'  => ['sometimes', 'nullable', 'url'],
            'status'     => ['sometimes', 'required'],
            'order'      => ['sometimes', 'required', 'integer', 'min:1'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                "msg💌"    => "Validation Required ❌",
                "status📌" => 422,
                "data🌍"   => $validator->errors(),
            ]);
        }

        $data = $validator->validated();

        if (! empty($data['video_url'])) {
            $isYoutube = Str::contains($data['video_url'], 'youtube.com') ||
            Str::contains($data['video_url'], 'youtu.be');

            if (! $isYoutube && ! filter_var($data['video_url'], FILTER_VALIDATE_URL)) {
                return response()->json([
                    "msg💌"    => "Invalid video URL ❌",
                    "status📌" => 422,
                    "data🌍"   => null,
                ]);
            }
        }

        if (isset($data['course_id']) && $data['course_id'] != $lesson->course_id && ! isset($data['order'])) {
            $lastOrder     = Lesson::where('course_id', $data['course_id'])->max('order');
            $data['order'] = $lastOrder ? $lastOrder + 1 : 1;
        }

        $lesson->update($data);

        return response()->json([
            "msg💌"    => "Lesson Updated Successfully 🎉",
            "status📌" => 200,
            "data🌍"   => new LessonResource($lesson),
        ]);
    }
}
