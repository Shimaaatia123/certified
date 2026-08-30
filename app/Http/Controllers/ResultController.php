<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Result;
use Illuminate\Http\Request;

class ResultController extends Controller
{

    public function index()
    {
        $results = Result::all();
        return view('Result', ["result" => $results]);
    }

    public function show($id)
    {
        $results = Result::findOrFail($id);
        return view("Result.show", ["result" => $results]);
    }

    public function delete($id)
    {
        $results = Result::findOrFail($id);
        $results->delete();
        return redirect()->route("home")->with("results_message", "Result Deleted Successfully✨");
    }

    public function create()
    {
        return view("Result.create");
    }

    public function store(Request $request)
    {
        $request->validate([

            'user_id' => ['required', 'exists:users,id'],
            'exam_id' => ['required', 'exists:exams,id'],
            'score'   => ['required', 'numeric', 'min:0'],
            'total'   => ['required', 'numeric', 'min:1'],
            'status'  => ['required'],
        ]);

        if ($request->score > $request->total) {
            return back()->withErrors([
                'score' => 'Score cannot be greater than total marks',
            ]);
        }

        $percentage = ($request->score / $request->total) * 100;

        $grade = match (true) {
            $percentage >= 85 => 'A',
            $percentage >= 75 => 'B',
            $percentage >= 65 => 'C',
            $percentage >= 50 => 'D',
            default           => 'F',
        };

        Result::create([

            "user_id"    => $request->user_id,
            "exam_id"    => $request->exam_id,
            "score"      => $request->score,
            "total"      => $request->total,
            "status"     => $request->status,
            "percentage" => $percentage,
            "grade"      => $grade,
        ]);

        return redirect()->route("home")
            ->with("results_message", "Result Added Successfully 🎉");
    }

    public function edit($id)
    {
        $results = Result::findOrFail($id);
        return view("Result.edit", ["result" => $results]);
    }

    public function update(Request $request, $id)
    {
        // 1. جلب النتيجة
        $result = Result::findOrFail($id);

        // 2. Validation
        $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'exam_id' => ['required', 'exists:exams,id'],
            'score'   => ['required', 'numeric', 'min:0'],
            'total'   => ['required', 'numeric', 'min:1'],
        ]);

        // 3. منطق التحقق
        if ($request->score > $request->total) {
            return back()->withErrors([
                'score' => 'Score cannot be greater than total marks',
            ])->withInput();
        }

        // 4. حساب النسبة
        $percentage = ($request->score / $request->total) * 100;

        // 5. تحديد الحالة تلقائي
        $status = $request->score >= 50 ? 'pass' : 'fail';

        // 6. تحديد التقدير
        $grade = match (true) {
            $percentage >= 85 => 'A',
            $percentage >= 75 => 'B',
            $percentage >= 65 => 'C',
            $percentage >= 50 => 'D',
            default           => 'F',
        };

        // 7. تجهيز البيانات
        $data = [
            'user_id'    => $request->user_id,
            'exam_id'    => $request->exam_id,
            'score'      => $request->score,
            'total'      => $request->total,
            'status'     => $status,
            'percentage' => $percentage,
            'grade'      => $grade,
        ];

        // 8. تحديث
        $result->update($data);

        // 9. رجوع
        return redirect()->route('home')
            ->with('results_message', 'Result Updated Successfully ✨');
    }
}
