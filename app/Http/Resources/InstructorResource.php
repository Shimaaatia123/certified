<?php
namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InstructorResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'Identity💎'=>$this->id,
            'Name👤'=>$this->name,
            'Email📩'=>$this->email,
            'BIO📋'=>$this->bio,
            'Image🖼️'=>$this->image,
            'Phone🛡️'=>$this->phone,
            'Status🚀'=>$this->status,
        ];
    }
}
