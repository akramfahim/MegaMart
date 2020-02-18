<?php

namespace App\Http\Controllers\Ecommerce;

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
use Auth;

class UserController extends Controller
{
    //
    public function user()
    {
        $user_id=Auth::user()->id;
        $users=DB::table('user_profiles')
        ->join('users','user_profiles.user_id','=','users.id')
        ->select('users.*','user_profiles.*')
        ->where('user_profiles.user_id','=',$user_id)
        ->where('user_profiles.status','=',1)
        ->first();
        return view('shop.user.user',['users'=>$users]);
    }
    public function shippingaddress()
    {
        $user_id=Auth::user()->id;
        $users=DB::table('user_profiles')
        ->join('users','user_profiles.user_id','=','users.id')
        ->select('users.*','user_profiles.*')
        ->where('user_profiles.user_id','=',$user_id)
        ->where('user_profiles.status','=',1)
        ->first();
        return view('shop.user.shippingaddress',['users'=>$users]);
    }
    public function orderlist()
    {
        $user_id=Auth::user()->id;
        $users=DB::table('user_profiles')
        ->join('users','user_profiles.user_id','=','users.id')
        ->select('users.*','user_profiles.*')
        ->where('user_profiles.user_id','=',$user_id)
        ->where('user_profiles.status','=',1)
        ->first();
        $order=DB::table('item_cart_lists')
        ->where('user_id','=',$user_id)
        ->where('status','=',1)
        ->get();
        return view('shop.user.orderlist',['users'=>$users,'orders'=>$order]);
    }
    public function loginsignup()
    {
        return view('shop.user.loginsignup');
    }
    public function login(Request $request)
    {
        if(Auth::attempt(
            [
                'email'=> $request->email,
                'password'=> $request->password
            ]
        ))
        {
            $user=User::where('email',$request->email)->first();
            return redirect()->route('shop');
        }
        return redirect()->back();

        //return view('shop.user.loginsignup');
    }
    
    public function useradded(Request $request)
    {
        $admin_id=$this->userprofile()->admin_id;
        $this->validate($request,
            [
                'user_profile_name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
                'user_profile_number'=> 'required',
            ]
            );
        $user=new User;
        $user->name=$request->input('user_profile_name');
        $user->email=$request->input('email');
        $user->password=bcrypt($request->input('password'));
        $user->save();
        /////suer profile
        $last_user_id=User::orderBy('created_at', 'desc')->first();

        $user_profile=new User_profile;
        $user_profile->user_profile_name=$request->input('user_profile_name');
        $user_profile->user_profile_number=$request->input('user_profile_number');
        $user_profile->admin_id=$admin_id;
        $user_profile->user_id=$last_user_id->id;
        $user_profile->user_profile_rank=11;
      //  $user->customer_id=uniqid('MOD');
        $user_profile->save();



        return redirect('shop'); 
    }
    public function userupdated (Request $request)
    {
        $user_id=Auth::user()->id;
        $profile_id=$this->userprofile()->id;
        $users=DB::table('user_profiles')
        ->join('users','user_profiles.user_id','=','users.id')
        ->select('users.*','user_profiles.*')
        ->where('user_profiles.user_id','=',$user_id)
        ->where('user_profiles.status','=',1)
        ->first();

        $user=new User_profile;
        $user->user_profile_name=$request->input('user_profile_name');
        $user->user_profile_number=$request->input('user_profile_number');
        $user->user_profile_biography=$request->input('user_profile_biography');
        $user->user_profile_image=$request->input('user_profile_imageexist');
        if($request->hasFile('user_profile_image') )
        {
            $file=Input::file('user_profile_image');
            $file->move(public_path().'/images/shopprofile/', $file->getClientOriginalName());
            $url=URL::to("/").'/images/shopprofile/'. $file->getClientOriginalName();
            $user->user_profile_image= $url;
        }
        $data=array(
            'user_profile_name' => $user->user_profile_name ,
            'user_profile_number' => $user->user_profile_number ,
            'user_profile_biography' => $user->user_profile_biography ,
            'user_profile_image' => $user->user_profile_image 
            );

        User_profile::where('id',$profile_id)->update($data);
        $user->update();

        $user=new User;
        $user->name=$request->input('user_profile_name');
        $data=array(
            'name' => $user->name ,
            );

        User::where('id',$user_id)->update($data);
        $user->update();
        return redirect('/shop/user')->with(['users'=>$users,'response'=>'Profile Updated Successfully'] ); 
    }
}
