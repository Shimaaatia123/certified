<?php
namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LessonResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'Identity💎'=>$this->id,
            'Course_Id🎓'=>$this->course_id,
            'Title_Ar🏷️'=>$this->title_ar,
            'Title_En📌'=>$this->title_en,
            'Content_Ar🔸'=>$this->content_ar,
            'Content_En🔹'=>$this->content_en,
            'Video_URL📸'=>$this->video_url,
            'Order🖌️'=>$this->order,
            'Status🚀'=>$this->status,
        ];
    }
}
