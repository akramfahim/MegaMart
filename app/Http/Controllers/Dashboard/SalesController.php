<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;

use App\Password;
use App\Shop_category;
use App\Shop_profile;
use App\User_profile;
use App\User;
use App\Sale_item;
use App\Sale_item_list;
use App\Income_statement;
use Auth;
class SalesController extends Controller
{
    //
    public function makesales()
    {
        return view('dashboard.sales.makesale'); 

    }
    public function addingitems()
    {
        $data[]=[
            'id' => request('id'),
            'supplier_id' => request('supplier_id'),
            'category_id' => request('category_id'),
            'name' => request('name'),
            'category' => request('category'),
            'supplier'=>request('supplier'),
            'stock'=>request('stock'),
            'price'=>request('price')
        ];
        $id=request('id');
        $supplier_id=request('supplier_id');
        $category_id=request('category_id');
        $name=request('name');
        $category=request('category');
        $supplier=request('supplier');
        $stock=request('stock');
        $price=request('price');
        

        return view('dashboard.sales.addingitem',['id'=>$id,'supplier_id'=>$supplier_id,
        'category_id'=>$category_id,'name'=>$name,
        'category'=>$category,'supplier'=>$supplier,
        'stock'=>$stock,'price'=>$price,]); 

    }


    public function sellitems(Request $request)
    {
        $admin_id=$this->userprofile()->admin_id;
        $profile_id=$this->userprofile()->id;
        $this->validate($request,
        [
            'total_price'=> 'required',
        ]
        );
        $customer_id=$request->input('customer_id');
        $totalitem=count($request->input('item_id'));
        $itemlist=new Sale_item_list;
        $itemlist->admin_id=$admin_id;
        $itemlist->total_price=$request->input('total_price');
        $itemlist->save();
        $list_id=$itemlist->id;
        for($i = 0; $i < $totalitem; $i++){
        $sell_item=new Sale_item;
        $sell_item->item_id=$request->input('item_id')[$i];
        $sell_item->item_amount=1;
        $sell_item->item_list_id=$list_id;
        $sell_item->selling_price=$request->input('selling_price')[$i];
        $sell_item->item_price=$request->input('item_price')[$i];
        $sell_item->save();

        }
        $income=new Income_statement;
        $income->admin_id=$admin_id;
        $income->user_id=$profile_id;
        $income->itemselllist_id=$list_id;
        $income->remarks="Item Sold on Dashboard";
        $income->price=$request->input('total_price');
        $income->save();
        if(!empty($customer_id))
        {
            $user=User_profile::where('id','=',$customer_id)
            ->first();
            $newspend=$user->user_spended+$request->input('total_price');
            $profile=new User_profile;
            $profile->user_spended=$newspend;
            $data=array(
                'user_spended' => $profile->user_spended ,
                );
    
                User_profile::where('id',$customer_id)->update($data);
            $profile->update();
        }

        return redirect('/dashboard/sales/makesale')->with(['response'=>'Item Sold Successfully'] ); 
    
    }

    public function makesaleusersearch(Request $request)
    {
        $admin_id=$this->userprofile()->admin_id;
        $search =$request->term;
        $stockeditem=User_profile::where('user_profile_number','LIKE','%'.$search.'%')
        ->where('user_profile_rank','=',11)
        ->where('admin_id','=',$admin_id)
        ->get();
        $data=[];
        foreach($stockeditem as $key=>$value)
        {
            
            $data[]=[
                'id' => $value->id,
                'name' => $value->user_profile_name,
                'label' => $value->user_profile_number,
                'number' => $value->user_profile_number];
        }
        return response($data); 
    }

    public function salelist()
    {
        $admin_id=$this->userprofile()->admin_id;
        $items=Sale_item_list::where('admin_id','=',$admin_id)
        ->where('status','=',1)
        ->get();
        return view('dashboard.sales.salelist',['items'=>$items]); 
    }
    public function view($id)
    {
        $admin_id=$this->userprofile()->admin_id;
        $items=DB::table('sale_items')
        ->join('items','sale_items.item_id','=','items.id')
        ->select('items.item_name','sale_items.*')
        ->where('sale_items.item_list_id','=',$id)
        ->where('sale_items.status','=',1)
        ->get();
        return view('dashboard.sales.view',['items'=>$items]); 
    }
}
