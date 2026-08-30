<?php
namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ExamResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'Identity💎'=>$this->id,
            'Course_Id🛡️'=>$this->course_id,
            'Title_Ar🏷️'=>$this->title_ar,
            'Title_En📌'=>$this->title_en,
            'Total_Marks🌟'=>$this->total_marks,
            'Pass_Marks✨'=>$this->pass_marks,
            'Duration⏳'=>$this->duration,
            'Status🚀'=>$this->status,
        ];
    }
}
