<?php
namespace App\Repositories\UserRepository;

use App\Models\User;
use App\Repositories\Contract\BaseRepository;

class UserRepository extends BaseRepository{
    public function __construct()
    {
        $this->model=User::class;
    }
}


?>