<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
        'id',
        'course_id',
        'title_ar',
        'title_en',
        'content_ar',
        'content_en',
        'video_url',
        'order',
        'status',
    ];

    // 👇 عنوان الدرس حسب اللغة
    public function getTitleAttribute()
    {
        return app()->getLocale() === 'ar'
            ? $this->title_ar
            : $this->title_en;
    }

    // 👇 محتوى الدرس حسب اللغة
    public function getContentAttribute()
    {
        return app()->getLocale() === 'ar'
            ? $this->content_ar
            : $this->content_en;
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
