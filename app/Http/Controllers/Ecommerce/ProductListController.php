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
use App\Item_category;
use App\Supplier;
use App\Shop_profile;
use Auth;
use Session;
class ProductListController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function domain(Request $request,$id)
    {
        $u_id=Auth::user()->id;
        $request->session()->forget('domain');
        $domain=Shop_profile::where('shop_domain','=',$id)
        ->where('status','=',1)
        ->first();
        $request->session()->put('domain',$domain);
        if(!Session::has('domain'))
        {
            return view('home'); 
        }
        $domain=Session::get('domain');
        $admin_id=$domain->admin_id;
        $shop=Shop_profile::where('admin_id','=',$admin_id)
        ->where('status','=',1)
        ->first();
        
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
        $items=DB::table('items')
            ->join('suppliers','items.supplier_id','=','suppliers.id')
            ->join('item_categories','items.item_category','=','item_categories.id')
            ->select('items.*','suppliers.supplier_name','item_categories.category_title')
            ->where('items.admin_id','=',$admin_id)
//            ->orderBy('items.item_price')
            ->where('items.status','=',1)
            ->paginate(12);

        $allshop=Shop_profile::select('shop_domain')->where('admin_id','!=',$u_id)->get();
            
            return view('shop.home',[
                'allshop'=>$allshop,
                'shop'=>$shop,
                'items'=>$items,
                'itemstotal'=>$itemstotal,
                'requestSort'=>request('sort'),
                'requestShow'=>request('show'),
                'item_categories'=>$item_category
                ]);

    }


    public function shop()
    {

        $u_id=Auth::user()->id;
        if(!Session::has('domain'))
        {
            return view('home'); 
        }
        $domain=Session::get('domain');
        $admin_id=$domain->admin_id;
        $shop=Shop_profile::where('admin_id','=',$admin_id)
        ->where('status','=',1)
        ->first();
        
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
         $allshop=Shop_profile::all();
        $items=DB::table('items')
            ->join('suppliers','items.supplier_id','=','suppliers.id')
            ->join('item_categories','items.item_category','=','item_categories.id')
            ->select('items.*','suppliers.supplier_name','item_categories.category_title')
            ->where('items.admin_id','=',$admin_id)
//            ->orderBy('items.item_price')
            ->where('items.status','=',1)
            ->paginate(12);

        $allshop=Shop_profile::select('shop_domain')->where('admin_id','!=',$u_id)->get();

            
            return view('shop.home',[
                'allshop'=>$allshop,
                'shop'=>$shop,
                'items'=>$items,
                'itemstotal'=>$itemstotal,
                'requestSort'=>request('sort'),
                'requestShow'=>request('show'),
                'item_categories'=>$item_category
                ]);

    }

    public function allproduct()
    {
        if(!Session::has('domain'))
        {
            return view('home'); 
        }
        $domain=Session::get('domain');
        $admin_id=$domain->admin_id;
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
        
        if(request()->has('sort') && request()->has('show'))
        {
            $items=DB::table('items')
            ->join('suppliers','items.supplier_id','=','suppliers.id')
            ->join('item_categories','items.item_category','=','item_categories.id')
            ->select('items.*','suppliers.supplier_name','item_categories.category_title')
            ->where('items.admin_id','=',$admin_id)
            ->orderBy('items.'.request('sort'))
            ->where('items.status','=',1)
            ->paginate((int)request('show'))
            ->appends([
                'sort'=>request('sort'),
                'show'=>request('show'),
            
            ]);

                
        }
        if(request()->has('sort'))
        {
            $items=DB::table('items')
            ->join('suppliers','items.supplier_id','=','suppliers.id')
            ->join('item_categories','items.item_category','=','item_categories.id')
            ->select('items.*','suppliers.supplier_name','item_categories.category_title')
            ->where('items.admin_id','=',$admin_id)
            ->orderBy('items.'.request('sort'))
            ->where('items.status','=',1)
            ->paginate(12)
            ->appends([
                'sort'=>request('sort'),
            
            ]);

                
        }
        else if(request()->has('show'))
        {
            $items=DB::table('items')
            ->join('suppliers','items.supplier_id','=','suppliers.id')
            ->join('item_categories','items.item_category','=','item_categories.id')
            ->select('items.*','suppliers.supplier_name','item_categories.category_title')
            ->where('items.admin_id','=',$admin_id)
            ->where('items.status','=',1)
            ->paginate((int)request('show'))
            ->appends([
                'show'=>request('show'),
            
            ]);

                
        }
        else{
            $items=DB::table('items')
            ->join('suppliers','items.supplier_id','=','suppliers.id')
            ->join('item_categories','items.item_category','=','item_categories.id')
            ->select('items.*','suppliers.supplier_name','item_categories.category_title')
            ->where('items.admin_id','=',$admin_id)
//            ->orderBy('items.item_price')
            ->where('items.status','=',1)
            ->paginate(12)
            ->appends([
                'sort'=>request('sort'),
                'show'=>request('show'),
            
            ]);
        }
        
        
        return view('shop.product.allproducts',[
            'items'=>$items,
            'itemstotal'=>$itemstotal,
            'requestSort'=>request('sort'),
            'requestShow'=>request('show'),
            'item_categories'=>$item_category
            ]); 
    }

    
    public function productcategory($id)
    {
        if(!Session::has('domain'))
        {
            return view('home'); 
        }
        $domain=Session::get('domain');
        $admin_id=$domain->admin_id;
        $item_category=Item_category::where('admin_id','=',$admin_id)
        ->where('status','=',1)
        ->get();
        $itemstotal=DB::table('items')
        ->join('suppliers','items.supplier_id','=','suppliers.id')
        ->join('item_categories','items.item_category','=','item_categories.id')
        ->select('items.*','suppliers.supplier_name','item_categories.category_title')
        ->where('items.admin_id','=',$admin_id)
        ->where('items.item_category','=',$id)
        ->where('items.status','=',1)
        ->get(); 
        $itemstotalcategory=DB::table('items')
        ->join('suppliers','items.supplier_id','=','suppliers.id')
        ->join('item_categories','items.item_category','=','item_categories.id')
        ->select('items.*','suppliers.supplier_name','item_categories.category_title')
        ->where('items.admin_id','=',$admin_id)
        ->where('items.status','=',1)
        ->get();
        
        if(request()->has('sort') && request()->has('show'))
        {
            $items=DB::table('items')
            ->join('suppliers','items.supplier_id','=','suppliers.id')
            ->join('item_categories','items.item_category','=','item_categories.id')
            ->select('items.*','suppliers.supplier_name','item_categories.category_title')
            ->where('items.admin_id','=',$admin_id)
            ->orderBy('items.'.request('sort'))
            ->where('items.status','=',1)
            ->where('items.item_category','=',$id)
            ->paginate((int)request('show'))
            ->appends([
                'sort'=>request('sort'),
                'show'=>request('show'),
            
            ]);

                
        }
        if(request()->has('sort'))
        {
            $items=DB::table('items')
            ->join('suppliers','items.supplier_id','=','suppliers.id')
            ->join('item_categories','items.item_category','=','item_categories.id')
            ->select('items.*','suppliers.supplier_name','item_categories.category_title')
            ->where('items.admin_id','=',$admin_id)
            ->orderBy('items.'.request('sort'))
            ->where('items.status','=',1)
            ->where('items.item_category','=',$id)
            ->paginate(12)
            ->appends([
                'sort'=>request('sort'),
            
            ]);

                
        }
        else if(request()->has('show'))
        {
            $items=DB::table('items')
            ->join('suppliers','items.supplier_id','=','suppliers.id')
            ->join('item_categories','items.item_category','=','item_categories.id')
            ->select('items.*','suppliers.supplier_name','item_categories.category_title')
            ->where('items.admin_id','=',$admin_id)
            ->where('items.status','=',1)
            ->where('items.item_category','=',$id)
            ->paginate((int)request('show'))
            ->appends([
                'show'=>request('show'),
            
            ]);

                
        }
        else{
            $items=DB::table('items')
            ->join('suppliers','items.supplier_id','=','suppliers.id')
            ->join('item_categories','items.item_category','=','item_categories.id')
            ->select('items.*','suppliers.supplier_name','item_categories.category_title')
            ->where('items.admin_id','=',$admin_id)
//            ->orderBy('items.item_price')
            ->where('items.status','=',1)
            ->where('items.item_category','=',$id)
            ->paginate(12)
            ->appends([
                'sort'=>request('sort'),
                'show'=>request('show'),
            
            ]);
        }
        
        
        return view('shop.product.allproductcategory',[
            'items'=>$items,
            'itemstotal'=>$itemstotal,
            'requestSort'=>request('sort'),
            'requestShow'=>request('show'),
            'item_categories'=>$item_category,
            'category_id'=>$id,
            'itemstotalcategory'=>$itemstotalcategory
            ]); 
    }
    public function itemview($id)
    {
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
        return view('shop.product.item',['items'=>$items]); 
    }
}
