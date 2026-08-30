<?php
namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'Identity💎'=>$this->id,
            'User_Id👥'=>$this->user_id,
            'Course_Id🛡️'=>$this->course_id,
            'Rating⏳'=>$this->rating,
            'Comment📋'=>$this->comment,
            'Status🚀'=>$this->status,
        ];
    }
}
