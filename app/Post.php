<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'judul',
        'ringkasan',
        'kontenFull',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function kategori(){
        return $this->belongsToMany('App\Kategori','detail_kategori')->withTimestamps();
    }

    public function getKategoriListAttribute(){
        return $this->kategori->lists('id');
    }


}
