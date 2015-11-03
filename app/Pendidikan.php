<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    protected $table = 'pendidikan';
    public $timestamps = false;

    protected $fillable = [
        'namaPendidikan'
    ];

    public function pendidikanValue(){
        return $this->belongsToMany(PendidikanValue::class,'pendidikan_value');
    }
}
