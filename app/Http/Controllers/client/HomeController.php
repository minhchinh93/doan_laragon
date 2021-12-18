<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\slide;
use App\Models\product;
use App\Models\type_product;

class HomeController extends Controller
{
    //

    public function home() {
        $slide =slide::all();
        $newproducts=product::where('new',1)->get();
        $newproduct=product::where('new',1)->paginate(4);
        $topproducts=product::where('promotion_price','<>',0)->get();
        $topproduct=product::where('promotion_price','<>',0)->paginate(8);

        return view('clients.home',['slides'=>$slide,'newproducts'=>$newproduct,
        'topproducts'=>$topproduct,
        'totalnewproducts'=>$newproducts,
        'totaltopproducts'=>$topproducts,
    ]);
    }
    public function product_type($id_type){

        $product= product::where('id_type',$id_type)->paginate(3);
        $newproducts= product::where('id_type',$id_type)->get();
        $topproducts= product::where('id_type','<>',$id_type)->get();
        $topproduct= product::where('id_type','<>',$id_type)->paginate(6);
        $menu= type_product::get();
        $menuID= type_product::find($id_type);
        return view('clients.show.product_type',
        ['products'=>$product,
        'menus'=>$menu,
        'menuID'=>$menuID,
        'totalnewproducts'=>$newproducts,
        'totaltopproducts'=>$topproducts,
        'topproducts'=>$topproduct,
    ]);
    }
    public function product($id){
        $product= product::find($id);
        return view('clients.show.product', ['products'=>$product]);
    }
    public function contact(){
        return view('clients.show.contacts');
    }
    public function about(){
        return view('clients.show.about');
    }
    public function shopping(){
        return view('clients.show.shopping');
    }
}
