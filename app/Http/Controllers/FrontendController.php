<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\About;
use App\About_point;
use App\Service;
use App\Construction;
use App\Testimonial;
use Carbon\Carbon;
class FrontendController extends Controller
{
     public function __construct()
    {
        //$this->middleware('auth');
    }




    public function frontpage() {
        $all_const_info=Construction::where('construct_status','=',2)->firstOrFail();
        $all_about_info=About::where('about_status','=',2)->firstOrFail();
        //echo $all_about_info->id;
        //service_info r jonno 3 vabai kora jai
        //$service_info=Service::where('service_status','=',1)->orderBy('id','desc')->limit(3)->get();
        //$service_info=Service::where('service_status','=',1)->orderBy('id','asc')->limit(3)->get();
        $service_info=Service::where('service_status','=',1)->paginate(3);
        $testimonial_info=Testimonial::where('testimonal_status','=',1)->paginate(6);
        $about_point=About_point::where('about_id','=',$all_about_info->id)->get();
        return view('index',compact('all_about_info','about_point','service_info','all_const_info','testimonial_info'));
    }
    public function adminserviceId($id){
      $service_info=Service::where('id','=',$id)->get();
      return view('website.team',compact('id','service_info'));
    }
    public function team() {
        return view('website.team');
    }
    public function contactformsubmit() {
      //  print_r($_POST);
        $sender_name= $_POST['sender_name'];
        $sender_email=$_POST['sender_email'];
        $sender_message=$_POST['sender_message'];
        Message::insert([
            'sender_name'=>$sender_name,
            'sender_email'=>$sender_email,
            'sender_message'=>$sender_message,
            'created_at'=>Carbon:: now(),

        ]);
        //return redirect('/');or
        return back()->with('status','Your Message Succesfully Send !!!');
    }

}
