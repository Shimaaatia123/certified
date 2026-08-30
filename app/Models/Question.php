<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'id',
        'exam_id',
        'question_ar',
        'question_en',
        'mark',
        'type',
    ];

    // 👇 ترجمة السؤال حسب اللغة
    public function getQuestionAttribute()
    {
        return app()->getLocale() === 'ar'
            ? $this->question_ar
            : $this->question_en;
    }

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }
}
