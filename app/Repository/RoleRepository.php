<?php

namespace App\Repository;


use App\Role;

class RoleRepository {

    protected $role;

    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    public function all()
    {
        return $this->role->all();
    }

    public function getAllSelect()
    {
        $select = $this->all()->lists('slug','id');

        return compact('select');
    }
}