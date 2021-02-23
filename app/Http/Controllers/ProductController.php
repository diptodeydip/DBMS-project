<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\support\Facades\Redirect;
use Illuminate\support\Facades\Storage;
use App\Http\Controllers\Requests;
use File;
use Session;

session_start();

class ProductController extends Controller
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
    	return view('admin.add_product');
    }

    public function all_images($product_id)
  {
      $this->AdminAuthCheck();
      $product_info=DB::table('tbl_products')
                     ->where('tbl_products.product_id',$product_id)
                     ->first();

                    return view('admin.all_product_images')->with('product_info',$product_info);

  }

    public function all_product(){
      $this->AdminAuthCheck();
      $all_product_info=DB::table('tbl_products')
            ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
            ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
            ->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
            ->orderby('product_id','DESC')
             ->simplepaginate(10);

            //$manage_product=view('admin.all_products')->with('all_product_info',$all_product_info);
           // return view('admin_layout')->with('admin.all_product',$manage_product);

/*            echo "<pre>";

        print_r($all_product_info);
        echo "</pre>";*/

            return view('admin.all_product')->with('all_product_info',$all_product_info);
    }

    public function save_product(Request $request){
      	$data=array();
        $data['product_name']=$request->product_name;
        $data['category_id']=$request->category_id;
        $data['manufacture_id']=$request->manufacture_id;
        $data['product_description']=$request->product_description;
        $data['product_price']=$request->product_price;
        $data['product_condition']=$request->condition;
        if(is_null($request->product_size)){
         $request->product_size="--";
      }
      if(is_null($request->product_color)){
        $request->product_color="--";
      }

        if(is_null($request->publication_status)){
        $request->publication_status=0;
      }
      if(is_null($request->featured_status)){
        $request->featured_status=0;
      }
      if(is_null($request->availability)){
        $request->availability=0;
      }
        if(is_null($request->rec_status)){
        $request->rec_status=0;
      }
        $data['product_size']=$request->product_size;
        $data['product_color']=$request->product_color;
        $data['publication_status']=$request->publication_status;  
        $data['rec_status']=$request->rec_status;  
        $data['featured_status']=$request->featured_status; 
        $data['availability']=$request->availability; 

           
       $image=$request->file('product_image1');
    if ($image) {
       $image_name=str_random(20);
       $ext=strtolower($image->getClientOriginalExtension());
       $image_full_name=$image_name.'.'.$ext;
       $upload_path='image/';
       $image_url=$upload_path.$image_full_name;
       $success=$image->move($upload_path,$image_full_name);
       if ($success) {
         $data['product_image1']=$image_url;
       }
       else
    $data['product_image1']="noimage.jpg";
    }
    else{
       $data['product_image1']="noimage.jpg";
    }

    $image=$request->file('product_image2');
    if ($image) {
       $image_name=str_random(20);
       $ext=strtolower($image->getClientOriginalExtension());
       $image_full_name=$image_name.'.'.$ext;
       $upload_path='image/';
       $image_url=$upload_path.$image_full_name;
       $success=$image->move($upload_path,$image_full_name);
       if ($success) {
         $data['product_image2']=$image_url;
       }
       else
    $data['product_image2']="noimage.jpg";
    }
    else{
       $data['product_image2']="noimage.jpg";
    }

    $image=$request->file('product_image3');
    if ($image) {
       $image_name=str_random(20);
       $ext=strtolower($image->getClientOriginalExtension());
       $image_full_name=$image_name.'.'.$ext;
       $upload_path='image/';
       $image_url=$upload_path.$image_full_name;
       $success=$image->move($upload_path,$image_full_name);
       if ($success) {
         $data['product_image3']=$image_url;
       }
       else
    $data['product_image3']="noimage.jpg";
    }
    else{
       $data['product_image3']="noimage.jpg";
    }
            DB::table('tbl_products')->insert($data);
            Session::put('message','Product added successfullyyyyyyyyyy');
            return redirect('/add_product');

        }

    public function inactive_product($product_id){
      $this->AdminAuthCheck();
        DB::table('tbl_products')
        ->where('product_id',$product_id)
        ->update(['publication_status'=>0]);

        Session::put('message','Inactivated Successfully');

        return redirect('/all_product');
    }

    public function active_product($product_id){
      $this->AdminAuthCheck();
        DB::table('tbl_products')
        ->where('product_id',$product_id)
        ->update(['publication_status'=>1]);

        Session::put('message','Activated Successfully');

        return redirect('/all_product');
    }

    public function inactive_featured_status($product_id){
      $this->AdminAuthCheck();
        DB::table('tbl_products')
        ->where('product_id',$product_id)
        ->update(['featured_status'=>0]);

        Session::put('message','Unactivated Successfully');

        return redirect('/all_product');
    }

    public function active_featured_status($product_id){
      $this->AdminAuthCheck();
        DB::table('tbl_products')
        ->where('product_id',$product_id)
        ->update(['featured_status'=>1]);

        Session::put('message','Activated Successfully');

        return redirect('/all_product');
    }


    public function inactive_rec_status($product_id){
      $this->AdminAuthCheck();
        DB::table('tbl_products')
        ->where('product_id',$product_id)
        ->update(['rec_status'=>0]);

        Session::put('message','Unactivated Successfully');

        return redirect('/all_product');
    }

    public function active_rec_status($product_id){
      $this->AdminAuthCheck();
        DB::table('tbl_products')
        ->where('product_id',$product_id)
        ->update(['rec_status'=>1]);

        Session::put('message','Activated Successfully');

        return redirect('/all_product');
    }

    public function outofstock($product_id){
      $this->AdminAuthCheck();
        DB::table('tbl_products')
        ->where('product_id',$product_id)
        ->update(['availability'=>0]);

        Session::put('message','Unactivated Successfully');

        return redirect('/all_product');
    }

    public function available($product_id){
      $this->AdminAuthCheck();
        DB::table('tbl_products')
        ->where('product_id',$product_id)
        ->update(['availability'=>1]);

        Session::put('message','Activated Successfully');

        return redirect('/all_product');
    }

    public function delete_product($product_id){
      $this->AdminAuthCheck();
          $imageinfo=DB::table('tbl_products')
            ->select('product_image1','product_image2','product_image3')
            ->where('product_id',$product_id)
            ->first();

            if($imageinfo->product_image1 != 'noimage.jpg'){
              File::delete($imageinfo->product_image1);
            }
            if($imageinfo->product_image2 != 'noimage.jpg'){
              File::delete($imageinfo->product_image2);
            }
            if($imageinfo->product_image3 != 'noimage.jpg'){
              File::delete($imageinfo->product_image3);
            }


            DB::table('tbl_products')
            ->where('product_id',$product_id)
            ->delete();

            

             Session::put('message','Deleted Successfully');
       return redirect('/all_product');
    }


     public function edit_product($product_id){
      $this->AdminAuthCheck();
        $product_info=DB::table('tbl_products')
        ->where('product_id',$product_id)
        ->first();

            return view('admin.edit_product')->with('product_info',$product_info);
    }


    public function update_product($product_id , Request $request){

        $data=array();
        $data['product_name']=$request->product_name;
        $data['category_id']=$request->category_id;
        $data['manufacture_id']=$request->manufacture_id;
        $data['product_description']=$request->product_description;
        $data['product_price']=$request->product_price;
        $data['product_size']=$request->product_size;
        $data['product_color']=$request->product_color;
        $data['product_condition']=$request->condition;
        $imageinfo=DB::table('tbl_products')
            ->select('product_image1','product_image2','product_image3')
            ->where('product_id',$product_id)
            ->first();
       

       $image=$request->file('product_image1');
    if ($image) {

            //public/image folder theke ager file ta delete kore nilam
            if($imageinfo->product_image1 != 'noimage.jpg'){
              File::delete($imageinfo->product_image1);
            }
       $image_name=str_random(20);
       $ext=strtolower($image->getClientOriginalExtension());
       $image_full_name=$image_name.'.'.$ext;
       $upload_path='image/';
       $image_url=$upload_path.$image_full_name;
       $success=$image->move($upload_path,$image_full_name);
       if ($success) {
         $data['product_image1']=$image_url;
            
       }

    }


    $image=$request->file('product_image2');
    if ($image) {

            //public/image folder theke ager file ta delete kore nilam
            if($imageinfo->product_image2 != 'noimage.jpg'){
              File::delete($imageinfo->product_image2);
            }
       $image_name=str_random(20);
       $ext=strtolower($image->getClientOriginalExtension());
       $image_full_name=$image_name.'.'.$ext;
       $upload_path='image/';
       $image_url=$upload_path.$image_full_name;
       $success=$image->move($upload_path,$image_full_name);
       if ($success) {
         $data['product_image2']=$image_url;
            
       }
    }


    $image=$request->file('product_image3');
    if ($image) {

            //public/image folder theke ager file ta delete kore nilam
            if($imageinfo->product_image3 != 'noimage.jpg'){
              File::delete($imageinfo->product_image3);
            }
       $image_name=str_random(20);
       $ext=strtolower($image->getClientOriginalExtension());
       $image_full_name=$image_name.'.'.$ext;
       $upload_path='image/';
       $image_url=$upload_path.$image_full_name;
       $success=$image->move($upload_path,$image_full_name);
       if ($success) {
         $data['product_image3']=$image_url;
            
       }
    }



        DB::table('tbl_products')
        ->where('product_id',$product_id)
        ->update($data);
            Session::put('message','Updated successfully');
            return redirect('/all_product');

    }
}
