<?php
namespace App\Repositories\Contract;
abstract class BaseRepository{
    protected $model;
    public function find($id){
        return $this->model::find($id);
    }
    public function create(array $data){
        return $this->model::create($data);
    }
    public function findBy(array $criteria, $single = true)
    {
        $query = $this->model::query();
        foreach ($criteria as $key => $value) {
            $query->where($key, $value);
        }
        if ($single) {
            return $query->first();
        }
        return $query->get();
    }
}

?>