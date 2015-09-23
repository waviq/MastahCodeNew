<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'jobs';
    protected  $fillable = [
        'user_id',
        'Job',
        'position',
        'description'
    ];

    public function users()
    {
        $this->hasOne(User::class);
    }
}
