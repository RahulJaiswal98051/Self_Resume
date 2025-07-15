<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    
//   public function index(){
//     $settings = Setting::pluck('value','key')->toArray();
//     // dd($settings);
//     return view('backend.site-settings-form' , compact('settings'));
//    }
   public function index()
   {
       return view('backend.dashboard');
   }
 
  

}
