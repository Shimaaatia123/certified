<?php
namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContactMessageResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'Identity💎'=>$this->id,
            'Name👤'=>$this->name,
            'Email📩'=>$this->email,
            'Subject📖'=>$this->subject,
            'Message💌'=>$this->message,
            'Status🚀'=>$this->status,
        ];
    }
}
