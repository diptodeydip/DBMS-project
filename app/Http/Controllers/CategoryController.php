<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\support\Facades\Redirect;
use App\Http\Requests;
use Session;

session_start();

class CategoryController extends Controller
{
    //
    /* public function __construct(){
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
    	return view('admin.add_category');
    }
    public function all_category(){
            $this->AdminAuthCheck();
            $all_category_info=DB::table('tbl_category')
            ->orderby('category_id','DESC')
            ->simplepaginate(10);
            //$manage_category=view('admin.all_category')->with('all_category_info',$all_category_info);
           // return view('admin_layout')->with('admin.all_category',$manage_category);

            return view('admin.all_category')->with('all_category_info',$all_category_info);

    }

    public function save_category(Request $request){
        $this->AdminAuthCheck();

    	$data=array();

    	$data['category_id']=$request->category_id;
    	$data['category_name']=$request->category_name;
    	if(is_null($request->publication_status)){
    		$request->publication_status=0;
    	}
    	$data['category_description']=$request->category_description;
    	$data['publication_status']=$request->publication_status ;


/*    	echo "<pre>";

    	print_r($data);
    	echo "</pre>";
        DB::insert('insert into tbl_category (category_name,category_description) values (?,?)',[$request->category_name,$request->category_description]);*/

   	    DB::table('tbl_category')->insert($data);

    	Session::put('message','Category added successfully');

    	return redirect('/add_category');

    }

    public function inactive_category($category_id){
        $this->AdminAuthCheck();
        DB::table('tbl_category')
        ->where('category_id',$category_id)
        ->update(['publication_status'=>0]);

        Session::put('message','Unactivated Successfully');

        return redirect('/all_category');
    }

    public function active_category($category_id){
        $this->AdminAuthCheck();
        DB::table('tbl_category')
        ->where('category_id',$category_id)
        ->update(['publication_status'=>1]);
        Session::put('message','Activated Successfully');

        return redirect('/all_category');
    }

    public function edit_category($category_id){
        $this->AdminAuthCheck();
        $category_info=DB::table('tbl_category')
        ->where('category_id',$category_id)
        ->first();

            return view('admin.edit_category')->with('category_info',$category_info);
    }


    public function update_category($category_id , Request $request){
        $this->AdminAuthCheck();

            $data=array();
            $data['category_name']=$request->category_name;
            $data['category_description']=$request->category_description;
            DB::table('tbl_category')
            ->where('category_id',$category_id)
            ->update($data);
        
        Session::put('message','Updated Successfully');
       return redirect('/all_category');
    }

    public function delete_category($category_id){
        $this->AdminAuthCheck();
            DB::table('tbl_category')
            ->where('category_id',$category_id)
            ->delete();

             Session::put('message','Deleted Successfully');
       return redirect('/all_category');
    }
}
