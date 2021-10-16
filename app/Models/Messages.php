<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    //
    protected $fillable=[
        'messages'
    ];
    protected $hidden=[
        'user_id'
    ];
    protected $primaryKey='message_id';


}
