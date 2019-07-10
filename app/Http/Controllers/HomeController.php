<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Illuminate\support\Facades\Redirect;
use App\Http\Requests;
use Session;
use File;
use Illuminate\Support\Facades\Mail;

session_start();
class HomeController extends Controller
{
    
    public function index()
    {

      /*Mail::send('sendView',['name'=> 'Dipto'],function($data){
        $data->to('dipdey092@gmail.com','Some guy')->subject('Welcome');
      });*/

      $all_published_product=DB::table('tbl_products')
                     ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                     ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
                     ->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
                     ->where('tbl_products.publication_status', 1)
                     ->where('tbl_products.featured_status', 1)
                     ->orderby('product_id','DESC')
                      ->simplepaginate(12);
                     ;

        return view('pages.home_content')->with('all_published_product',$all_published_product);
    }


  public function product_by_category($category_id)
  {
     $all_product_info=DB::table('tbl_products')
                     ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                     ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
                     ->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
                     ->where('tbl_category.category_id',$category_id)
                     ->where('tbl_products.publication_status',1)
                     ->orderby('product_id','DESC')
                     ->simplepaginate(12);
                     ;

       return view('pages.product_by_category')->with('all_product_info',$all_product_info);
 
  }


  public function product_by_search(Request $request)
  {
    if($request->price_range==0){
     $all_product_info=DB::table('tbl_products')
                     ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                     ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
                     ->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
                     ->where('tbl_products.category_id',$request->category_id)
                     ->where('tbl_products.manufacture_id',$request->manufacture_id)
                     ->where('tbl_products.publication_status',1)
                     ->orderby('product_id','DESC')
                     ->simplepaginate(9);
                     ;
      }

      else if($request->price_range==5){
         $all_product_info=DB::table('tbl_products')
                     ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                     ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
                     ->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
                     ->where('tbl_products.category_id',$request->category_id)
                     ->where('tbl_products.manufacture_id',$request->manufacture_id)
                     ->where('tbl_products.product_price','>',20000)
                     ->where('tbl_products.publication_status',1)
                     ->orderby('product_id','DESC')
                     ->simplepaginate(9);
                     ;
      }
      else{
        if($request->price_range==1)
          {
            $minprice=0;
            $maxprice=5000;
          }
          else if($request->price_range==2)
          {
            $minprice=5001;
            $maxprice=10000;
          }else if($request->price_range==3)
          {
            $minprice=10001;
            $maxprice=15000;
          }
          else if($request->price_range==4)
          {
            $minprice=15001;
            $maxprice=20000;
          }
        $all_product_info=DB::table('tbl_products')
                     ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                     ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
                     ->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
                     ->where('tbl_products.category_id',$request->category_id)
                     ->where('tbl_products.manufacture_id',$request->manufacture_id)
                     ->where('tbl_products.product_price','>=',$minprice)
                     ->where('tbl_products.product_price','<=',$maxprice)
                     ->where('tbl_products.publication_status',1)
                     ->orderby('product_id','DESC')
                     ->simplepaginate(12);
                     ;
      }

       return view('pages.product_by_search')->with('all_product_info',$all_product_info);
  }

  public function product_by_search2(Request $request)
  {
     $all_product_info=DB::table('tbl_products')
                      ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                     ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
                     ->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
                     ->where('tbl_products.publication_status',1)
                     ->where('tbl_products.product_name','like','%'.$request->product_name.'%')
                     ->orderby('product_id','DESC')
                     ->paginate(16)
                     ;

       return view('pages.product_by_search2')->with('all_product_info',$all_product_info)
            ->with('search_name',$request->product_name)
       ;
 
  }

  public function products()
  {
     $all_product_info=DB::table('tbl_products')
                      ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                     ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
                     ->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
                     ->where('tbl_products.publication_status',1)
                     ->orderby('product_id','DESC')
                     ->paginate(9)
                     ;

       return view('pages.products')->with('all_product_info',$all_product_info);
 
  }


    public function product_by_manufacture($manufacture_id)
  {
      $all_product_info=DB::table('tbl_products')
                     ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                     ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
                     ->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
                     ->where('tbl_manufacture.manufacture_id',$manufacture_id)
                     ->where('tbl_products.publication_status',1)
                     ->orderby('product_id','DESC')
                     ->simplepaginate(12);
                     ;

       return view('pages.product_by_manufacture')->with('all_product_info',$all_product_info); 
 
  }

  public function all_images($product_id)
  {
      $this->UserAuthCheck();
      $product_info=DB::table('tbl_products')
                     ->where('tbl_products.product_id',$product_id)
                     ->first();

                    return view('pages.all_images')->with('product_info',$product_info);

  }
  
  public function view_product($product_id)
  {
        $this->UserAuthCheck();
        Session::put('product_id',$product_id);
       $product_info=DB::table('tbl_products')
                     ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                     ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
                     ->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
                     ->where('tbl_products.product_id',$product_id)
                     ->where('tbl_products.publication_status',1)
                     ->first();

      $reviews=DB::table('tbl_review')
                     ->join('tbl_users','tbl_review.user_id','=','tbl_users.id')
                     ->where('tbl_review.product_id',$product_id)
                     ->select('tbl_review.*','tbl_users.name','tbl_users.email')
                     ->orderby('id','DESC')
                     ->paginate(3);

        $user_info = DB::table('tbl_users')
            ->where('id',$product_info->user_id)
            ->first();

        if($user_info->user_type =="Teacher"){
            $user_info_type=DB::table('tbl_teacher')
            ->where('user_id',$product_info->user_id)
            ->first();
        }
        else if($user_info->user_type=="Employee"){
            $user_info_type=DB::table('tbl_employee')
            ->where('user_id',$product_info->user_id)
            ->first();
        }
        else{
            $user_info_type=DB::table('tbl_student')
            ->where('user_id',$product_info->user_id)
            ->first();;
        }

       return view('pages.product_details')->with('product_info',$product_info)
       ->with('user_info',$user_info)
       ->with('user_info_type', $user_info_type)
       ->with('reviews', $reviews);   
  }




    public function save_ad(Request $request){
       $this->UserAuthCheck();
      $data=array();
        $data['product_name']=$request->product_name;
        $data['category_id']=$request->category_id;
        $data['user_id']=Session::get('user_id');
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
            return redirect('/my_ads');

    }

    

    public function my_ads(){
      $this->UserAuthCheck();
      $all_product_info=DB::table('tbl_products')
            ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
            ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
            ->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
            ->where('user_id',Session::get('user_id'))
            ->orderby('product_id','DESC')
            //->get();
            ->paginate(4);

            //$manage_product=view('admin.all_products')->with('all_product_info',$all_product_info);
           // return view('admin_layout')->with('admin.all_product',$manage_product);

/*            echo "<pre>";

        print_r($all_product_info);
        echo "</pre>";*/

            return view('pages.my_ads')->with('all_product_info',$all_product_info);
    }

    public function availableproducts(){
      $this->UserAuthCheck();
      $all_product_info=DB::table('tbl_products')
            ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
            ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
            ->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
            ->where('user_id',Session::get('user_id'))
            ->where('availability',1)
            ->orderby('product_id','DESC')
            //->get();
            ->paginate(4);
            return view('pages.availableproducts')->with('all_product_info',$all_product_info);
    }
    public function outofstockproducts(){
      $this->UserAuthCheck();
      $all_product_info=DB::table('tbl_products')
            ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
            ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
            ->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
            ->where('user_id',Session::get('user_id'))
            ->where('availability',0)
            ->orderby('product_id','DESC')
            //->get();
            ->paginate(4);
            return view('pages.outofstockproducts')->with('all_product_info',$all_product_info);
    }



    public function delete_ad($product_id){
       $this->UserAuthCheck2($product_id);
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
             return redirect('/my_ads');
    }


     public function edit_ad($product_id){
       $this->UserAuthCheck2($product_id);
        $product_info=DB::table('tbl_products')
        ->where('product_id',$product_id)
        ->first();

            return view('pages.edit_ad')->with('product_info',$product_info);
    }


    public function update_ad($product_id, Request $request){
             $this->UserAuthCheck2($product_id);

            $data=array();
        $data['product_name']=$request->product_name;
        $data['category_id']=$request->category_id;
        $data['manufacture_id']=$request->manufacture_id;
        $data['product_description']=$request->product_description;
        $data['product_price']=$request->product_price;
        $data['product_size']=$request->product_size;
        $data['product_color']=$request->product_color;
        $data['product_condition']=$request->condition;

         if(is_null($request->availability)){
        $request->availability=0;
        }

        $data['availability']=$request->availability; 
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
            return redirect('/my_ads');

    }


      public  function UserAuthCheck(){
        $user_id=Session::get('user_id');
        if($user_id){
            return ;
        }
        else {
            return redirect('/user_login_page')->send();
        }
    }

    public  function UserAuthCheck2($id){
        $product_user_id = DB::table('tbl_products')
                          ->where('product_id',$id)
                          ->first();

        $user_id=Session::get('user_id');
        if($user_id==$product_user_id->user_id){
            return ;
        }
        else {
            return redirect('/')->send();
        }
    }

}