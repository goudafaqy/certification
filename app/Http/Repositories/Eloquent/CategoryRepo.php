<?php 

namespace App\Http\Repositories\Eloquent;

use App\Http\Interfaces\Eloquent\CategoryEloquent;
use App\Models\Category;

class CategoryRepo extends Repository implements CategoryEloquent{

    public function __construct()
    {
        parent::__construct(new Category());
    }

    public function deleteAssocciated($id)
    {
        $category = Category::find($id);
        $category->classifications()->delete();
        return $category->courses()->delete();
    }

}