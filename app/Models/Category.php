<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'id',
        'title_ar',
        'title_en',
        'description_ar',
        'description_en',
        'image',
        'status',
    ];

       protected $casts = [
        'status' => 'integer',
    ];

    // 👇 الترجمة التلقائية للعنوان
    public function getTitleAttribute()
    {
        return app()->getLocale() === 'ar'
            ? $this->title_ar
            : $this->title_en;
    }

    // 👇 (اختياري) ترجمة الوصف كمان
    public function getDescriptionAttribute()
    {
        return app()->getLocale() === 'ar'
            ? $this->description_ar
            : $this->description_en;
    }
}
