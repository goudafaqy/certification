<?php 

namespace App\Http\Repositories\Eloquent;

use App\Http\Interfaces\Eloquent\UserEloquent;
use App\Models\User;

class UserRepo implements UserEloquent{
    
    public function getAll()
    {
        return User::with('roles')->get();
    }


    public function getById($id)
    {
        return User::where('id', $id)->with('roles')->first();
    }


    public function getByIds($ids)
    {
        return User::whereIn('id', $ids)->get();
    }

    public function getByRoleIds($ids)
    {
        return User::whereIn('id', [$ids])->first();
    }

    public function getByRole($role)
    {
        return User::whereHas(
            'roles', function($q) use($role){
                $q->where('name', $role);
            }
        )->get();
    }

    public function saveRoles($roles, $id)
    {
        $user = User::find($id);
        $user->roles()->detach();
        $user->roles()->attach($roles);
    }

    public function save($inputs, $getId = false)
    {
        return ($getId) ? User::insertGetId($inputs) : User::create($inputs) ;
    }

    public function update($inputs, $id)
    {
        return User::where('id', $id)->update($inputs);
    }


    public function delete($id)
    {
        $user = User::find($id);
        $user->courses()->delete();
        return User::where('id', $id)->delete();
    }

    public function getTraineeCourses($trainee_id)
    {
        return User::find($trainee_id)->courses_s;
    }

}