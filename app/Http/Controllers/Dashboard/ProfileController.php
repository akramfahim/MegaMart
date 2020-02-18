<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use App\Shop_category;
use App\Shop_profile;
use App\User_profile;
use Auth;
class ProfileController extends Controller
{
    //
    public function completeprofile()
    {
        $categories=Shop_category::all();
        
        return view('dashboard.completeshop',['categories'=>$categories]); 
    }
    public function finishProfile(Request $request)
    {

        $this->validate($request,
        [
            'shop_name'=> 'required',
            'shop_domain'=> 'required|unique:shop_profiles',
        ]
        );
        $user_profile=new User_profile;
        $shop_profile=new Shop_profile;
        $shop_profile->shop_name=$request->input('shop_name');
        $shop_profile->shop_category=0;
        $shop_profile->shop_domain=$request->input('shop_domain');
        $shop_profile->shop_number=$request->input('shop_number');
        $shop_profile->shop_email=$request->input('shop_email');
        $shop_profile->shop_location=$request->input('shop_location');
        $shop_profile->shop_info=$request->input('shop_info');
        if(Input::hasFile('shop_logo'))
        {
            $file=Input::file('shop_logo');
            $file->move(public_path().'/images/shopprofile/', $file->getClientOriginalName());
            $url=URL::to("/").'/images/shopprofile/'. $file->getClientOriginalName();
            $shop_profile->shop_logo= $url;
            $user_profile->user_profile_image= $url;
        }
        else
        {
            $shop_profile->shop_logo= public_path().'/images/dp.jpg';
            $user_profile->user_profile_image= public_path().'/images/dp.jpg';
        }
        $shop_profile->admin_id=Auth::user()->id;
        
        $user_profile->admin_id=Auth::user()->id;
        $user_profile->user_id=Auth::user()->id;
        $user_profile->user_profile_name=Auth::user()->name;
        $user_profile->user_profile_biography=$request->input('shop_info');
        $user_profile->user_profile_rank=1;
        
        $shop_profile->save();
        $user_profile->save();
        return redirect('/home')->with('response','Business Profile Added Successfully');
    }

}
