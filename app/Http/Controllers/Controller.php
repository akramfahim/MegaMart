<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function userprofile()
    {
        $user_id=Auth::user()->id;
        $user_profile=DB::table('user_profiles')
        ->join('users','user_profiles.user_id','=','users.id')
        ->select('user_profiles.*')
        ->where('user_id','=',$user_id)
        ->first();
        return $user_profile;
        
    }
}
