<?php
namespace App\Repositories\Contract;

abstract class BaseRepository{
    protected $model;
    public function find($id){
        return $this->model::find($id);
    }
}



?>
