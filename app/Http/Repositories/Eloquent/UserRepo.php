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


    public function save($inputs)
    {
        return User::create($inputs);
    }

    public function update($inputs, $id)
    {
        return User::where('id', $id)->update($inputs);
    }


    public function delete($id)
    {
        return User::where('id', $id)->delete();
    }

}