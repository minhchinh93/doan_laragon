<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\customer;
use App\Models\slide;
use App\Models\product;
use App\Models\bill;
use App\Models\bill_detaill;
use App\Models\type_product;

class dasboaController extends Controller
{
    //
    public function showdasboa(){

        $totalbill = bill::sum('total',);
        $totalbill_detaill = bill_detaill::sum('quantity');
        $totalcustomer = customer::all()->count();
        $totalCOD = bill::where('payment','COD')->count();
        $totalATM = bill::where('payment','ATM')->count();

        // $users = DB::table('bills')
        //     ->join('bill_detaills', 'bill_detaills.id_bill', '=', 'bills.id')
        //     ->join('customers', 'bills.id_customer', '=', 'customers.id')
        //      ->select(DB::raw('SUM(bill_detaills.quantity) as so_luong, bills.total,customers.name,bills.date_order'))
        //     //  ->where('status', '<>', 1)
        //      ->groupBy('bills.id')
        //      ->get();

             $users =  Bill::join('bill_detaills', 'bill_detaills.id_bill', '=', 'bills.id')
                ->join('customers', 'bills.id_customer', '=', 'customers.id')
                ->select(DB::raw('SUM(bill_detaills.quantity) as so_luong, bills.total'))
//  ->where('status', '<>', 1)
                ->groupBy('bills.id')
                ->get();
         dd($users);


        return view('admin/dasboa/index',[
            'totalbill'=>$totalbill,
            'totalbill_detaill'=>$totalbill_detaill,
            'totalcustomer'=>$totalcustomer,
            'totalCOD'=>$totalCOD,
            'totalATM'=>$totalATM,
    ]);
    }
}
