<?php 

namespace App\Http\Repositories\Eloquent;

use App\Http\Interfaces\Eloquent\ClassificationEloquent;
use App\Models\Classification;

class ClassificationRepo implements ClassificationEloquent{
    
    public function getAll()
    {
        return Classification::all();
    }


    public function getById($id)
    {
        return Classification::where('id', $id)->first();
    }


    public function save($inputs)
    {
        return Classification::create($inputs);
    }

    public function update($inputs, $id)
    {
        return Classification::where('id', $id)->update($inputs);
    }


    public function delete($id)
    {
        return Classification::where('id', $id)->delete();
    }

}