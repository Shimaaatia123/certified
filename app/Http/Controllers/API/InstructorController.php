<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\InstructorResource;
use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class InstructorController extends Controller
{
    public function index()
    {
        $instructors = InstructorResource::collection(Instructor::all());

        $data = [
            "msg💌"    => "Return All Data🔄",
            "status📌" => 200,
            "data🌍"   => $instructors,
        ];

        return response()->json($data);
    }

    public function show($id)
    {
        $instructors = Instructor::find($id);

        if ($instructors) {
            $data = [
                "msg💌"    => "Return One Of Point✅",
                "status📌" => 200,
                "data🌍"   => new InstructorResource($instructors),
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
        $instructors = Instructor::find($id);

        if ($instructors) {
            if ($instructors->image) {
                Storage::disk('public')->delete($instructors->image);
            }

            $instructors->delete();

            $data = [
                "msg💌"    => "Instructor Deleted Successfully 🗑️",
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
            'name'   => ['required', 'string', 'min:3', 'max:255'],
            'email'  => ['required', 'email', 'unique:instructors,email'],
            'bio'    => ['required', 'string'],
            'phone'  => ['required', 'string', 'min:11', 'max:20'],
            'image'  => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'status' => ['required'],
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
            $data['image'] = $request->file('image')->store('instructors', 'public');
        }

        $instructor = Instructor::create($data);

        return response()->json([
            "msg💌"    => "Instructor Created Successfully 🎉",
            "status📌" => 200,
            "data🌍"   => new InstructorResource($instructor),
        ]);
    }

    public function update(Request $request, $id)
    {
        $instructor = Instructor::find($id);

        if (!$instructor) {
            return response()->json([
                "msg💌"    => "No Such ID ❌",
                "status📌" => 404,
                "data🌍"   => null,
            ]);
        }

        $validator = Validator::make($request->all(), [
            'name'   => ['sometimes', 'required', 'string', 'min:3', 'max:255'],
            'email'  => [
                'sometimes',
                'required',
                'email',
                Rule::unique('instructors', 'email')->ignore($instructor->id),
            ],
            'bio'    => ['sometimes', 'required', 'string'],
            'phone'  => ['sometimes', 'required', 'string', 'min:11', 'max:20'],
            'image'  => ['sometimes', 'nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'status' => ['sometimes', 'required'],
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
            if ($instructor->image) {
                Storage::disk('public')->delete($instructor->image);
            }

            $data['image'] = $request->file('image')->store('instructors', 'public');
        }

        $instructor->update($data);

        return response()->json([
            "msg💌"    => "Instructor Updated Successfully 🎉",
            "status📌" => 200,
            "data🌍"   => new InstructorResource($instructor),
        ]);
    }
}