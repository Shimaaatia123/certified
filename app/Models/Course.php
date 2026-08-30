<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    protected $fillable = [
    'id',
    'title_ar',
    'title_en',
    'description_ar',
    'description_en',
    'price',
    'image',
    'duration',
    'badge',
    'status',
];

    
    public function getTitleAttribute()
    {
        return app()->getLocale() === 'ar'
            ? $this->title_ar
            : $this->title_en;
    }

    
    public function getDescriptionAttribute()
    {
        return app()->getLocale() === 'ar'
            ? $this->description_ar
            : $this->description_en;
    }

    public function certificates(): HasMany
{
    return $this->hasMany(Certificate::class);
}

public function reviews()
{
    return $this->hasMany(Review::class);
}
}
