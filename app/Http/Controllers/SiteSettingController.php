<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SiteSettingController extends Controller
{
    

   public function index()
   {
       return view('backend.dashboard');
   }

   public function siteSetting()
   {
       $settings = Setting::pluck('value','key')->toArray();
       return view('backend.layoutes.site-settings', compact('settings'));
    }

    public function siteSettingSubmit(Request $request)
    {
        // Validate the request data
        $request->validate([
            'sitename' => 'required|string|max:255',
            'email' => 'required|email',
            'city' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // Add other validation rules as needed
        ]);

       
if($request->logo && $request->hasFile('logo')){
    $file = $request->logo;
    $filename =  time().'_'. rand(10,11111111111111) .$file->getClientOriginalName();
    $path = public_path().'/settings';
    $file->move($path,$filename);

    $file_exist = Setting::where('key','logo')->first();
    // dd($file_exist);
    if($file_exist){
         $filepath = public_path() .'/'.("settings/$file_exist->value");
        //  dd($filepath);
        if(file_exists($filepath)){
            unlink($filepath);
        }
    }

    Setting::updateOrCreate(['key' => 'logo'], ['key' => 'logo', 'value' => $filename]);
    foreach($request->except('_token', 'logo') as $key => $value){
        Setting::updateOrCreate(['key' =>$key],['key' => $key ,'value' => $value]);
    }

    return redirect()->back();
//    }catch(\Exception $e){
    // dd($e);
    return redirect()->back();
   }
//    }
}
}


