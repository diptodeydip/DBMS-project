<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\support\Facades\Redirect;
use App\Http\Requests;
use Session;

session_start();

class ManufactureController extends Controller
{
    //
    /*public function __construct(){
        $this->AdminAuthCheck();
    }*/

    public  function AdminAuthCheck(){
        $admin_id=Session::get('admin_id');
        if($admin_id){
            return ;
        }
        else {
            return redirect('/admin')->send();
        }
    }

    public function index(){
        $this->AdminAuthCheck();
    	return view('admin.add_manufacture');
    }

    public function all_manufacture(){
        $this->AdminAuthCheck();
           $all_manufacture_info=DB::table('tbl_manufacture')
            ->orderby('manufacture_id','DESC')
             ->simplepaginate(10);
            //$manage_category=view('admin.all_category')->with('allcategoryinfo',$allcategory);
           // return view('admin_layout')->with('admin.all_category',$manage_category);

            return view('admin.all_manufacture')->with('all_manufacture_info',$all_manufacture_info);
        }

    public function save_manufacture(Request $request){
        $this->AdminAuthCheck();
    	$data=array();

    	//$data['category_id']=$request->category_id;
    	$data['manufacture_name']=$request->manufacture_name;
    	if(is_null($request->publication_status)){
    		$request->publication_status=0;
    	}
    	$data['manufacture_description']=$request->manufacture_description;
    	$data['publication_status']=$request->publication_status ;



/*    	echo "<pre>";

    	print_r($data);
    	echo "</pre>";*/
       // DB::insert('insert into tbl_category (category_name,category_description) values (?,?)',[$request->category_name,$request->category_description]);

   	    DB::table('tbl_manufacture')->insert($data);
    	Session::put('message','Manufacture added successfully');

    	return redirect('/add_manufacture');

    }

    public function inactive_manufacture($manufacture_id){
        $this->AdminAuthCheck();
        DB::table('tbl_manufacture')
        ->where('manufacture_id',$manufacture_id)
        ->update(['publication_status'=>0]);

        Session::put('message','Inactivated Successfully');

        return redirect('/all_manufacture');
    }

    public function active_manufacture($manufacture_id){
        $this->AdminAuthCheck();
        DB::table('tbl_manufacture')
        ->where('manufacture_id',$manufacture_id)
        ->update(['publication_status'=>1]);
        Session::put('message','Activated Successfully');

        return redirect('/all_manufacture');
    }

    public function edit_manufacture($manufacture_id){
        $this->AdminAuthCheck();
        $manufacture_info=DB::table('tbl_manufacture')
        ->where('manufacture_id',$manufacture_id)
        ->first();

            return view('admin.edit_manufacture')->with('manufacture_info',$manufacture_info);
    }


    public function update_manufacture($manufacture_id , Request $request){
            $this->AdminAuthCheck();
            $data=array();
            $data['manufacture_name']=$request->manufacture_name;
            $data['manufacture_description']=$request->manufacture_description;
            DB::table('tbl_manufacture')
            ->where('manufacture_id',$manufacture_id)
            ->update($data);
        
        Session::put('message','Updated Successfully');
       return redirect('/all_manufacture');
    }



    public function delete_manufacture($manufacture_id){
        $this->AdminAuthCheck();
            DB::table('tbl_manufacture')
            ->where('manufacture_id',$manufacture_id)
            ->delete();

             Session::put('message','Deleted Successfully');
       return redirect('/all_manufacture');
    }

}
