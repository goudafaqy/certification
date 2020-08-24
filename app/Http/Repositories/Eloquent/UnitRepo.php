<?php 

namespace App\Http\Repositories\Eloquent;

use App\Http\Interfaces\Eloquent\UnitEloquent;
use App\Models\Unit;

class UnitRepo extends Repository implements UnitEloquent{

    public function __construct()
    {
        parent::__construct(new Unit());
    }

    public function getAll($section_id = '')
    {
        return Unit::where('section_id',$section_id)->get();
    }

}