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
use Auth;
class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function shopSetting()
    {
        $user_id=Auth::user()->id;
        $admin_id=$this->userprofile()->admin_id;

        $categories=Shop_category::all();
        $shopprofile=Shop_profile::where('admin_id','=',$admin_id)
        ->first();
        return view('dashboard.settings.shopsettings',['url'=>$admin_id,'categories'=>$categories,'shopprofile'=>$shopprofile]); 
    }
    public function settingsUpdate(Request $request)
    {
        $admin_id=$this->userprofile()->admin_id;
        $this->validate($request,
        [
            'shop_category'=> 'required',
            'shop_name'=> 'required',
        ]
        );

        $user_id=Auth::user()->id;
        $categories=Shop_category::all();
        $shopprofile=Shop_profile::where('admin_id','=',$admin_id)
        ->first();
        // dateget
        $shop_profile=new Shop_profile;
        $shop_profile->shop_name=$request->input('shop_name');
        $shop_profile->shop_category=$request->input('shop_category');
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
        }
        else
        {
            $shop_profile->shop_logo= URL::to("/").'/images/3.png';
        }
        $shop_profile->admin_id=Auth::user()->id;
        //datapass
        $data=array(
            'shop_name' => $shop_profile->shop_name ,
            'shop_category' =>$shop_profile->shop_category,
            'shop_number' =>$shop_profile->shop_number,
            'shop_email' =>$shop_profile->shop_email,    
            'shop_location' => $shop_profile->shop_location ,
            'shop_info' => $shop_profile->shop_info,
            'shop_logo' => $shop_profile->shop_logo
        );
        Shop_profile::where('admin_id',$admin_id)->update($data);
        $shop_profile->update();
        return view('dashboard.settings.shopsettings',['categories'=>$categories,'shopprofile'=>$shopprofile])->with('response','Shop Setting Updated Successfully');
    }


    public function employee()
    {
        $admin_id=$this->userprofile()->admin_id;
        $users=DB::table('user_profiles')
        ->join('users','user_profiles.user_id','=','users.id')
        ->select('users.email','user_profiles.*')
        ->where('user_profiles.admin_id','=',$admin_id)
        ->where('user_profiles.status','=',1)
        ->where('user_profiles.user_profile_rank','=',21)
        ->get();
        return view('dashboard.settings.employee',['users'=>$users]); 
    }

    public function employeeadded(Request $request)
    {
        $admin_id=$this->userprofile()->admin_id;
        $users=DB::table('user_profiles')
        ->join('users','user_profiles.user_id','=','users.id')
        ->select('users.email','user_profiles.*')
        ->where('user_profiles.admin_id','=',$admin_id)
        ->where('user_profiles.status','=',1)
        ->where('user_profiles.user_profile_rank','=',21)
        ->get();

        
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
        $user->password=bcrypt($request->input('email'));
        $user->save();
        /////suer profile
        $last_user_id=User::orderBy('created_at', 'desc')->first();

        $user_profile=new User_profile;
        $user_profile->user_profile_name=$request->input('user_profile_name');
        $user_profile->user_profile_number=$request->input('user_profile_number');
        $user_profile->admin_id=$admin_id;
        $user_profile->user_id=$last_user_id->id;
        $user_profile->user_profile_rank=21;
      //  $user->customer_id=uniqid('MOD');
        $user_profile->save();



        return redirect('dashboard/settings/employeelist')->with(['users'=>$users,'response'=>'Employee Added Successfully'] ); 
    }
    public function employeedeleted($id)
    {
        $admin_id=$this->userprofile()->admin_id;
        $users=DB::table('user_profiles')
        ->join('users','user_profiles.user_id','=','users.id')
        ->select('users.email','user_profiles.*')
        ->where('user_profiles.admin_id','=',$admin_id)
        ->where('user_profiles.status','=',1)
        ->where('user_profiles.user_profile_rank','=',21)
        ->get();
        $user=new User_profile;
        $user->status=0;
        $data=array(
            'status' => 0 
                );

        User_profile::where('id',$id)->update($data);
        $user->update();
        return redirect('dashboard/settings/employeelist')->with(['users'=>$users,'response'=>'Employee Deleted Successfully'] ); 
    }
    
    public function admin()
    {
        $admin_id=$this->userprofile()->admin_id;
        $user_id=Auth::user()->id;
        $users=DB::table('user_profiles')
        ->join('users','user_profiles.user_id','=','users.id')
        ->select('users.email','user_profiles.*')
        ->where('user_profiles.admin_id','=',$admin_id)
        ->where('user_profiles.user_id','=',$user_id)
        ->where('user_profiles.status','=',1)
        ->first();
        return view('dashboard.settings.admin',['users'=>$users]); 
    }
    
    public function adminupdated(Request $request)
    {
        $admin_id=$this->userprofile()->admin_id;
        $profile_id=$this->userprofile()->id;
        $user_id=Auth::user()->id;
        $users=DB::table('user_profiles')
        ->join('users','user_profiles.user_id','=','users.id')
        ->select('users.email','user_profiles.*')
        ->where('user_profiles.admin_id','=',$admin_id)
        ->where('user_profiles.user_id','=',$user_id)
        ->where('user_profiles.status','=',1)
        ->first();

        $user=new User_profile;
        $user->user_profile_name=$request->input('user_profile_name');
        $user->user_profile_number=$request->input('user_profile_number');
        $user->user_profile_image=$request->input('user_profile_image');
        if($request->input('user_profile_image')!=$users->user_profile_image)
        {
            $file=Input::file('user_profile_image');
            $file->move(public_path().'/images/shopprofile/', $file->getClientOriginalName());
            $url=URL::to("/").'/images/shopprofile/'. $file->getClientOriginalName();
            $user->user_profile_image= $url;
        }
        $data=array(
            'user_profile_name' => $user->user_profile_name ,
            'user_profile_number' => $user->user_profile_number ,
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
        return redirect('/dashboard/settings/adminsettings')->with(['users'=>$users,'response'=>'Profile Updated Successfully'] ); 
    }
    public function resetpassword(Request $request)
    {
        $this->validateEmail($request);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );
    
        return $response == Password::RESET_LINK_SENT
                    ? $this->sendResetLinkResponse($response)
                    : $this->sendResetLinkFailedResponse($request, $response);
    
    }
    public function password(Request $request)
    {
        $this->validate($request,
            [
                
                'password' => 'required|string|min:6|confirmed'
            ]
            );
        $admin_id=$this->userprofile()->admin_id;
        $user_id=Auth::user()->id;
        $users=DB::table('user_profiles')
        ->join('users','user_profiles.user_id','=','users.id')
        ->select('users.email','user_profiles.*')
        ->where('user_profiles.admin_id','=',$admin_id)
        ->where('user_profiles.user_id','=',$user_id)
        ->where('user_profiles.status','=',1)
        ->first();
        $user=new User;
        $user->password=bcrypt($request->input('password'));
                $data=array(
            'password' => $user->password
                );

                User::where('id',$id)->update($data);
        $user->update();
        return redirect('dashboard/settings/adminsettings')->with(['users'=>$users,'response'=>'Password Updated Successfully'] ); 
    }



}
