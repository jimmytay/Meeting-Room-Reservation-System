<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use Auth;


class AdminloginController extends Controller
{
  public function __construct(){
    $this->middleware('guest:admin');
  }
    public function showloginForm(){
      return view('auth.admin-login');
    }

    public function login(Request $request){
      if(Auth::guard('admin')->attempt(['email' => $request->email,'password' => $request->password],$request->remember)){
        return redirect('mrs.fullcalendar');

      }

      return redirect('mrs.fullcalendar');
    }


}
