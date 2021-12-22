<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\customer;
use Illuminate\Http\Request;
use App\Models\slide;
use App\Models\product;
use App\Models\bill;
use App\Models\bill_detaill;
use App\Models\type_product;
use Gloudemans\Shoppingcart\Facades\cart;

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

        $product= product::where('id_type',$id_type)->paginate(6);
        $newproducts= product::where('id_type',$id_type)->get();
        $topproducts= product::where('id_type','<>',$id_type)->get();
        $topproduct= product::where('id_type','<>',$id_type)->paginate(3);
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
        $idtype= product::find($id)->id_type;
        $newproducts= product::where('id_type',$idtype)->paginate(3);
        $newproduct=product::where('new',1)->paginate(4);
        $topproduct=product::where('promotion_price','<>',0)->paginate(4);
        return view('clients.show.product', [
            'products'=>$product,
            'newproductss'=>$newproducts,
            'newproducts'=>$newproduct,
            'topproducts'=>$topproduct,
        ]);
    }
    public function contact(){
        return view('clients.show.contacts');
    }
    public function about(){
        return view('clients.show.about');
    }
    public function shopping(Request $request ,$id){
        // Cart::destroy();
       $cart = product::find($id);
       if($cart->promotion_price==0){
           $price= $cart->Unit_price;
       }else {
        $price= $cart->promotion_price;
       }

      Cart::add([
            'id'=> $cart->id,
            'name'=> $cart->name,
            'price'=> $price,
            'qty'=> 1,
            'options' => ['image' => $cart->image,
                          'status'=>$cart->deleted_at]
        ]);
        return redirect()->route('home');
    }
    public function deletecart($rowID){
        Cart::remove($rowID);
        return redirect()->route('home');
    }
    public function checkout(){
     $checkout = Cart::content();
        return view('clients.show.checkout',['checkout'=>$checkout]);
    }
    public function postcheckout(Request $request){
        // dd(Cart::content() ;
        // $f=Cart::content();
        // dd( $f);
        // foreach ( Cart::content() as $key) {
        //     print_r( $key);
        // }

      $a= customer::create($request->only(['name','gender','email','address','phone','note',]));

       $b= bill::create([
            'id_customer'=>$a->id,
            'date_order'=> date('Y-m-d H:i:s'),
            'total'=> Cart::subtotal('0'),
            'payment'=>$request->payment_method,
            'note'=>$request->note
        ]);

        foreach (Cart::content() as $bill_detaill) {
            $c=  bill_detaill::create([
            'id_bill'=> $b->id,
            'id_product'=>$bill_detaill->id,
            'quantity'=>$bill_detaill->qty,
            'unit_price'=>$bill_detaill->price,
        ]);
    }
           Cart::destroy();
           return redirect()->back()->with('messeger','đã bạn đã đặt hàng thành công');
       }
}
