<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = CategoryResource::collection(Category::all());

        return response()->json([
            "msg💌"    => "Return All Data 🔄",
            "status📌" => 200,
            "data🌍"   => $categories,
        ], 200);
    }

    public function show($id)
    {
        $category = Category::find($id);

        if (! $category) {
            return response()->json([
                "msg💌"    => "No Such ID ❌",
                "status📌" => 404,
                "data🌍"   => null,
            ], 404);
        }

        return response()->json([
            "msg💌"    => "Return One Category Successfully ✅",
            "status📌" => 200,
            "data🌍"   => new CategoryResource($category),
        ], 200);
    }

    public function destroy($id)
    {
        $category = Category::find($id);
 
        if (! $category) {
            return response()->json([
                "msg💌"    => "No Such ID ❌",
                "status📌" => 404,
                "data🌍"   => null,
            ], 404);
        }

        // حذف الصورة من Storage قبل حذف السجل
        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }

        $category->delete();

        return response()->json([
            "msg💌"    => "Category Deleted Successfully 🗑️",
            "status📌" => 200,
            "data🌍"   => null,
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title_ar'       => ['required', 'string', 'max:255'],
            'title_en'       => ['required', 'string', 'max:255'],
            'description_ar' => ['nullable', 'string'],
            'description_en' => ['nullable', 'string'],
            'image'          => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'status' => ['required', 'in:0,1'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                "msg💌"    => "Validation Required ❌",
                "status📌" => 422,
                "data🌍"   => $validator->errors(),
            ], 422);
        }

        $data = $validator->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('categories', 'public');
        }

        $category = Category::create($data);
        $category->refresh();

        return response()->json([
            "msg💌"    => "Category Created Successfully 🎉",
            "status📌" => 201,
            "data🌍"   => new CategoryResource($category),
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        if (! $category) {
            return response()->json([
                "msg💌"    => "No Such ID ❌",
                "status📌" => 404,
                "data🌍"   => null,
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'title_ar'       => ['required', 'string', 'max:255'],
            'title_en'       => ['required', 'string', 'max:255'],
            'description_ar' => ['nullable', 'string'],
            'description_en' => ['nullable', 'string'],
            'image'          => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'status' => ['required', 'in:0,1'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                "msg💌"    => "Validation Required ❌",
                "status📌" => 422,
                "data🌍"   => $validator->errors(),
            ], 422);
        }

        $validated = $validator->validated();

        if ($request->hasFile('image')) {

            // حذف الصورة القديمة
            if ($category->image) {
                Storage::disk('public')->delete($category->image);
            }

            // رفع الصورة الجديدة
            $validated['image'] = $request->file('image')->store('categories', 'public');
        }

        $category->update($validated);

        return response()->json([
            "msg💌"    => "Category Updated Successfully 🎉",
            "status📌" => 200,
            "data🌍"   => new CategoryResource($category->fresh()),
        ], 200);
    }
}
