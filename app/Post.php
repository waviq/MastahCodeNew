<?php

namespace App;

use App\traits\SearchableTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

use Validator;


class Post extends Model
{
    use SearchableTrait;

    protected $table = 'posts';
    protected $searchable = [
        'columns' => [
            'judul' => 15,
            'kontenFull' => 15,
        ],

    ];

    protected $fillable = [
        'judul',
        'ringkasan',
        'kontenFull',
        'user_id',
        'image'
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

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public static function kategoris()
    {
        return Post::belongsToMany('App\Kategori','detail_kategori')->withTimestamps();
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d M, Y');
    }

    /*public static function search($keyword)
    {
        return static::search($keyword)->paginate();
    }*/


}
