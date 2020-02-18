<?php

namespace App\Http\Controllers\Ecommerce;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use App\Page_info;
use App\Item;
use App\Cartitem;
use App\Item_category;
use App\Supplier;
use App\address;
use App\Delivery;
use App\Payment;
use App\Orders;
use App\Carts;
use App\ItemCartList;
use Session;
use Auth;

class CheckoutController extends Controller

{  

  public function cartlist()
    {

        if(!Session::has('cart'))
        {
            return view('shop.cart.cartitemlist',['items'=>null]); 
        }
        $oldCart=Session::get('cart');
        $cart=new Cartitem($oldCart);
        return view('shop.cart.checkout',['items'=>$cart->items,'totalprice'=>$cart->totalPrice]);
    }




    public function store(Request $request)
    {
        
     if(!Session::has('domain'))
        {
            return view('home'); 
        }
        $domain=Session::get('domain');
        $admin_id=$domain->admin_id;
        

        //storing address
        $address =  new address;
        $address->fullname = $request->input('fullname');
        $address->company = $request->input('company');
        $address->street = $request->input('street');
        $address->city = $request->input('city');
        $address->zip = $request->input('zip');
        $address->state = $request->input('state');
        $address->country = $request->input('country');
        $address->telephone = $request->input('telephone');
        $address->email = $request->input('email');

        $address->save();

        //storing payments
        $payment =new Payment;
        		
        $payment->payment = $request->input('payment');

  

        $payment->save();

        //storing delivery
        $delivery = new Delivery;
       	$delivery->delivery = $request->input('delivery');
 

        $delivery->save();


        //storing cart
         if(Auth::check())
            {

        $user_id=Auth::user()->id;
            }
            else
            {
                $user_id=0;
            }
        $totalitem=count($request->input('product'));
        $itemlist=new ItemCartList;
        $itemlist->admin_id=$admin_id;
        $itemlist->user_id=$admin_id;
        $itemlist->cart_id=$admin_id;
        $itemlist->item_id=$request->input('total_all_price');
        $itemlist->save();
        $list_id=$itemlist->id;
        for($i = 0; $i < $totalitem; $i++){
        $sell_item=new Carts;
        $sell_item->qty=$request->input('qty')[$i];
        $sell_item->discount=$list_id;
        $sell_item->product=$request->input('product')[$i];
        $sell_item->unit_price=$request->input('unit_price')[$i];
        $sell_item->total=$request->input('total')[$i];
        $sell_item->save();

        }


        //storing order

        $orders =new Orders;
       	$orders->address_id = $address->id;
        $orders->payments_id = $payment->id;
        $orders->delivery_id = $delivery->id;
        $orders->cart_id = $list_id;



        $orders->save();
        $request->session()->forget('cart');
        return view('shop.cart.cart_success')->with('Order Added Successfully' ); 
    }
}


