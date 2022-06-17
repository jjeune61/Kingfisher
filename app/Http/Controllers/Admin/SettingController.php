<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){
        $setting = Setting::find(1);
        $system_name = $setting->value;
        return view('admin.setting.update', compact('system_name'));
    }

    public function update(Request $request){
        $this->validate($request, [
            'name'=>'required'
        ]);

        $system_settings = Setting::find(1);
        $system_settings->value = $request->name;
        $system_settings->save();

        $favicon_setttings = Setting::find(2);
        if($request->file('favicon')){
            
            @unlink(public_path('/others/'.$favicon_setttings->value));

            $file = $request->file('favicon');
            $extension = $file->extension();
            $favicon = 'favicon.'.$extension;
            $file->move(public_path('/others'),$favicon);
            $favicon_setttings->value =$favicon;
            $favicon_setttings->save();

        }

        $web_settings = Setting::find(3);
        if($request->file('web_logo')){
            
            @unlink(public_path('/others/'.$web_settings->value));

            $file = $request->file('web_logo');
            $extension = $file->extension();
            $web_logo = 'web_logo.'.$extension;
            $file->move(public_path('/others'),$web_logo);
            $web_settings->value =$web_logo;
            $web_settings->save();
            
        }

        $admin_settings = Setting::find(4);
        if($request->file('admin_logo')){
            
            @unlink(public_path('/others/'.$admin_settings->value));

            $file = $request->file('admin_logo');
            $extension = $file->extension();
            $admin_logo = 'admin_logo.'.$extension;
            $file->move(public_path('/others'),$admin_logo);
            $admin_settings->value =$admin_logo;
            $admin_settings->save();
            
        }

        return redirect('admin/settings')->with('Success', 'Settings updates success.');

    }
}
