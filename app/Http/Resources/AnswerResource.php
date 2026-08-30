<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AnswerResource extends JsonResource
{
   
    public function toArray(Request $request): array
    {
        return [
            "Identity💎"=>$this->id,
            "question_id💡"=>$this->question_id,
            "Answer_Ar🔸"=>$this->answer_ar,
            "Answer_En🔹"=>$this->answer_en,
            "Is_Correct🔵"=>$this->is_correct,
        ];
    }
}
