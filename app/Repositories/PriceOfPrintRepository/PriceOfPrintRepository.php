<?php
namespace App\Repositories\PriceOfPrintRepository;

use App\Models\PriceOfPrint;
use App\Repositories\Contract\BaseRepository;

class PriceOfPrintRepository extends BaseRepository{
    public function __construct()
    {
        $this->model=PriceOfPrint::class;
    }
    
}
?>
