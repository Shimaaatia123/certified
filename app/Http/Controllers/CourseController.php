<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view("Course", ['course' => $courses]);
    }

public function page()
{
    $courses = Course::latest()->get();

    return view('pages.courses', compact('courses'));
}

    public function show($id)
    {
        $courses = Course::findOrFail($id);
        return view("Course.show", ["course" => $courses]);
    }

    public function delete($id)
    {
        $course = Course::findOrFail($id);

        // ✨ حذف الصورة من Storage
        if ($course->image) {
            Storage::disk('public')->delete($course->image);
        }

        // ✨ حذف الكورس من قاعدة البيانات
        $course->delete();

        return redirect()->route("admin.home")
            ->with("courses_message", "Course Deleted Successfully✨");
    }

    public function create()
    {
        return view("Course.create");
    }

    public function store(Request $request)
    {
        $request->validate([

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

        $imageName = null;

        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->store('courses', 'public');
        }

        Course::create([

            'id'             => $request->id,
            'title_ar'       => $request->title_ar,
            'title_en'       => $request->title_en,
            'description_ar' => $request->description_ar,
            'description_en' => $request->description_en,
            'price'          => $request->price,
            'image'          => $imageName,
            'status'         => $request->status,
            'duration'       => $request->duration,
            'badge'          => $request->badge,

        ]);

        return redirect()->route("admin.home")
            ->with("courses_message", "Course Added Successfully 🎉");
    }

    public function edit($id)
    {
        $courses = Course::findOrFail($id);
        return view("Course.edit", ["course" => $courses]);
    }

    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);

        $request->validate([

            'title_ar'       => ['required', 'string', 'max:255'],
            'title_en'       => ['required', 'string', 'max:255'],
            'description_ar' => ['required', 'string'],
            'description_en' => ['required', 'string'],
            'price'          => ['required', 'numeric', 'min:0'],
            'image'          => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'status'         => ['required'],
            'duration'       => ['required', 'string', 'max:50'],
            'badge'          => ['required', 'string', 'max:100'],
        ]);

        // الصورة الحالية
        $imageName = $course->image;

        // رفع صورة جديدة إن وجدت
        if ($request->hasFile('image')) {

            // حذف الصورة القديمة
            if (
                $course->image &&
                file_exists(storage_path('app/public/' . $course->image))
            ) {
                unlink(storage_path('app/public/' . $course->image));
            }

            $imageName = $request->file('image')->store('courses', 'public');
        }

        $course->update([

            'title_ar'       => $request->title_ar,
            'title_en'       => $request->title_en,
            'description_ar' => $request->description_ar,
            'description_en' => $request->description_en,
            'price'          => $request->price,
            'image'          => $imageName,
            'status'         => $request->status,
            'duration'       => $request->duration,
            'badge'          => $request->badge,

        ]);

        return redirect()->route("admin.home")
            ->with('courses_message', 'Course Updated Successfully ✨');
    }
}
