<?php
namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'Identity💎'       => $this->id,
            'Title_Ar🏷️'      => $this->title_ar,
            'Title_En📌'       => $this->title_en,
            'Description_Ar🔸' => $this->description_ar,
            'Description_En🔹' => $this->description_en,
            'Price🌟'          => $this->price,
            'Image🖼️'         => $this->image,
            'Status✨'         => $this->status,
            'Duration⏱️'      => $this->duration,
            'Badge🏷️'         => $this->badge,
        ];
    }
}
