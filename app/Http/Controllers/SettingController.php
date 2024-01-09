<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use File;
use Image;
class SettingController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('permission:settings');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $settings =Setting::first();
        return view('admin.settings.setting',compact('settings'));
    }

    public function update(Request $request, $id)
    {
        $settings=Setting::first();
        $settings->default_lang = $request->default_lang;
        $settings->contact_email = $request->contact_email;
        $settings->email = $request->email;
        $settings->telphone = $request->telphone;
        $settings->mobile = $request->mobile;
        $settings->fax = $request->fax;
        $settings->facebook = $request->facebook;
        $settings->linkedin = $request->linkedin;
        $settings->instgram = $request->instgram;
        $settings->twitter = $request->twitter;
        $settings->map_url = $request->map_url;
        $settings->whatsapp = $request->whatsapp;
        $settings->snapchat = $request->snapchat;
        $settings->tiktok = $request->tiktok;
        $settings->youtube = $request->youtube;
        $settings->save();
        
        toastr()->success(trans('home.your_item_updated_successfully') , trans('home.updated'));
        return back();
    }


}
