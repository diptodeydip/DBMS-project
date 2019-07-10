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

class ReviewController extends Controller
{
    public function post_review(Request $request){
      $this->UserAuthCheck();


       $data=array();

       $data['user_id']=Session::get('user_id');
        $data['product_id']=Session::get('product_id');
       $data['comment']=$request->comment;
       
       DB::table('tbl_review')
       ->insert($data);


            return redirect('/view_product/'.Session::get('product_id'));
    }


     public function delete_review($review_id){
       $this->UserAuthCheck2($review_id);

            DB::table('tbl_review')
            ->where('id',$review_id)
            ->delete();

            

            return redirect('/view_product/'.Session::get('product_id'));
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
        $review_user_id = DB::table('tbl_review')
                          ->where('id',$id)
                          ->first();

        $user_id=Session::get('user_id');
        if($user_id==$review_user_id->user_id){
            return ;
        }
        else {
            return redirect('/')->send();
        }
    }
}
