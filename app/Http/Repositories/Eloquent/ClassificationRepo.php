<?php 

namespace App\Http\Repositories\Eloquent;

use App\Http\Interfaces\Eloquent\ClassificationEloquent;
use App\Models\Classification;

class ClassificationRepo extends Repository implements ClassificationEloquent{

    public function __construct()
    {
        parent::__construct(new Classification());
    }

    public function getByCat($cat_id)
    {
        return Classification::where('cat_id', $cat_id)->get();
    }

    public function deleteAssocciated($id)
    {
        $classification = Classification::find($id);
        return $classification->courses()->delete();
    }

}