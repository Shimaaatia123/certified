<?php
namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EnrollmentResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'User_id🛡️'=>$this->user_id,
            'Course_id🎓'=>$this->course_id,
            'Enrollment_date📚'=>$this->enrollment_date,
            'Status🚀'=>$this->status,
        ];
    }
}
