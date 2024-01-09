<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Configration;
use App\Helpers\Helper;
class ConfigrationController extends Controller
{
    
    public function __construct(){
        $this->middleware(['permission:configrations']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($lang)
    {
        $configrations =Configration::where('lang',$lang)->first();
        return view('admin.configrations.configration',compact('configrations'));
    }


    public function update(Request $request, $lang)
    {
        $configration = Configration::where('lang',$lang)->first();
        $configration -> app_name = $request -> app_name;
        $configration -> about_app = $request -> about_app;

        if($configration->app_logo){
            $configration->app_logo = Helper::updateUploadedImage('configrations',$request->app_logo ,$configration->app_logo);
        }else{
            $configration->app_logo = Helper::uploadImage('configrations',$request->app_logo);
        } 

        if($configration->footer_logo){
            $configration->footer_logo = Helper::updateUploadedImage('configrations',$request->footer_logo ,$configration->footer_logo);
        }else{
            $configration->footer_logo = Helper::uploadImage('configrations',$request->footer_logo);
        } 

        if($configration->fav_icon){
            $configration->fav_icon = Helper::updateUploadedImage('configrations',$request->fav_icon ,$configration->fav_icon);
        }else{
            $configration->fav_icon = Helper::uploadImage('configrations',$request->fav_icon);
        } 
        
        $configration->save() ;

        toastr()->success(trans('home.your_item_updated_successfully') , trans('home.updated'));
        return back();
    }
}
