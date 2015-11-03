<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{

    protected $table = 'kategori';
    protected $fillable = ['namaKategori','image'];

    public function posts(){
        return $this->belongsToMany(Post::class,'detail_kategori');
    }








}
