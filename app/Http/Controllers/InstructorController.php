<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InstructorController extends Controller
{

    public function index()
    {
        $instructors = Instructor::all();
        return view('Instructor', ["instructor" => $instructors]);
    }

    public function show($id)
    {
        $instructors = Instructor::findOrFail($id);
        return view("Instructor.show", ["instructor" => $instructors]);
    }

    public function delete($id)
    {
        $instructor = Instructor::findOrFail($id);

        // ✨ حذف الصورة من storage
        if ($instructor->image) {
            Storage::disk('public')->delete($instructor->image);
        }

        // ✨ حذف الـ instructor من قاعدة البيانات
        $instructor->delete();

        return redirect()->route("admin.home")
            ->with("instructors_message", "Instructor Deleted Successfully ✨");
    }

    public function create()
    {
        return view("Instructor.create");
    }

    public function store(Request $request)
    {
        $request->validate([

            'id'     => ['required', 'unique:instructors,id'],

            'name'   => ['required', 'string', 'min:3', 'max:255'],

            'email'  => ['required', 'email', 'unique:instructors,email'],

            'bio'    => ['required', 'string'],

            'phone'  => ['required', 'string', 'min:11', 'max:20'],

            'image'  => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],

            'status' => ['required'],
        ]);

        // ===== IMAGE STORAGE =====
        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('instructors', 'public');
        }

        Instructor::create([

            'id'     => $request->id,
            'name'   => $request->name,
            'email'  => $request->email,
            'bio'    => $request->bio,
            'phone'  => $request->phone,
            'image'  => $imagePath,
            'status' => $request->status,

        ]);

        return redirect()->route("admin.home")
            ->with("instructors_message", "Instructor Added Successfully 🎉");
    }

    public function edit($id)
    {
        $instructors = Instructor::findOrFail($id);
        return view("Instructor.edit", ["instructor" => $instructors]);
    }

    public function update(Request $request, $id)
    {
        $instructor = Instructor::findOrFail($id);

        $request->validate([

            'name'   => ['required', 'string', 'min:3', 'max:255'],

            'email'  => ['required', 'email', 'unique:instructors,email,' . $id],

            'bio'    => ['required', 'string'],

            'phone'  => ['required', 'string', 'min:11', 'max:20'],

            'image'  => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],

            'status' => ['required'],

        ]);

                                         // ===== IMAGE UPDATE =====
        $imagePath = $instructor->image; // الصورة القديمة

        if ($request->hasFile('image')) {

            // حذف الصورة القديمة لو موجودة
            if ($imagePath && file_exists(storage_path('app/public/' . $imagePath))) {
                unlink(storage_path('app/public/' . $imagePath));
            }

            // رفع الصورة الجديدة
            $imagePath = $request->file('image')->store('instructors', 'public');
        }

        // ===== UPDATE DATA =====
        $instructor->update([

            'name'   => $request->name,
            'email'  => $request->email,
            'bio'    => $request->bio,
            'phone'  => $request->phone,
            'image'  => $imagePath,
            'status' => $request->status,

        ]);

        return redirect()->route("admin.home")
            ->with("instructors_message", "Instructor Updated Successfully ✨");
    }

}
