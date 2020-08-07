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

    public function getByCat($cat_id)
    {
        return Classification::where('cat_id', $cat_id)->get();
    }


    public function save($inputs, $getId = false)
    {
        return Classification::create($inputs);
    }

    public function update($inputs, $id)
    {
        return Classification::where('id', $id)->update($inputs);
    }


    public function delete($id)
    {
        $classification = Classification::find($id);
        $classification->courses()->delete();
        return Classification::where('id', $id)->delete();
    }

}