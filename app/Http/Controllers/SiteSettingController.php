<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Log;

class SiteSettingController extends Controller
{
    public function index()
    {
        return view('backend.dashboard');
    }

    public function siteSetting()
    {
        $settings = Setting::pluck('value','key')->toArray();
        $user = auth()->user();
        return view('backend.layoutes.site-settings', compact('settings', 'user'));
    }

    public function siteSettingSubmit(Request $request)
    {
        // Validate the request data
        $request->validate([
            'sitename' => 'required|string|max:255',
            'email' => 'required|email',
            'city' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($request->logo && $request->hasFile('logo')){
            $file = $request->logo;
            $filename =  time().'_'. rand(10,11111111111111) .$file->getClientOriginalName();
            $path = public_path().'/images';
            try {
                $file->move($path,$filename);
            } catch (\Exception $e) {
                Log::error('Logo upload failed: '.$e->getMessage());
                return redirect()->back()->withErrors(['logo' => 'Failed to upload logo image.']);
            }

            $file_exist = Setting::where('key','logo')->first();
            if($file_exist){
                $filepath = public_path() .'/'.("images/$file_exist->value");
                if(file_exists($filepath)){
                    unlink($filepath);
                }
            }

            Setting::updateOrCreate(['key' => 'logo'], ['key' => 'logo', 'value' => $filename]);
        }

        foreach($request->except('_token', 'logo') as $key => $value){
            Setting::updateOrCreate(['key' =>$key],['key' => $key ,'value' => $value]);
        }

        return redirect()->back();
    }
}
