<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
#use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Str;
use App\Http\Requests\ContentFormRequest;

class AjaxController extends Controller
{
    public function iletisimkaydet(ContentFormRequest $request) {

      /*$validationdata =$request->validate( [
       'name'=> 'required|string|min:3',
       'email'=> 'required|email',
       'sucject'=> 'required',
       'message'=> 'required',

      ],[

        'name.required' => 'İsim Soyisim Zorunlu',
        'name.string' => 'İsim Soyisim karakterlerden oluşmalı',
        'name.min' => 'İsim Soyisim Minimum 3 karakterden oluşmalıdır',
        'email.required' => 'E-posta Zorunlu',
        'email.email' => 'Geçersiz bir email adresi',
        'sucject.required' => 'Konu kısmı boş geçilemez',
        'message.required' => 'Mesaj kısmı boş geçilemez',
      ]);  */








        /* $data = $request->all();
        $data['ip'] = request()->ip();
     */
        $newdata = [

           'name'=> Str::title($request->name),
           'email' => $request->name,
           'subject'=> $request->subject,
           'message' =>$request->message,
           'ip' => request()->ip(),


        ];



        $sonkaydedilen = Contact::create($newdata);
          return  back()->with(['message'=>'Başarıyla Gönderildi']);
    }

    public function logout(){
        Auth::logout();
        return  redirect()->route('anasayfa');
    }
}
