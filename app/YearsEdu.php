<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class YearsEdu extends Model
{
    protected $table = 'yearseducation';
    protected $fillable = [
        'start','finish'
    ];

    public function formalEdu(){
        return $this->belongsToMany(FormalEdu::class,'formaledu_years');
    }
}
