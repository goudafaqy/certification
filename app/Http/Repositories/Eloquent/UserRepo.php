<?php

namespace App\Http\Repositories\Eloquent;

use App\Http\Interfaces\Eloquent\UserEloquent;
use App\Http\Repositories\Eloquent\Repository;
use App\User;
class UserRepo extends Repository implements UserEloquent{

    public function __construct()
    {
        parent::__construct(new User());
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

    public function deleteAssocciated($id)
    {
        $user = User::find($id);
        return $user->courses()->delete();
    }

    public function getTraineeCourses($trainee_id)
    {
        return User::find($trainee_id)->courses_s;
    }

}
