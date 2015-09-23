<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sosmed extends Model
{
    protected $table = 'sosmed';
    protected $fillable = [
        'user_id',
        'email',
        'facebook',
        'twitter',
        'linkedin',
        'skype'
    ];

    

}
