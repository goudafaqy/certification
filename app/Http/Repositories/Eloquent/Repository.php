<?php 

namespace App\Http\Repositories\Eloquent;

use App\Http\Interfaces\Eloquent\MainEloquent;
use Illuminate\Database\Eloquent\Model;

class Repository implements MainEloquent{

    var $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    
    public function getAll($with = false)
    {
        return ($with) ? $this->model->with($with)->get() : $this->model->get();
    }


    public function getById($id, $with = false)
    {
        return ($with) ? $this->model->where('id', $id)->with($with)->first() : $this->model->where('id', $id)->first();
    }


    public function getByIds($ids)
    {
        return $this->model->whereIn('id', $ids)->get();
    }

    public function save($inputs, $getId = false)
    {
        return ($getId) ? $this->model->insertGetId($inputs) : $this->model->create($inputs) ;
    }

    public function saveBulk($inputs)
    {
        return $this->model->insert($inputs) ;
    }

    public function update($inputs, $id)
    {
        return $this->model->where('id', $id)->update($inputs);
    }


    public function delete($id)
    {
        return $this->model->where('id', $id)->delete();
    }

}