<?php
namespace App\Repositories\PhotoRepository;

use App\Models\Photo;
use App\Repositories\Contract\BaseRepository;

class PhotoRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model=Photo::class;
        
    }
}
