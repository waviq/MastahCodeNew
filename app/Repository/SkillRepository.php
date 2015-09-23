<?php
/**
 * Created by PhpStorm.
 * User: waviq
 * Date: 9/14/2015
 * Time: 11:47 PM
 */

namespace App\Repository;


use App\Skill;

class SkillRepository {

    protected $skill;

    public function __construct(Skill $skill)
    {
        $this->skill = $skill;
    }

    public function all()
    {
        return $this->skill->all();
    }
    public function getAllSelect()
    {
        $select = $this->all()->lists('namaSkill','id');
        return compact('select');
    }
}