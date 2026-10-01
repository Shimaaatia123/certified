<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LessonController extends Controller
{
    public function index()
    {
        $lessons = Lesson::all();
        return view('Lesson', ["lesson" => $lessons]);
    }

    public function show($id)
    {
        $lessons = Lesson::findOrFail($id);
        return view("Lesson.show", ["lesson" => $lessons]);
    }

    public function delete($id)
    {
        $lesson = Lesson::findOrFail($id);

        $courseId = $lesson->course_id;

        // 1️⃣ حذف الدرس
        $lesson->delete();

        // 2️⃣ 🔥 إعادة ترتيب الدروس بعد الحذف
        $lessons = Lesson::where('course_id', $courseId)
            ->orderBy('order')
            ->get();

        $i = 1;

        foreach ($lessons as $item) {
            $item->order = $i;
            $item->save();
            $i++;
        }

        return redirect()->route("admin.dashboard")
            ->with("lessons_message", "Lesson Deleted and Reordered Successfully✨");
    }

    public function create()
    {
        return view("Lesson.create");
    }

    public function store(Request $request)
    {
        // 1️⃣ Validation
        $request->validate([
            
            'course_id'  => ['required', 'exists:courses,id'],
            'title_ar'   => ['required', 'string', 'min:3'],
            'title_en'   => ['required', 'string', 'min:3'],
            'content_ar' => ['required'],
            'content_en' => ['required'],
            'video_url'  => ['nullable', 'url'],
            'status'     => ['required'],
        ]);

        // 2️⃣ 🔥 Auto Order
        $lastOrder = Lesson::where('course_id', $request->course_id)
            ->max('order');

        $order = $lastOrder ? $lastOrder + 1 : 1;

        // 3️⃣ 🔥 Video validation (YouTube or URL)
        if ($request->video_url) {

            $isYoutube =
            Str::contains($request->video_url, 'youtube.com') ||
            Str::contains($request->video_url, 'youtu.be');

            if (! $isYoutube && ! filter_var($request->video_url, FILTER_VALIDATE_URL)) {
                return back()->withErrors([
                    'video_url' => 'Invalid video URL',
                ]);
            }
        }

        // 4️⃣ Save
        Lesson::create([
            
            "course_id"  => $request->course_id,
            "title_ar"   => $request->title_ar,
            "title_en"   => $request->title_en,
            "content_ar" => $request->content_ar,
            "content_en" => $request->content_en,
            "video_url"  => $request->video_url,
            "order"      => $order,
            "status"     => $request->status,
        ]);

        return redirect()->route("admin.dashboard")
            ->with("lessons_message", "Lesson Added Successfully 🎉");
    }

    public function edit($id)
    {
        $lessons = Lesson::findOrFail($id);
        return view("Lesson.edit", ["lesson" => $lessons]);
    }

    public function update(Request $request, $id)
    {

        $lesson = Lesson::findOrFail($id);

        // 1️⃣ Validation
        $request->validate([
            
            'course_id'  => ['required', 'exists:courses,id'],
            'title_ar'   => ['required', 'string', 'min:3'],
            'title_en'   => ['required', 'string', 'min:3'],
            'content_ar' => ['required'],
            'content_en' => ['required'],
            'video_url'  => ['nullable', 'url'],
            'status'     => ['required'],
            'order'      => ['required', 'integer', 'min:1'],
        ]);

        // 2️⃣ Video validation (YouTube or URL)
        if ($request->video_url) {

            $isYoutube =
            Str::contains($request->video_url, 'youtube.com') ||
            Str::contains($request->video_url, 'youtu.be');

            if (! $isYoutube && ! filter_var($request->video_url, FILTER_VALIDATE_URL)) {
                return back()->withErrors([
                    'video_url' => 'Invalid video URL',
                ]);
            }
        }

        // 3️⃣ تحديث البيانات
        $data = [
            
            "course_id"  => $request->course_id,
            "title_ar"   => $request->title_ar,
            "title_en"   => $request->title_en,
            "content_ar" => $request->content_ar,
            "content_en" => $request->content_en,
            "video_url"  => $request->video_url,
            "status"     => $request->status,
        ];

        $oldOrder = $lesson->order;
        $newOrder = $request->order;

        // 4️⃣ لو الـ order اتغير → نعيد ترتيب الدروس
        if ($oldOrder != $newOrder) {

            // لو نازل
            if ($newOrder > $oldOrder) {
                Lesson::where('course_id', $lesson->course_id)
                    ->whereBetween('order', [$oldOrder + 1, $newOrder])
                    ->decrement('order');
            }

            // لو طالع
            if ($newOrder < $oldOrder) {
                Lesson::where('course_id', $lesson->course_id)
                    ->whereBetween('order', [$newOrder, $oldOrder - 1])
                    ->increment('order');
            }

            $data['order'] = $newOrder;
        }

        // 5️⃣ Update
        $lesson->update($data);

        return redirect()->route("admin.dashboard")
            ->with("lessons_message", "Lesson Updated Successfully ✨");
    }
}
