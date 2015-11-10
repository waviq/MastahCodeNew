<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestTutorial extends Model
{
    protected $table = "request_tutorial";
    protected $fillable = [
        'title',
        'description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
