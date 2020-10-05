<?php

namespace App\Http\Repositories\Eloquent;

use App\Http\Interfaces\Eloquent\RoleEloquent;
use App\Models\Role;

class RoleRepo extends Repository implements RoleEloquent{

    public function __construct()
    {
        parent::__construct(new Role());
    }
    
    public function getByIds($id)
    {
        return Role::whereIn('id', $id)->pluck('user_id');
    }

    public function getByName($name)
    {
        return Role::query()->where('name', $name)->first();
    }

}
