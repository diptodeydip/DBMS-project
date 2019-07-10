<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use Session;
use File;
use Illuminate\Support\Facades\Mail;
use App\Mail\verifyEmail;
use App\Mail\send_Password;

session_start();

class UserController extends Controller
{
    //
    public function user_login_page(){
       // echo "ok";
    	return view('pages.user_login_page');
    }

    public function user_registration_page(){
       // echo "ok";
        return view('pages.user_profession_info');
    }
    
    public function user_login(Request $request){

    	$email=$request->user_email;
        $password=($request->password);
        
            $result = DB::select(
                "select * from tbl_users where email =? AND password = ?
                ",[$email,$password]
            );

        if($result){

            if($result[0]->status==0){
                Session::put('message',"To verify your account check your Email");
                Mail::to($result[0]->email)->send(new verifyEmail($result[0]));
                return redirect('/user_login_page');
            }


            Session::put('user_name',$result[0]->name);
            Session::put('user_id',$result[0]->id);
            //echo Session::get('admin_id');
            return redirect('/user_profile');
        }
        else{
            Session::put('message','Invalid Email or Password');
            return redirect('/user_login_page');
        }
    }

    public function user_profile(){
        $this->UserAuthCheck();

        $user_id= Session::get('user_id');
        $user_info=DB::table('tbl_users')
            ->where('id',$user_id)
            ->first();

        if($user_info->user_type=="Teacher"){
            $user_info_type=DB::table('tbl_teacher')
            ->where('user_id',$user_id)
            ->first();
        }
        else if($user_info->user_type=="Employee"){
            $user_info_type=DB::table('tbl_employee')
            ->where('user_id',$user_id)
            ->first();
        }
        else{
            $user_info_type=DB::table('tbl_student')
            ->where('user_id',$user_id)
            ->first();
            /*echo '<pre>';
            print_r($user_info_type);
            exit();*/
            //return view('admin_login');
        }

    	return view('pages.user_profile',compact('user_info','user_info_type'));
        //return view('pages.user_profile')->with('user_info_type',$user_info_type)->with('user_info',$user_info);
    }

    public function user_profile_edit(){
        $this->UserAuthCheck();

        $user_id= Session::get('user_id');
        $user_info=DB::table('tbl_users')
            ->where('id',$user_id)
            ->first();

        if($user_info->user_type=="Teacher"){
            $user_info_type=DB::table('tbl_teacher')
            ->where('user_id',$user_id)
            ->first();
        }
        else if($user_info->user_type=="Employee"){
            $user_info_type=DB::table('tbl_employee')
            ->where('user_id',$user_id)
            ->first();
        }
        else{
            $user_info_type=DB::table('tbl_student')
            ->where('user_id',$user_id)
            ->first();
            /*echo '<pre>';
            print_r($user_info_type);
            exit();*/
            //return view('admin_login');
        }
        if($user_info->user_type=="Teacher")
        return view('pages.user_profile_edit_teacher',compact('user_info','user_info_type'));
        if($user_info->user_type=="Student")
        return view('pages.user_profile_edit_student',compact('user_info','user_info_type'));
        if($user_info->user_type=="Employee")
        return view('pages.user_profile_edit_employee',compact('user_info','user_info_type'));
        //return view('pages.user_profile')->with('user_info_type',$user_info_type)->with('user_info',$user_info);
    }

    public function verify_Email($user_id){
        DB::table('tbl_users')
        ->where('id',$user_id)
        ->update(['status' => 1]);

        Session::put('message1',"Email Verified");
        return redirect('/user_login_page');
    }



    public function user_info_registration(Request $request){
    	$data=array();
		$data['email']=$request->user_email;
    	$data['name']=($request->user_name);
    	$data['password']=($request->password);
    	$data['mobile']=($request->mobile_number);
        $user_type = Session::get('user_type');
        $data['user_type']=($user_type);
        Session::put('user_type',null);



         $image=$request->file('profile_image');

       $image_name=str_random(20);
       $ext=strtolower($image->getClientOriginalExtension());
       $image_full_name=$image_name.'.'.$ext;
       $upload_path='dp/';
       $image_url=$upload_path.$image_full_name;
       $success=$image->move($upload_path,$image_full_name);
       if ($success) {
         $data['profile_image']=$image_url;
       }
       else{
       $data['profile_image']='noimage.jpg';
        }


    	$result = DB::select(
    			"select * from tbl_users where email =?
    			",[$request->user_email]
    		);

    	if($result){
    	 	Session::put('message',"Email is already registered");
            Session::put('user_type',null);
    	 	return redirect('/user_registration_page');
    	}
    	else{
    		DB::table('tbl_users')->insert($data);
    		

            $result = DB::select(
                "select * from tbl_users where email =?
                ",[$request->user_email]
            );

           Mail::to($result[0]->email)->send(new verifyEmail($result[0]));

            if($user_type=="Teacher"){
                $data1=array();
                $data1['user_id']=$result[0]->id;
                $data1['department']=$request->department;
                $data1['designation']=($request->designation);   
                DB::table('tbl_teacher')->insert($data1); 
            }
            else if($user_type=="Employee"){
                $data1=array();
                $data1['office']=$request->office;
                $data1['user_id']=$result[0]->id;
                $data1['designation']=($request->designation); 
                DB::table('tbl_employee')->insert($data1);   
            }
            else{
                $data1=array();
                $data1['department']=$request->department;
                $data1['user_id']=$result[0]->id;
                $data1['session']=($request->session);  
                $data1['regi_no']=($request->reg_no);  
                DB::table('tbl_student')->insert($data1);
            }


            Session::put('message1',"Check your Email for verification");
    		return redirect('/user_login_page');
    	}
    }

    public function user_info_update(Request $request){

        $user_id= Session::get('user_id');
        $user_info=DB::table('tbl_users')
            ->where('id',$user_id)
            ->first();
        $user_type = $user_info->user_type;
        
        $data=array();
        $data['name']=($request->user_name);
        $data['password']=($request->password);
        $data['mobile']=($request->mobile_number); 
        $image=$request->file('profile_image');
        if($image){
       $image_name=str_random(20);
       $ext=strtolower($image->getClientOriginalExtension());
       $image_full_name=$image_name.'.'.$ext;
       $upload_path='dp/';
       $image_url=$upload_path.$image_full_name;
       $success=$image->move($upload_path,$image_full_name);
       if ($success) {
            File::delete($user_info->profile_image);
         $data['profile_image']=$image_url;
       }
    }
    $user_info=DB::table('tbl_users')
            ->where('id',$user_id)
            ->update($data);
            if($user_type=="Teacher"){
                $data1=array();
                $data1['department']=$request->department;
                $data1['designation']=($request->designation);   
                DB::table('tbl_teacher')
                ->where('user_id',$user_id)
                ->update($data1); 
            }
            else if($user_type=="Employee"){
                $data1=array();
                $data1['office']=$request->office;
                $data1['designation']=($request->designation); 
                DB::table('tbl_employee')->where('user_id',$user_id)
                ->update($data1);    
            }
            else{
                $data1=array();
                $data1['department']=$request->department;
                $data1['session']=($request->session);  
                $data1['regi_no']=($request->reg_no);  
                DB::table('tbl_student')->where('user_id',$user_id)
                ->update($data1); 
            }
            Session::put('message',"Profile updated");
            return redirect('/user_profile');
    }



    public function user_registration(Request $request){

            Session::put('user_type',$request->user_type);

            return view('pages.user_registration_page');
    }

    public function logout(){
        Session::flush();
        return redirect('/');
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

    public function forgot_password(){
        return view('pages.forgot_password');
    }

    public function send_password(Request $request){

        $email=$request->user_email;
        
            $result = DB::select(
                "select * from tbl_users where email =?
                ",[$email]
            );

        if($result){
                    Session::put('message1',"Password sent!");
                     Mail::to($result[0]->email)->send(new send_Password($result[0]));
        }
        else{
            Session::put('message','Invalid Email');
            
        }
        return redirect('/user_login_page');
    }

    public function post_a_ad(){
        $this->UserAuthCheck();

        return view('pages.post_a_ad');
    }
}
