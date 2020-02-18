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
use App\Voucher_post;
use Auth;
class AccountController extends Controller
{
    //
    public function voucher()
    {

        $admin_id=$this->userprofile()->admin_id;
        $vouchers=DB::table('voucher_posts')
        ->join('user_profiles','voucher_posts.user_id','=','user_profiles.id')
        ->select('user_profiles.user_profile_name','voucher_posts.*')
        ->where('voucher_posts.status','=',1)
        ->where('voucher_posts.admin_id','=',$admin_id)
        ->get();
        return view('dashboard.account.voucher',['items'=>$vouchers]); 


        /**/
    }

    public function voucheradded(Request $request)
    {
        
        $admin_id=$this->userprofile()->admin_id;
        $profile_id=$this->userprofile()->id;
        $voucher=new Voucher_post;
        $voucher->admin_id=$admin_id;
        $voucher->user_id=$profile_id;
        $voucher->price=$request->input('price');
        $voucher->remarks=$request->input('remarks');
        $voucher->save();

        return redirect('/dashboard/account/voucher')->with(['response'=>'Voucher Added Successfully'] ); 
    
    }




    public function income()
    {
        $admin_id=$this->userprofile()->admin_id;
        $items=DB::table('income_statements')
        ->join('user_profiles','income_statements.user_id','=','user_profiles.id')
        ->select('user_profiles.user_profile_name','income_statements.*')
        ->where('income_statements.status','=',1)
        ->where('income_statements.admin_id','=',$admin_id)
        ->get();
        return view('dashboard.account.income',['items'=>$items]); 
    }


    public function incomeadded(Request $request)
    {
        $admin_id=$this->userprofile()->admin_id;
        $profile_id=$this->userprofile()->id;
        $income=new Income_statement;
        $income->admin_id=$admin_id;
        $income->user_id=$profile_id;
        $income->itemselllist_id=0;
        $income->remarks=$request->input('remarks');
        $income->price=$request->input('price');
        $income->save();

        return redirect('/dashboard/account/income')->with(['response'=>'Statement Added Successfully'] ); 
    
    }
    
}
