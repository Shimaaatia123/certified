<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = [
        
        'course_id',
        'title_ar',
        'title_en',
        'total_marks',
        'pass_marks',
        'duration',
        'status',
    ];

    // 👇 الترجمة التلقائية للعنوان
    public function getTitleAttribute()
    {
        return app()->getLocale() === 'ar'
            ? $this->title_ar
            : $this->title_en;
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
