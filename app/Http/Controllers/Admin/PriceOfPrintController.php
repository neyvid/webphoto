<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PriceOfPrint;
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
    public function create(Request $request){
        $this->priceOFPrintRepo->create([
            "size"=> $request->printSize,
            "printType"=>  $request->printType,
            "printGenus"=>  $request->printGenus,
            "shasiTickness"=> $request->printGenus=='shasi'? $request->thicknessOfShasi : 0,
            "price"=>  $request->price,
        ]);
        return redirect()->route('priceOfPrint.index')->with('success','تعرفه جدید با موفقیت ثبت شد');
    }

    public function calculatePriceOfPrint(Request $request){
     
       $result=$this->priceOFPrintRepo->findBy([
        'size'=>$request->photoSize,
        'printType'=>$request->printType,
        'printGenus'=>$request->printGenus,
        'shasiTickness'=>($request->printGenus =='shasi')? $request->thickness : 0,
       ]);

       if($result instanceof PriceOfPrint){
        $priceOfPrint=$result->price;
        $tax=($priceOfPrint*(.1)*$request->quantity);
        $totalPrice=($request->quantity*$priceOfPrint)+$tax;
        return response()->json(['price'=>$priceOfPrint,'tax'=>$tax,'totalPrice'=>$totalPrice]);
       }
       return response()->json(['price'=>'تعرفه ای ثبت نشده','tax'=>'تعرفه ای ثبت نشده','totalPrice'=>'تعرفه ای ثبت نشده']);

    }
  
}
