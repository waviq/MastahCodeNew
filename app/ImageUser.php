<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageUser extends Model
{
    protected $table = 'image_user';
    protected $fillable = [
        'title',
        'image',
        'deskription'
    ];


}
