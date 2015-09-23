<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table = 'skills';
    protected $fillable = [
        'namaSkill'
    ];

    public function valueSkills(){
        return $this->belongsToMany(ValueSkill::class,'skill_value');
    }



}
