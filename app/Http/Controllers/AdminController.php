<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use Illuminate\Support\Facades\Redirect;

use Session;

session_start();




class AdminController extends Controller
{
	public function admin_dashboard(){

		return view('admin.dashboard');

	}
    
    






    //login dashboard option for admin....


    public function login_dashboard(Request $request){  //admin login koranor jonno ...

    	//return view('admin.dashboard');

    	$email = $request->admin_email;

    	$password = md5($request->admin_password);

    	$result = DB::table('admin_tbl')

    	->where('admin_email',$email)
    	->where('admin_password',$password)
    	->first();

    /*	echo "</pre>";
    	print_r($result);
	*/


    	if($result){

    		Session::put('admin_email', $result->admin_email);
    		Session::put('admin_id', $result->admin_id);
    		return Redirect::to('/admin_dashboard');
    		
    	}else{

    		Session::put('exception', 'Email or password invalid');
    		return Redirect::to('/backend');
    	}
    }


    //logout option for admin......

    public function logout()
    {
        Session::put('admin_name', null);
        Session::put('admin_id', null);

        return Redirect::to('/backend');
    }


    //view profile part are here ....

    public function viewprofile(){

        return view('admin.view');

    }
    

    //Setting part....that means udate password....

    public function setting(){

        return view('admin.setting');

    }
    
    
    
}
