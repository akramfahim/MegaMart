<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Supplier;
use App\Page_info;
use Auth;
class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function suppliersList()
    {
        $admin_id=$this->userprofile()->admin_id;
        $suppliers=Supplier::where('admin_id','=',$admin_id)
        ->where('status','=',1)
        ->get();
        return view('dashboard.supplier.supplierlist',['suppliers'=>$suppliers]); 
    }
    public function addsuppliers()
    {
        $page_info=Page_info::where('page_id','=','62')
        ->first();
        return view('dashboard.supplier.addsuppliers',['page_info'=>$page_info]); 
    }

    public function addsupplierfinish(Request $request)
    {
        $admin_id=$this->userprofile()->admin_id;
        $this->validate($request,
            [
                'supplier_name'=> 'required',
            ]
            );
        $supplier=new Supplier;
        $supplier->supplier_name=$request->input('supplier_name');
        $supplier->supplier_number=$request->input('supplier_number');
        $supplier->supplier_address=$request->input('supplier_address');
        $supplier->supplier_email=$request->input('supplier_email');
        $supplier->admin_id=$admin_id;
        $supplier->save();
        return redirect('/dashboard/suppliers/add')->with('response','Supplier Added Successfully');
    }
    public function editsuppliers($id)
    {
        $admin_id=$this->userprofile()->admin_id;
        $suppliers=Supplier::where('id','=',$id)
        ->first();
        $page_info=Page_info::where('page_id','=','62')
        ->first();
        return view('dashboard.supplier.updatesupplier',['supplier'=>$suppliers,'page_info'=>$page_info]); 
    }
    public function updatesupplierfinish(Request $request)
    {
        $admin_id=$this->userprofile()->admin_id;
        $suppliers=Supplier::where('admin_id','=',$admin_id)
        ->get();

        $this->validate($request,
            [
                'supplier_name'=> 'required',
            ]
            );

        $supplier=new Supplier;
        $id=$request->input('id');
        $supplier->supplier_name=$request->input('supplier_name');
        $supplier->supplier_address=$request->input('supplier_address');
        $supplier->supplier_number=$request->input('supplier_number');
        $supplier->supplier_email=$request->input('supplier_email');
        $data=array(
            'supplier_name' => $supplier->supplier_name ,
            'supplier_address' =>$supplier->supplier_address,
            'supplier_number' =>$supplier->supplier_number,
            'supplier_email' =>$supplier->supplier_email, 
        );

        Supplier::where('id',$id)->update($data);
        $supplier->update();
        return redirect('dashboard/suppliers/list')->with(['suppliers'=>$suppliers,'response'=>'Supplier Added Successfully'] ); 
    }
    public function deletesuppliers($id)
    {
        $admin_id=$this->userprofile()->admin_id;
        $suppliers=Supplier::where('admin_id','=',$admin_id)
        ->get();
        $supplier=new Supplier;
        $supplier->status=0;
        $data=array(
            'status' => 0 
                );

        Supplier::where('id',$id)->update($data);
        $supplier->update();
        return redirect('dashboard/suppliers/list')->with(['suppliers'=>$suppliers,'response'=>'Supplier Deleted Successfully'] ); 
    }

        
}
