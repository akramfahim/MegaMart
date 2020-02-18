<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use App\Page_info;
use App\User_profile;
use App\Voucher_post;
use App\Income_statement;
use App\Customer;
use App\Item;
use App\Supplier;
use App\Sale_item;
use App\Sale_item_list;
use App\Item_category;
use App\Shop_profile;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
            $admin_id=$this->userprofile()->admin_id;
            $users=User_profile::where('admin_id','=',$admin_id)
            ->where('status','=',1)
            //->where('user_profile_rank','=',11)
            ->get();
            $total_user=count($users);

            $sale_item=Sale_item_list::where('status','=',1)
            ->where('admin_id','=',$admin_id)
            ->get();
            $total_si=count($sale_item);
            $total_invoice=Income_statement::where('admin_id','=',$admin_id)
            ->where('status','=',1)
            ->get();
            $total_i=count($total_invoice);
            $total_voucher=Voucher_post::where('admin_id','=',$admin_id)
            ->where('status','=',1)
            ->get();
            $total_v=count($total_voucher);



            $cash=0;
            $totalAmountVoucher=0;

            /*if($total_v>0)*/
            if(count($total_v)>0)
            {
                
                foreach($total_voucher->all() as $voucher)
                {
                    $totalAmountVoucher = $totalAmountVoucher + $voucher->price;
                    $cash=$cash+ $voucher->price;
                }
            }
            $totalAmountIncome=0;
            if(count($total_i)>0)
            {
                
                foreach($total_invoice->all() as $income)
                {
                    $totalAmountIncome = $totalAmountIncome + $income->price;
                    $cash=$cash - $income->price;
                }
            }


        $admin_id=$this->userprofile()->admin_id;
        $shopprofile=Shop_profile::where('admin_id','=',$admin_id)
        ->first();

        return view('home',['total_user'=>$total_user,
        'total_items'=>$total_si,
        'total_voucher'=>$total_v,
        'total_invoics'=>$total_i,
        'voucher'=>$totalAmountVoucher,
        'income'=>$totalAmountIncome,
        'account'=>$cash,
        'shopprofile'=>$shopprofile
        ]);
    }
}