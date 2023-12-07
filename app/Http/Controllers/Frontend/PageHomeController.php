<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Slider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\About;

class PageHomeController extends Controller
{
    public function anasayfa() {
        $slider = Slider::where('status','1')->first(); //eger get kullanmak birden fazla sliderı donmek istersen get kullanıp forech atman lazım bladede anladım tek sorun bu olduğuna üzüldüm teşşkür ederim :) rica ederim görüsürüz
        $title = "Anasayfa";



        $about = About::where('id',1)->first();
        return view('frontend.pages.index',compact('slider','title','about'));
    }
}

//sayfaya veri gönderilmesi yazdırılması burdan tanımlayıp retrun compact yerinden./.örneğin index.blade.phpdeki $slider->name kısmı burda berlilediğimixz $slider işte burda $slider değişkenini burya atıyoruz sonra diğer index.blade ya dafooter.blade de falan verileri burdan çekiyoruz burada tabloları verileri oluşturduktan sonra
