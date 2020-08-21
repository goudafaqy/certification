<?php 

namespace App\Http\Repositories\Eloquent;

use App\Http\Interfaces\Eloquent\RoleEloquent;
use App\Models\Role;

class RoleRepo implements RoleEloquent{
    
    public function getAll()
    {
        return Role::all();
    }

    public function getById($id)
    {
        return Role::where('id', $id)->first();
    }

    public function getByIds($id)
    {
        return Role::whereIn('id', $id)->pluck('user_id');
    }
    public function save($inputs, $getId = false)
    {
        return Role::create($inputs);
    }

    public function update($inputs, $id)
    {
        return Role::where('id', $id)->update($inputs);
    }

    public function delete($id)
    {
        return Role::where('id', $id)->delete();
    }

}