<?php
namespace App\Repositories\UserRepository;

use App\Models\User;
use App\Repositories\Contract\BaseRepository;
class UserRespository extends BaseRepository{
    
    public function __constract(){
        $this->model=User::class;
    }
    
}