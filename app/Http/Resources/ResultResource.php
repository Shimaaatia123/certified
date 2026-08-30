<?php
namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ResultResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'Identity💎'=>$this->id,
            'User_Id🛡️'=>$this->user_id,
            'Exam_Id🔖'=>$this->exam_id,
            'SCORE🏆'=>$this->score,
            'Total🌟'=>$this->total,
            'Status✨'=>$this->status,
            'Percentage🚀'=>$this->percentage,
            'Grade🎓'=>$this->grade,
        ];
    }
}
