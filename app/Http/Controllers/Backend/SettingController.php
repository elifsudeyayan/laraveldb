<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteSetting;

class SettingController extends Controller
{
    public function index(){
        $settings = SiteSetting::get();
        return view('backend.pages.setting.edit', compact('settings'));
    }

    public function create(){
        return view('backend.pages.setting.edit');
    }

    public function store(Request $request) {
        $key = $request->name;

        SiteSetting::firstOrCreate([
            'name'=>$key,
        ],[

            'name'=>$key,
            'data'=>$request->data,
            'set_type'=>$request->set_type
        ]);

        return back()->withSuccess('Başarılı');
    }


    public function edit($id) {
        $setting = SiteSetting::where('id','$id')->first();
        return view('backend.pages.category.edit',compact('setting'));
    }

    public function update(Request $request,$id) {
        $setting =SiteSetting::where('id','$id')->first();

        $key = $request->name;


        if($request->hasFile('data')){
            dosyasil($setting->data);


                $image=$request->file('data');
                $dosyadi = time();
                $yukleKlasor ='img/site/';
                klasorac($yukleKlasor);
               $resimurl = resimyukle($image,$dosyadi,$yukleKlasor);

        }

        $setting->update([

            'name'=>$key,
            'data'=> $resimurl ??  $request->data,
            'set_type'=>$request->set_type

        ]);

        return back()->withSuccess('Başarıyla Güncellendi');
    }
}
