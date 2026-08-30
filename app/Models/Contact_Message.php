<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact_Message extends Model
{
    protected $table    = 'contact_messages';
    protected $fillable = [
        'id',
        'name',
        'email',
        'subject',
        'message',
        'status',
    ];
}
