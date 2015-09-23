<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormalEdu extends Model
{
    protected $table = 'formaledu';
    public $timestamps = false;

    protected $fillable = [
        'SD','SMP','SMA','kuliah_s1','kuliah_s2','kuliah_s3'
    ];

    public function yearsEdu(){
        return $this->belongsToMany(YearsEdu::class,'formaledu_years');
    }
}
