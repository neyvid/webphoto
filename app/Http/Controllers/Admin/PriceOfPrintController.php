<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\PriceOfPrintRepository\PriceOfPrintRepository;
use Illuminate\Http\Request;

class PriceOfPrintController extends Controller
{
    protected $priceOFPrintRepo;
    public function __construct()
    {
        $this->priceOFPrintRepo=new PriceOfPrintRepository();
    }
    public function index(){
        $priceOfPrints=$this->priceOFPrintRepo->all();
        return view('admin.priceOfPrint.index',compact('priceOfPrints'));
    }
    public function createForm (){
        
        return view('admin.priceOfPrint.create');
    }
}
