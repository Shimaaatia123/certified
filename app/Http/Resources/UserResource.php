<?php
namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'Identity'=>$this->id,
            'Name👤'=>$this->name,
            'Email📩'=>$this->email,           
            'Role🛡️'=>$this->role,
            'Status🚀'=>$this->status,
        ];
    }
}
