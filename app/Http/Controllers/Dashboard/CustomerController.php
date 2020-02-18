<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use App\Page_info;
use App\User_profile;
use App\Customer;
use App\Item;
use App\Supplier;
use App\Item_category;
use Auth;


class CustomerController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function localcustomer()
    {
        /*$admin_id=$this->userprofile()->admin_id;
        $users=User_profile::where('admin_id','=',$admin_id)
        ->where('status','=',1)
        ->where('user_profile_rank','=',11)
        ->get();*/

        $admin_id=$this->userprofile()->admin_id;
        $customers=Customer::where('admin_id','=',$admin_id)
        ->where('status','=',1)
        ->orderBy('updated_at', 'desc')
        ->get();

        return view('dashboard.customer.localcustomerlist',['users'=>$customers]); 
    }


    public function addedcustomer(Request $request)
    {
        
        $admin_id=$this->userprofile()->admin_id;
        $users=User_profile::where('admin_id','=',$admin_id)
        ->where('status','=',1)
        ->where('user_profile_rank','=',11)
        ->get();
        
        $this->validate($request,[
                'user_profile_name'=> 'required',
            ]
        );

        /*
        $user=new User_profile;
        $user->user_profile_name=$request->input('user_profile_name');
        $user->user_profile_number=$request->input('user_profile_number');
        $user->admin_id=$admin_id;
        $user->user_profile_rank=11;
        $user->user_spended=0;
        $user->save();
        */

        $customer = new Customer;
        $customer->customer_name = $request->input('user_profile_name');
        $customer->number_number = $request->input('user_profile_number');
        $customer->admin_id=$admin_id;
        $customer->save();

        return redirect('dashboard/customer/localcustomer')->with(['users'=>$users,'response'=>'Customer Added Successfully'] ); 
    }
    public function localcustomerdeleted($id)
    {
        
        $admin_id=$this->userprofile()->admin_id;
        $customers=Customer::where('admin_id','=',$admin_id)
        ->get();
        $customer=new Customer;
        $customer->status=0;
        $data=array(
            'status' => 0 
                );

        Customer::where('id',$id)->update($data);
        $customer->update();

        /*$admin_id=$this->userprofile()->admin_id;
        $users=User_profile::where('admin_id','=',$admin_id)
        ->where('status','=',1)
        ->where('user_profile_rank','=',11)
        ->get();
        $user=new User_profile;
        $user->status=0;
        $data=array(
            'status' => 0 
                );

        User_profile::where('id',$id)->update($data);
        $user->update();*/
        return redirect('dashboard/customer/localcustomer')->with(['users'=>$customers,'response'=>'Customer Deleted Successfully'] ); 
    }

    public function order ()
    {
        $admin_id=$this->userprofile()->admin_id;
        $order=DB::table('orders')
        ->join('addresses','orders.address_id','=','addresses.id')
        ->join('item_cart_lists','orders.cart_id','=','item_cart_lists.id')
        ->select('addresses.*','item_cart_lists.item_id')
        ->get();
        return view('dashboard.customer.order',['orders'=>$order]); 
    }
        public function orderedit($id)
    {
        // $order=DB::table('orders')
        // ->join('addresses','orders.address_id','=','addresses.id')
        // ->join('item_cart_lists','orders.cart_id','=','item_cart_lists.id')
        // ->select('item_cart_lists.id','address_id.*','item_cart_lists.item_id')
        // ->where('orders.status','=',1)
        // ->get();
        // $order=new Order;
        // $order->status=0;
        // $data=array(
        //     'status' => 0 
        //         );

        // Order::where('id',$id)->update($data);
        // $order->update();
        return redirect('/dashboard/customer/order')->with(['users'=>$users,'response'=>'Order Clear Successfully'] ); 
    }

}
