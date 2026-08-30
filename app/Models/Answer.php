<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'id',
        'question_id',
        'answer_ar',
        'answer_en',
        'is_correct',
    ];

    // 👇  answer يتغير حسب اللغة
    public function getAnswerAttribute()
    {
        return app()->getLocale() === 'ar'
            ? $this->answer_ar
            : $this->answer_en;
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
