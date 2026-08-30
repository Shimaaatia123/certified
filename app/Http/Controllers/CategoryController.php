<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('Category', ["category" => $categories]);
    }

    public function show($id)
    {
        $categories = Category::findOrFail($id);
        return view("Category.show", ["category" => $categories]);
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);

        // ✨ حذف الصورة من Storage
        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }

        // ✨ حذف القسم من قاعدة البيانات
        $category->delete();

        return redirect()->route("home")
            ->with("categories_message", "Category Deleted Successfully✨");
    }

    public function create()
    {
        return view("Category.create");
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title_ar'       => 'required|string|max:255',
            'title_en'       => 'required|string|max:255',
            'description_ar' => 'nullable|string',
            'description_en' => 'nullable|string',
            'image'          => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('categories', 'public');
        }

        $data['status'] = 1; // افتراضي Active

        Category::create($data);

        return redirect()->route('home')
            ->with('categories_message', 'Category Created Successfully 🎉');
    }

    public function edit($id)
    {
        $categories = Category::findOrFail($id);
        return view("Category.edit", ["category" => $categories]);
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $data = $request->validate([

            'title_ar'       => 'required|string|max:255',
            'title_en'       => 'required|string|max:255',
            'description_ar' => 'nullable|string',
            'description_en' => 'nullable|string',
            'image'          => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status'         => 'required|in:0,1',

        ]);

        // تحديث الصورة إن وجدت
        if ($request->hasFile('image')) {

            // حذف الصورة القديمة
            if (
                $category->image &&
                file_exists(storage_path('app/public/' . $category->image))
            ) {
                unlink(storage_path('app/public/' . $category->image));
            }

            $data['image'] = $request->file('image')->store('categories', 'public');
        }

        $category->update($data);

        return redirect()->route('home')
            ->with('categories_message', 'Category Updated Successfully ✨');
    }
}
