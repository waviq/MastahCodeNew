<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ValueSkill extends Model
{
    protected $table = 'valueskill';
    protected $fillable = [
        'user_id',
        'value'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function skill(){
        return $this->belongsToMany(Skill::class,'skill_value');
    }

    public function getSkillsListAttribute(){
        return $this->skills->lists('id');
    }
}
