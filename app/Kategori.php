<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{

    protected $table = 'kategori';
    protected $fillable = ['namaKategori'];

    public function post(){
        return $this->belongsToMany('App\Post');
    }
}
