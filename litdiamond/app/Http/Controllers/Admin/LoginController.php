<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use DB;

class LoginController extends Controller {

    public function index() {
        
        if(\Session::has('IsAdminLogin')) {
            return redirect('admin/dashboard');
        }
        
//        echo \Hash::make('admin');
  //      die;
        return view('admin.login');
    }
    
    public function submit_login() {
        $validator = Validator::make(Input::all(), [
            'UserName' => 'required',
            'Password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $Admin = DB::table('admin')->where('UserName', Input::get('UserName'))->first();
            if(empty($Admin)) {
                return redirect('admin')->with('error', 'Invalid Username / Password');
            } else {
                if(\Hash::check(Input::get('Password'), $Admin->Password)) {
                    \Session::put('IsAdminLogin', true);
                    \Session::put('AdminName', $Admin->AdminName);
                    return redirect('admin/dashboard');
                } else {
                    return redirect('admin')->with('error', 'Invalid Username / Password');
                }
            }
        }
    }

}
