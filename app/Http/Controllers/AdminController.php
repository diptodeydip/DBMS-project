<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\support\Facades\Redirect;
use App\Http\Requests;
use Session;

session_start();

class AdminController extends Controller
{
    //
    public function index()
    {
    	return view('admin_login');
    }

    public function admin_dashboard(Request $request)
    {
    	$admin_email=$request->admin_email;
    	$admin_password=($request->admin_password);
    	
    		$result = DB::select(
    			"select * from tbl_admin where admin_email =? AND admin_password = ?
    			",[$admin_email,$admin_password]
    		);


/*    	$result=DB::table('tbl_admin')
    	->where('admin_email',$admin_email)
    		->where('admin_password',$admin_password)
    		->first();*/

/*    	echo '<pre>';
    	print_r($result);
    	exit();*/

    	if($result){
    		Session::put('admin_name',$result[0]->admin_name);
    		Session::put('admin_id',$result[0]->admin_id);
            //echo Session::get('admin_id');
    		return redirect('/all_category');
    	}
    	else{
    		Session::put('message','Invalid Email or Password');
    		return redirect('/admin');
    	}

    }
}
