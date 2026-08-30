<?php
namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'Identity💎'=>$this->id,
            'Exam_Id🛡️'=>$this->exam_id,
            'Question_Ar🏷️'=>$this->question_ar,
            'Question_En📌'=>$this->question_en,
            'MARK🏆'=>$this->mark,
            'Type🌟'=>$this->type,
        ];
    }
}
