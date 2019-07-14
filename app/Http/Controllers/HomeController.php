<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\About;
use App\About_point;
use App\Construction;
use App\Testimonial;
use Carbon\Carbon;
use App\Service;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
     public function contactmessageview()
    {
        $all_message=Message::paginate(5); 
        
        $soft_delete_messages=Message::onlyTrashed()->get();
        return view('admin/message/view',compact('all_message','soft_delete_messages'));     
    }
     public function contactmessagesingleview($message_id)
    {
        $old_info=Message::findOrFail($message_id);
      return view('admin/message/singleview',compact('old_info')); 
      //echo $old_info;
    }
     public function contactmessagedelete($message_id)
    {
      // Message::find($message_id)->delete();
       Message::where('id','=',$message_id)->delete(); ////another way for delete
       return back();
    }
      public function marksasread($message_id)
    {
       Message::where('id','=',$message_id)->update([
           'message_status'=>2,
       ]);
       return back();
    }
    public function contactmessageupdate($message_id)
    {
      $old_info=Message::findOrFail($message_id);
      return view('admin/message/update',compact('old_info')); 
    }
     public function contactmessageupdatesubmit(Request $request)
                     
    {  
        //print_r($_POST);
         $request->validate([
             'sender_name'=>'required',
             'sender_email'=>'required | email', //| unique:messages,sender_email,
             'sender_message'=>'required',
         ]);
        
        $message_id= $request->message_id;
        $sender_name= $request->sender_name;
        $sender_email=$request->sender_email;
        $sender_message=$request->sender_message;
        Message::where('id','=',$message_id)->update([
           'sender_name'=>$sender_name,
            'sender_email'=>$sender_email,
            'sender_message'=>$sender_message,
            //'sender_name'=>$sender_name,
       ]);
       return redirect('/contact/message/view');
    }
    public function contactmessagerestore($message_id)
    {
      Message::onlyTrashed()->where('id','=',$message_id)->restore();
      return back();
    }
    
     public function adminabout()
    {
      $about_info=About::paginate(5);
      return view('/admin/about/view',compact('about_info'));
    }
     public function adminaboutsubmit(Request $request)
    {
      //print_r($_POST);
         $request->validate([
             'about_title'=>'required',
             'about_details'=>'required', 
             'about_point'=>'required',
             
         ]);    
        $about_title= $request->about_title;
        $about_details=$request->about_details;
        $about_point=$request->about_point;
        $IdfromDb=About::insertGetId([
           'about_title'=>$about_title,
            'about_details'=>$about_details,
            'about_point'=>$about_point,
            'created_at'=>Carbon:: now(),
       ]);
         if($request->hasFile('about_image')){
            $path = $request->file('about_image')->store('about_photos');
            About::where('id','=',$IdfromDb)->update([
                'about_image'=>$path,
            ]);
        }
       return back()->with('status','Your Message Succesfully Send !!!');
    }
    
     public function adminaboutactive($about_id)
    {
    
      About::where('about_status','=',2)->update([
          'about_status'=>1,
      ]);
      About::where('id','=',$about_id)->update([
          'about_status'=>2,
      ]);
      return back();
    }
     public function adminaboutpointsubmit(Request $request)
    {
      //print_r($_POST);
         $request->validate([
             'about_id'=>'required',
             'point'=>'required',
         ]);    
        
        About_point::insert([
           'about_id'=>$request->about_id,
            'point'=>$request->point,
            'created_at'=>Carbon:: now(),
       ]);
       return back()->with('status1','Your Points Succesfully Added !!!');
    }
     public function adminservice()
    {
      $service_info=Service::paginate(5);
      return view('/admin/service/view',compact('service_info'));
    }
    public function adminservicesubmit(Request $request)
    {
      //print_r($_POST);
       $request->validate([
             'service_title'=>'required',
             'service_details'=>'required',
         ]);   
        $IdfromDb=Service::insertGetId([
           'service_title'=>$request->service_title,
            'service_details'=>$request->service_details,
            'created_at'=>Carbon:: now(),
       ]);
        if($request->hasFile('service_image')){
            $path = $request->file('service_image')->store('service_photos');
            Service::where('id','=',$IdfromDb)->update([
                'service_image'=>$path,
            ]);
            //return $path;
        }
       
       
       return back()->with('status2','Your Message Succesfully Send !!!');
    }
     public function adminservicedeactive($service_id)
    {
      Service::where('id','=',$service_id)->update([
          'service_status'=>2,
      ]);
      return back();
    }
     public function adminserviceactive($service_id)
    {
       Service::where('id','=',$service_id)->update([
          'service_status'=>1,
      ]);
       return back();
    }
      public function adminconstructionview()
    {
        $all_construct_message=Construction::paginate(2);       
        return view('/admin/construction/view',compact('all_construct_message'));     
    }
     public function adminconstructionsubmit(Request $request)
    {
      //print_r($_POST);
         $request->validate([
             'construct_title'=>'required',
             'construct_details'=>'required',
             'construct_button'=>'required',
             'construct_renovation'=>'required',
             'construct_started'=>'required',
             'construct_free_estimate'=>'required',
         ]);   
        $IdfromDb=Construction::insertGetId([
            
           'construct_title'=>$request->construct_title,
            'construct_details'=>$request->construct_details,
            'construct_button'=>$request->construct_button,
             'construct_renovation'=>$request->construct_renovation,
            'construct_started'=>$request->construct_started,
             'construct_free_estimate'=>$request->construct_free_estimate,
            'created_at'=>Carbon:: now(),
       ]);
        if($request->hasFile('construct_image')){
            $path = $request->file('construct_image')->store('construction_photos');
            Construction::where('id','=',$IdfromDb)->update([
                'construct_image'=>$path,
            ]);
            //return $path;
        }
       
       
       return back()->with('status','Your Message Succesfully Send !!!');
       
    }
     public function adminconstructionactive($construct_id)
    {
    
      Construction::where('construct_status','=',2)->update([
          'construct_status'=>1,
      ]);
      Construction::where('id','=',$construct_id)->update([
          'construct_status'=>2,
      ]);
      return back();
    }
     public function admintestimonial()
    {
      $testimonial_info=Testimonial::paginate(5);
      return view('/admin/testimonial/view',compact('testimonial_info'));
    }
     public function admintestimonialsubmit(Request $request)
    {
      //print_r($_POST);
       $request->validate([
             'testimonal_author'=>'required',
             'testimonal_details'=>'required',
         ]);   
        $IdfromDb=Testimonial::insertGetId([
           'testimonal_author'=>$request->testimonal_author,
            'testimonal_details'=>$request->testimonal_details,
            'created_at'=>Carbon:: now(),
       ]);
        if($request->hasFile('testimonal_image')){
            $path = $request->file('testimonal_image')->store('testimonial_photos');
            Testimonial::where('id','=',$IdfromDb)->update([
                'testimonal_image'=>$path,
            ]);
            //return $path;
        }
       
       
       return back()->with('status2','Your Message Succesfully Send !!!');
    }
     public function admintestimonialdeactive($testimonial_id)
    {
      Testimonial::where('id','=',$testimonial_id)->update([
          'testimonal_status'=>2,
      ]);
      return back();
    }
     public function admintestimonialactive($testimonial_id)
    {
       Testimonial::where('id','=',$testimonial_id)->update([
          'testimonal_status'=>1,
      ]);
       return back();
    }
    
    
}









