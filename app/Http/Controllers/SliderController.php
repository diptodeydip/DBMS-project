<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Illuminate\support\Facades\Redirect;
use Illuminate\support\Facades\Storage;
use App\Http\Controllers\Requests;
use File;
use Session;

class SliderController extends Controller
{
    //
    public function add_slider(){
    	$this->AdminAuthCheck();
    	return view('admin.add_slider');
    }

    public  function AdminAuthCheck(){
        $admin_id=Session::get('admin_id');
        if($admin_id){
            return ;
        }
        else {
          return redirect('/admin')->send();
        }
    }

    public function all_slider(){
    	$this->AdminAuthCheck();
            $all_slider_info=DB::table('tbl_slider')
            ->orderby('slider_id','DESC')
            ->simplepaginate(5);
            //$manage_category=view('admin.all_category')->with('all_category_info',$all_category_info);
           // return view('admin_layout')->with('admin.all_category',$manage_category);

            return view('admin.all_slider')->with('all_slider_info',$all_slider_info);
    }

    public function save_slider(Request $request){
    	$this->AdminAuthCheck();
      	$data=array();
        
        if(is_null($request->publication_status)){
        $request->publication_status=0;
      }
        $data['publication_status']=$request->publication_status;  

           
       $image=$request->file('slider_image');
    if ($image) {
       $image_name=str_random(20);
       $ext=strtolower($image->getClientOriginalExtension());
       $image_full_name=$image_name.'.'.$ext;
       $upload_path='slider/';
       $image_url=$upload_path.$image_full_name;
       $success=$image->move($upload_path,$image_full_name);
       if ($success) {
         $data['slider_image']=$image_url;
            DB::table('tbl_slider')->insert($data);
            Session::put('message','Slider added successfully');
            return redirect('/add_slider');
       }
    }
    }


    public function inactive_slider($slider_id){
      $this->AdminAuthCheck();
        DB::table('tbl_slider')
        ->where('slider_id',$slider_id)
        ->update(['publication_status'=>0]);

        Session::put('message','Inactivated Successfully');

        return redirect('/all_slider');
    }

    public function active_slider($slider_id){
      $this->AdminAuthCheck();
        DB::table('tbl_slider')
        ->where('slider_id',$slider_id)
        ->update(['publication_status'=>1]);

        Session::put('message','Activated Successfully');

        return redirect('/all_slider');
    }

     public function delete_slider($slider_id){
      $this->AdminAuthCheck();
          $imageinfo=DB::table('tbl_slider')
            ->select('slider_image')
            ->where('slider_id',$slider_id)
            ->first();
            
            DB::table('tbl_slider')
            ->where('slider_id',$slider_id)
            ->delete();
            File::delete($imageinfo->slider_image);
             Session::put('message','Deleted Successfully');
       return redirect('/all_slider');
    }
}
