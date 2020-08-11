<?php 

namespace App\Http\Repositories\Eloquent;

use App\Http\Interfaces\Eloquent\UnitEloquent;
use App\Models\Unit;

class UnitRepo implements UnitEloquent{
    
    public function getAll($section_id = '')
    {
        return Unit::where('section_id',$section_id)->get();
    }


    public function getById($id)
    {
        return Unit::where('id', $id)->first();
    }


    public function save($inputs, $getId = false)
    {
        return ($getId) ? Unit::insertGetId($inputs) : Unit::create($inputs);
    }

    public function update($inputs, $id)
    {
        return Unit::where('id', $id)->update($inputs);
    }


    public function delete($id)
    {
        return Unit::where('id', $id)->delete();
    }

}