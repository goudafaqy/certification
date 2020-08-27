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

    public function getExistLetters(){
        $letters = Category::select('letter')->get();
        $lettersArr = [];
        foreach ($letters as $letter) {
            array_push($lettersArr, $letter->letter);
        }
        return $lettersArr;
    }

    public function getAllLetters(){
        return range('A', 'Z');
    }

}