<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all();
        return view('Review', ["review" => $reviews]);
    }

    public function show($id)
    {
        $reviews = Review::findOrFail($id);
        return view("Review.show", ["review" => $reviews]);
    }

    public function delete($id)
    {
        $reviews = Review::findOrFail($id);
        $reviews->delete();
        return redirect()->route("admin.home")->with("reviews_message", "Review Deleted Successfully✨");
    }

    public function create()
    {
        return view("Review.create");
    }

    public function store(Request $request)
    {
        $request->validate([

            'user_id'   => ['required', 'exists:users,id'],

            'course_id' => ['required', 'exists:courses,id'],

            'rating'    => ['required', 'numeric', 'min:1', 'max:5'],

            'comment'   => ['required', 'string', 'min:3'],

            'status'    => ['required'],

        ]);

        Review::create([

            "user_id"   => $request->user_id,
            "course_id" => $request->course_id,
            "rating"    => $request->rating,
            "comment"   => $request->comment,
            "status"    => $request->status,
        ]);

        return redirect()->route("admin.home")->with("reviews_message", "Review Added Successfully 🎉");
    }

    public function edit($id)
    {
        $reviews = Review::findOrFail($id);
        return view("Review.edit", ["review" => $reviews]);
    }

    public function update(Request $request, $id)
    {
        // 1. جلب الريفيو الحالي
        $review = Review::findOrFail($id);

        // 2. Validation احترافية
        $request->validate([

            'user_id'   => [
                'required',
                'exists:users,id',
            ],

            'course_id' => [
                'required',
                'exists:courses,id',
            ],

            'rating'    => [
                'required',
                'integer',
                'min:1',
                'max:5',
            ],

            'comment'   => [
                'nullable',
                'string',
                'min:3',
            ],

            'status'    => [
                'required',
                Rule::in([0, 1]),
            ],
        ]);

        // 3. تجهيز الداتا
        $data = [

            'user_id'   => $request->user_id,
            'course_id' => $request->course_id,
            'rating'    => $request->rating,
            'comment'   => $request->comment,
            'status'    => $request->status,
        ];

        // 4. تحديث
        $review->update($data);

        // 5. Redirect
        return redirect()->route('admin.home')
            ->with('reviews_message', 'Review Updated Successfully ✨');
    }
}
