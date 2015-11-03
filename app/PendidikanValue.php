<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PendidikanValue extends Model
{
    protected $table = 'value-edu';
    public $timestamps = false;

    public function pendidikan()
    {
        return $this->belongsToMany(Pendidikan::class,'pendidikan_value');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

}
