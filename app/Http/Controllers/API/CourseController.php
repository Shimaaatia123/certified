<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CourseController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->query('search');
        $filter = $request->query('filter');

        $query = Course::query();

        /*
    |--------------------------------------------------------------------------
    | SEARCH
    |--------------------------------------------------------------------------
    */

        if ($search) {

            $searchTerms = [$search];

            // Support Arabic word with attached "ل"
            if (mb_substr($search, 0, 1) === 'ا') {
                $searchTerms[] = 'ل' . mb_substr($search, 1);
            }

            $query->where(function ($q) use ($searchTerms) {

                foreach ($searchTerms as $term) {

                    $q->orWhere('title_ar', 'like', '%' . $term . '%')
                        ->orWhere('title_en', 'like', '%' . $term . '%')
                        ->orWhere('description_ar', 'like', '%' . $term . '%')
                        ->orWhere('description_en', 'like', '%' . $term . '%');
                }

            });
        }

        /*
    |--------------------------------------------------------------------------
    | FILTER
    |--------------------------------------------------------------------------
    */

        if ($filter === 'popular') {

            $query->where('badge', 'Popular');

        } elseif ($filter === 'free') {

            $query->where('price', 0);
        } elseif ($filter === 'new') {

            $query->latest('created_at')->limit(3);
        }

        /*
    |--------------------------------------------------------------------------
    | GET COURSES
    |--------------------------------------------------------------------------
    */

        $courses = CourseResource::collection($query->get());

        $data = [
            "msg💌"    => $search
                ? "Search Results 🔎"
                : ($filter ? "Filter Results 🎯" : "Return All Data🔄"),

            "status📌" => 200,

            "data🌍"   => $courses,
        ];

        return response()->json($data);
    }

    public function show($id)
    {
        $courses = Course::find($id);

        if ($courses) {
            $data = [
                "msg💌"    => "Return One Of Point✅",
                "status📌" => 200,
                "data🌍"   => new CourseResource($courses),
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
        $courses = Course::find($id);

        if ($courses) {
            if ($courses->image) {
                Storage::disk('public')->delete($courses->image);
            }

            $courses->delete();

            $data = [
                "msg💌"    => "Course Deleted Successfully 🗑️",
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
            'id'             => ['required', 'unique:courses,id'],
            'title_ar'       => ['required', 'string', 'max:255'],
            'title_en'       => ['required', 'string', 'max:255'],
            'description_ar' => ['required', 'string'],
            'description_en' => ['required', 'string'],
            'price'          => ['required', 'numeric', 'min:0'],
            'image'          => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'status'         => ['required'],
            'duration'       => ['required', 'string', 'max:50'],
            'badge'          => ['required', 'string', 'max:100'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                "msg💌"    => "Validation Required ❌",
                "status📌" => 422,
                "data🌍"   => $validator->errors(),
            ]);
        }

        $data = $validator->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('courses', 'public');
        }

        $course = Course::create($data);

        return response()->json([
            "msg💌"    => "Course Created Successfully 🎉",
            "status📌" => 200,
            "data🌍"   => new CourseResource($course),
        ]);
    }

    public function update(Request $request, $id)
    {
        $course = Course::find($id);

        if (! $course) {
            return response()->json([
                "msg💌"    => "No Such ID ❌",
                "status📌" => 404,
                "data🌍"   => null,
            ]);
        }

        $validator = Validator::make($request->all(), [
            'id'             => ['sometimes', 'required', Rule::unique('courses', 'id')->ignore($course->id)],
            'title_ar'       => ['sometimes', 'required', 'string', 'max:255'],
            'title_en'       => ['sometimes', 'required', 'string', 'max:255'],
            'description_ar' => ['sometimes', 'required', 'string'],
            'description_en' => ['sometimes', 'required', 'string'],
            'price'          => ['sometimes', 'required', 'numeric', 'min:0'],
            'image'          => ['sometimes', 'nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'status'         => ['sometimes', 'required'],
            'duration'       => ['sometimes', 'required', 'string', 'max:50'],
            'badge'          => ['sometimes', 'required', 'string', 'max:100'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                "msg💌"    => "Validation Required ❌",
                "status📌" => 422,
                "data🌍"   => $validator->errors(),
            ]);
        }

        $data = $validator->validated();

        if ($request->hasFile('image')) {
            if ($course->image) {
                Storage::disk('public')->delete($course->image);
            }

            $data['image'] = $request->file('image')->store('courses', 'public');
        }

        $course->update($data);

        return response()->json([
            "msg💌"    => "Course Updated Successfully 🎉",
            "status📌" => 200,
            "data🌍"   => new CourseResource($course),
        ]);
    }
}
