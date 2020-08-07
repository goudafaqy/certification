<?php 

namespace App\Http\Repositories\Eloquent;

use App\Http\Interfaces\Eloquent\CategoryEloquent;
use App\Models\Category;

class CategoryRepo implements CategoryEloquent{
    
    public function getAll()
    {
        return Category::all();
    }


    public function getById($id)
    {
        return Category::where('id', $id)->first();
    }


    public function save($inputs)
    {
        return Category::create($inputs);
    }

    public function update($inputs, $id)
    {
        return Category::where('id', $id)->update($inputs);
    }


    public function delete($id)
    {
        return Category::where('id', $id)->delete();
    }

}