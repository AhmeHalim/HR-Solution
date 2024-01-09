<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\Setting;
use Mail;
use App\Models\Configration;
use App\Support\Collection;
use App\Models\Career;
use App\Models\CareerApplication;

use \Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class WebsiteController extends Controller
{



    ////////// FUNCTION RETURN PAGE INFORMATION /////////
    public function getPage($link){
        $lang=\LaravelLocalization::getCurrentLocale();
        $page =Page::where('link_en',$link)->orwhere('link_ar',$link)->first();
        return view('website.page',compact('lang','page'));
    }


    public function getCareersPage(){
        $careers = Career::where('status',1)->get();
        return view('website.careers',compact('careers'));
    }

    public function saveCareerApplication(Request $request){
        $request->validate([
            'name'=>'required|max:150',
            'email'=>'required|email',
            'phone'=>'required|regex:/(01)[0-9]{9}/',
            'cv_file'=>'mimes:pdf,docx',
            'position'=>'required',
        ]);
        
        $add = new CareerApplication();
        $add->name = $request->name;
        $add->email = $request->email;
        $add->phone = $request->phone;
        $add->notes = $request->notes;
        $add->gender = $request->gender;
        $add->career_id = $request->career_id;
        $add->position = $request->position;
        
        //upload cv pdf file
        if($request->hasFile("cv_file")){
            $extension = $request->file('cv_file')->getClientOriginalExtension();
            $filename = rand(11111111, 99999999). '.' . $extension;
            $request->file('cv_file')->move( base_path() . '/uploads/careers/cvs', $filename );
            $add->cv_file = $filename;
        }
        
        $add->save();
        
                
        //         $data = array('contact' => $contact);
//         $setting = Setting::first();
// 	    Mail::send('emails/contact_email', $data, function($msg) use ($setting) {
//   			$msg->to([$setting ->contact_email,'support@waelsakrplastic.com'], 'Booking Appointement')->subject('Booking');
//   			$msg->cc(['begroup.seo@gmail.com','ahmed.essam.be@gmail.com']);
//   			$msg->from(config('mail.from.address'),config('mail.from.name'));
// 		});

        return back()->with(['success'=>trans('home.Thank you for contacting us. A customer service officer will contact you soon')]);
    }
    
    
    

    

    
    
    
}
