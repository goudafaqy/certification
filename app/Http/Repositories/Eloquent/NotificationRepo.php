<?php 

namespace App\Http\Repositories\Eloquent;

use App\Http\Interfaces\Eloquent\NotificationEloquent;
use App\Models\NotificationSetting;

class NotificationRepo implements NotificationEloquent{
    
    public function getAll()
    {
        return NotificationSetting::get();
    }


    public function getById($id)
    {
        return NotificationSetting::where('id', $id)->first();
    }


    public function save($inputs, $getId = false)
    {
        return ($getId) ? NotificationSetting::insertGetId($inputs) : NotificationSetting::create($inputs);
    }

    public function update($inputs, $id)
    {
        return NotificationSetting::where('id', $id)->update($inputs);
    }


    public function delete($id)
    {
        return NotificationSetting::where('id', $id)->delete();
    }

}