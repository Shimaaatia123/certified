<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function index()
    {
        $enrollments = Enrollment::all();

        return view('Enrollment', ["enrollment" => $enrollments]);
    }

    public function show($id)
    {
        $enrollments = Enrollment::findOrFail($id);

        return view("Enrollment.show", ["enrollment" => $enrollments]);
    }

    public function delete($id)
    {
        $enrollments = Enrollment::findOrFail($id);

        $enrollments->delete();

        return redirect()->route("home")
            ->with("enrollments_message", "Enrollment Deleted Successfully✨");
    }

    public function create()
    {
        return view("Enrollment.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id'   => ['required', 'exists:users,id'],
            'course_id' => ['required', 'exists:courses,id'],
            'status'    => ['required', 'in:pending,active,completed'],
        ]);

        Enrollment::firstOrCreate(
            [
                'user_id'   => $request->user_id,
                'course_id' => $request->course_id,
            ],
            [
                'enrollment_date' => now(),
                'status'          => $request->status,
            ]
        );

        return redirect()->route("home")
            ->with("enrollments_message", "Enrollment Added Successfully 🎉");
    }

    public function edit($id)
    {
        $enrollments = Enrollment::findOrFail($id);

        return view("Enrollment.edit", ["enrollment" => $enrollments]);
    }

    public function update(Request $request, $id)
    {
        $enrollment = Enrollment::findOrFail($id);

        $request->validate([
            'user_id'   => ['required', 'exists:users,id'],
            'course_id' => ['required', 'exists:courses,id'],
            'status'    => ['required', 'in:pending,active,completed'],
        ]);

        $exists = Enrollment::where('user_id', $request->user_id)
            ->where('course_id', $request->course_id)
            ->where('id', '!=', $id)
            ->exists();

        if ($exists) {
            return back()->withErrors([
                'course_id' => 'This user is already enrolled in this course.',
            ])->withInput();
        }

        $enrollment->update([
            'user_id'   => $request->user_id,
            'course_id' => $request->course_id,
            'status'    => $request->status,
        ]);

        return redirect()->route("home")
            ->with("enrollments_message", "Enrollment Updated Successfully ✨");
    }
}