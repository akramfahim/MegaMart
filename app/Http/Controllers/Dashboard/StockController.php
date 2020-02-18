<?php

namespace App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use App\Emergency_stock;
use App\Page_info;
use App\Item;
use App\Supplier;
use App\Item_category;
use Auth;

class StockController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addstock()
    {
        $admin_id=$this->userprofile()->admin_id;
        $page_info=Page_info::where('page_id','=','31')
        ->first();
        $item_category=Item_category::where('admin_id','=',$admin_id)
        ->where('status','=',1)
        ->get();
        $suppliers=supplier::where('admin_id','=',$admin_id)
        ->where('status','=',1)
        ->get();
        return view('dashboard.stock.addstock',['page_info'=>$page_info,'suppliers'=>$suppliers,'categories'=>$item_category]); 
    }

    public function stockadded(Request $request)
    {
        $admin_id=$this->userprofile()->admin_id;
        $page_info=Page_info::where('page_id','=','31')
        ->first();
        $item_category=Item_category::where('admin_id','=',$admin_id)
        ->where('status','=',1)
        ->get();
        $suppliers=supplier::where('admin_id','=',$admin_id)
        ->where('status','=',1)
        ->get();
        $this->validate($request,
            [
                'item_name'=> 'required',
                'item_category'=> 'required',
                'item_name'=> 'required',
                'item_stock'=> 'required',
                'item_price'=> 'required',
            ]
            );
        $item=new Item;
        $item->item_name=$request->input('item_name');
        $item->item_category=$request->input('item_category');
        $item->item_type=1;
        $item->item_stock=$request->input('item_stock');
        $item->item_price=$request->input('item_price');
        $item->item_discount=$request->input('item_discount');
        $item->supplier_id=$request->input('supplier_id');
        if(Input::hasFile('item_image'))
        {
            $file=Input::file('item_image');
            $file->move(public_path().'/images/itemimages/', $file->getClientOriginalName());
            $url=URL::to("/").'/images/itemimages/'. $file->getClientOriginalName();
            $item->item_image= $url;
        }
        else
        {
            $item->item_image= public_path().'/images/carticon.png';
        }
        $item->admin_id=$admin_id;
        $item->save();
        return redirect('dashboard/stock/newstock')->with(['page_info'=>$page_info,'suppliers'=>$suppliers,'categories'=>$item_category,'response'=>'Item Category Added Successfully'] ); ; 
    }


    
    public function stocklist()
    {
        $admin_id=$this->userprofile()->admin_id;
        $items=DB::table('items')
        ->join('suppliers','items.supplier_id','=','suppliers.id')
        ->join('item_categories','items.item_category','=','item_categories.id')
        ->select('items.*','suppliers.supplier_name','item_categories.category_title')
        ->where('items.admin_id','=',$admin_id)
        ->where('items.status','=',1)
        ->get();
        return view('dashboard.stock.stocklist',['items'=>$items]); 
    }
    public function addcategory()
    {
        $admin_id=$this->userprofile()->admin_id;
        $item_category=Item_category::where('admin_id','=',$admin_id)
        ->where('status','=',1)
        ->get();
        return view('dashboard.stock.addcategory',['item_categories'=>$item_category]); 
    }
    public function addedcategory(Request $request)
    {
        $admin_id=$this->userprofile()->admin_id;
        $item_category=Item_category::where('admin_id','=',$admin_id)
        ->where('status','=',1)
        ->get();
        
        $this->validate($request,
            [
                'category_title'=> 'required',
            ]
            );
        $category=new Item_category;
        $category->category_title=$request->input('category_title');
        $category->category_info=$request->input('category_info');
        $category->admin_id=$admin_id;
        $category->save();
        return redirect('dashboard/stock/addcategory')->with(['item_categories'=>$item_category,'response'=>'Item Category Added Successfully'] ); ; 
    }
    public function deletecategory($id)
    {
        $admin_id=$this->userprofile()->admin_id;
        $item_category=Item_category::where('admin_id','=',$admin_id)
        ->where('status','=',1)
        ->get();
        $category=new Item_category;
        $category->status=0;
        $data=array(
            'status' => 0 
                );

        Item_category::where('id',$id)->update($data);
        $category->update();
        return redirect('dashboard/stock/addcategory')->with(['item_categories'=>$item_category,'response'=>'Item Category Deleted Successfully'] ); ; 
    }
    public function emergencystock()
    {

        return view('dashboard.stock.emergencystock'); 

    }
    public function emergencystocksearch(Request $request)
    {
        $admin_id=$this->userprofile()->admin_id;
        $search =$request->term;
        $stockeditem=Item::where('item_name','LIKE','%'.$search.'%')
        ->where('admin_id','=',$admin_id)
        ->get();
        $data=[];
        foreach($stockeditem as $key=>$value)
        {
            $category=Item_category::where('id','=',$value->item_category)
            ->first();
            $supplier=Supplier::where('id','=',$value->supplier_id)
             ->first();
            $data[]=[
                'id' => $value->id,
                'supplier_id' => $value->supplier_id,
                'category_id' => $value->item_category,
                'name' => $value->item_name,
                'label' => $value->item_name,
                'category' => $category->category_title,
                'supplier'=>$supplier->supplier_name,
                'stock'=>$value->item_stock,
                'price'=>$value->item_price,
            ];
        }
        return response($data); 
    }
    public function emergencyupdated(Request $request)
    {
        $this->validate($request,
        [
            'item_stock'=> 'required',
        ]
        );
        $admin_id=$this->userprofile()->admin_id;
        $profile_id=$this->userprofile()->id;
        $id=$request->input('id');

        $item=new Item;
        $item->item_stock=$request->input('item_stock')+$request->input('item_stock_old2');
        $data=array(
            'item_stock' => $item->item_stock 
            );

        Item::where('id',$id)->update($data);
        $item->update();

        

        $emergencyStock=new Emergency_stock;
        $emergencyStock->item_id=$request->input('id');
        $emergencyStock->supplier_id=$request->input('supplier_id');
        $emergencyStock->category_id=$request->input('category_id');
        $emergencyStock->old_stock=$request->input('item_stock_old');
        $emergencyStock->new_stock=$request->input('item_stock');
        $emergencyStock->admin_id=$admin_id;
        $emergencyStock->user_id=$profile_id;
        $emergencyStock->save();

        return redirect('/dashboard/stock/emergencystock')->with(['response'=>'Emergency Stock Added Successfully'] ); 
    }
    public function emergencystockreport()
    {
        $admin_id=$this->userprofile()->admin_id;
        $emergency_report=DB::table('emergency_stocks')
        ->join('suppliers','emergency_stocks.supplier_id','=','suppliers.id')
        ->join('items','emergency_stocks.item_id','=','items.id')
        ->join('item_categories','emergency_stocks.category_id','=','item_categories.id')
        ->select('emergency_stocks.*','items.item_name','suppliers.supplier_name','item_categories.category_title')
        ->where('emergency_stocks.admin_id','=',$admin_id)
        ->get();
        return view('dashboard.stock.emergencyreport',['emergency_report'=>$emergency_report]); 
    }

    public function damageitem()
    {
        $admin_id=$this->userprofile()->admin_id;
        $damageitem=DB::table('damage_stocks')
        ->join('suppliers','damage_stocks.supplier_id','=','suppliers.id')
        ->join('items','damage_stocks.item_id','=','items.id')
        ->join('item_categories','damage_stocks.category_id','=','item_categories.id')
        ->select('damage_stocks.*','items.item_name','suppliers.supplier_name','item_categories.category_title')
        ->where('damage_stocks.admin_id','=',$admin_id)
        ->get();

        return view('dashboard.stock.damageitem',['damageitem'=>$damageitem]); 

    }
    public function damageitemsearch(Request $request)
    {
        $admin_id=$this->userprofile()->admin_id;
        $search =$request->term;
        $stockeditem=Item::where('item_name','LIKE','%'.$search.'%')
        ->where('admin_id','=',$admin_id)
        ->get();
        $data=[];
        foreach($stockeditem as $key=>$value)
        {
            $category=Item_category::where('id','=',$value->item_category)
            ->first();
            $supplier=Supplier::where('id','=',$value->supplier_id)
             ->first();
            $data[]=[
                'id' => $value->id,
                'supplier_id' => $value->supplier_id,
                'category_id' => $value->item_category,
                'name' => $value->item_name,
                'label' => $value->item_name,
                'category' => $category->category_title,
                'supplier'=>$supplier->supplier_name,
                'stock'=>$value->item_stock,
                'price'=>$value->item_price,
            ];
        }
        return response($data); 
    }
    public function damageitemupdated(Request $request)
    {
        $this->validate($request,
        [
            'item_stock'=> 'required',
        ]
        );
        $admin_id=$this->userprofile()->admin_id;
        $profile_id=$this->userprofile()->id;
        $id=$request->input('id');

        $item=new Item;
        $item->item_stock=$request->input('item_stock_old2')-$request->input('item_stock');
        $data=array(
            'item_stock' => $item->item_stock 
            );

        Item::where('id',$id)->update($data);
        $item->update();

        

        $emergencyStock=new Damage_stocks;
        $emergencyStock->item_id=$request->input('id');
        $emergencyStock->supplier_id=$request->input('supplier_id');
        $emergencyStock->category_id=$request->input('category_id');
        $emergencyStock->old_stock=$request->input('item_stock_old');
        $emergencyStock->new_stock=$request->input('item_stock');
        $emergencyStock->admin_id=$admin_id;
        $emergencyStock->user_id=$profile_id;
        $emergencyStock->save();

        return redirect('/dashboard/stock/damageitem')->with(['response'=>'Emergency Stock Added Successfully'] ); 
    }
}
