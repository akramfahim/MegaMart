<?php

namespace App\Http\Controllers\Ecommerce;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use App\Page_info;
use App\Cartitem;
use App\Item;
use App\Supplier;
use App\Item_category;
use Auth;
use Session;
class CartController extends Controller
{
    //
    public function addtocart(Request $request, $id)
    {
        $item=Item::find($id);
        $oldCart=Session::has('cart') ? Session::get('cart') : null;
        $cart= new Cartitem($oldCart);
        $cart->add($item,$item->id);

        $request->session()->put('cart',$cart);
//        dd($request->session()->get('cart'));

        if(!Session::has('domain'))
        {
            return view('home'); 
        }
        $domain=Session::get('domain');
        $admin_id=$domain->admin_id;
        $items=DB::table('items')
        ->join('suppliers','items.supplier_id','=','suppliers.id')
        ->join('item_categories','items.item_category','=','item_categories.id')
        ->select('items.*','suppliers.supplier_name','item_categories.category_title')
        ->where('items.admin_id','=',$admin_id)
        ->where('items.status','=',1)
        ->paginate(12);
        $item_category=Item_category::where('admin_id','=',$admin_id)
        ->where('status','=',1)
        ->get();
        $itemstotal=DB::table('items')
        ->join('suppliers','items.supplier_id','=','suppliers.id')
        ->join('item_categories','items.item_category','=','item_categories.id')
        ->select('items.*','suppliers.supplier_name','item_categories.category_title')
        ->where('items.admin_id','=',$admin_id)
        ->where('items.status','=',1)
        ->get();
        $itemstotalcategory=DB::table('items')
        ->join('suppliers','items.supplier_id','=','suppliers.id')
        ->join('item_categories','items.item_category','=','item_categories.id')
        ->select('items.*','suppliers.supplier_name','item_categories.category_title')
        ->where('items.admin_id','=',$admin_id)
        ->where('items.status','=',1)
        ->get();
        return view('shop.product.allproducts',[
            'items'=>$items,
            'itemstotal'=>$itemstotal,
            'requestSort'=>null,
            'requestShow'=>null,
            'item_categories'=>$item_category
            ]); 
    }
    public function addtocartitem(Request $request, $id)
    {
        $item=Item::find($id);
        $oldCart=Session::has('cart') ? Session::get('cart') : null;
        $cart= new Cartitem($oldCart);
        $cart->add($item,$item->id);

        $request->session()->put('cart',$cart);
//        dd($request->session()->get('cart'));

        if(!Session::has('domain'))
        {
            return view('home'); 
        }
        $domain=Session::get('domain');
        $admin_id=$domain->admin_id;
        $items=DB::table('items')
        ->join('suppliers','items.supplier_id','=','suppliers.id')
        ->join('item_categories','items.item_category','=','item_categories.id')
        ->select('items.*','suppliers.supplier_name','item_categories.category_title')
        ->where('items.admin_id','=',$admin_id)
        ->where('items.status','=',1)
        ->where('items.id','=',$id)
        ->first();
        return view('shop.product.item',[
            'items'=>$items,
            ]); 
    }
    public function cartlist()
    {
        if(!Session::has('cart'))
        {
            return view('shop.cart.cartitemlist',['items'=>null]); 
        }
        $oldCart=Session::get('cart');
        $cart=new Cartitem($oldCart);
        return view('shop.cart.cartitemlist',['items'=>$cart->items,'totalprice'=>$cart->totalPrice]); 
        
    }

    public function clearcart(Request $request)
    {
        $request->session()->forget('cart');
        return view('shop.cart.cartitemlist',['items'=>null]); 
        
    }
     public function checkout()
     {
         if(!Session::has('cart'))
         {
             return view('shop.cart.cartitemlist',['items'=>null]); 
         }
         $oldCart=Session::get('cart');
        $cart=new Cartitem($oldCart);
         return view('shop.cart.checkout',['items'=>$cart->items,'totalprice'=>$cart->totalPrice]); 
        
    }
}
