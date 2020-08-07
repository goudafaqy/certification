<?php 

namespace App\Http\Repositories\Eloquent;

use App\Http\Interfaces\Eloquent\UserEloquent;
use App\Models\User;

class UserRepo implements UserEloquent{
    
    public function getAll()
    {
        return User::all();
    }


    public function getById($id)
    {
        return User::where('id', $id)->first();
    }

    public function getByRole($role)
    {
        return User::where('role', $role)->get();
    }

    public function save($inputs, $getId = false)
    {
        return User::create($inputs);
    }

    public function update($inputs, $id)
    {
        return User::where('id', $id)->update($inputs);
    }


    public function delete($id)
    {
        User::where('id', $id)->courses->delete();
        return User::where('id', $id)->delete();
    }

}