<?php

namespace App;

use File;
use Illuminate\Database\Eloquent\Model;

class ImageUser extends Model
{
    protected $table = 'image_user';
    protected $fillable = [
        'title',
        'image',
        'deskription'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }



    public function delete()
    {
        if($this->attributes['image']){
            $file = $this->attributes['image'];
            if(File::isFile($file)){
                File::delete($file);
            }
        }
        parent::delete();
    }

}
