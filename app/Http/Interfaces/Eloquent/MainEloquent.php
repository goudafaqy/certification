<?php 

namespace App\Http\Interfaces\Eloquent;

interface MainEloquent {

    public function getAll();

    public function getById($id);

    public function save($inputs);

    public function update($inputs, $id);

    public function delete($id);

}