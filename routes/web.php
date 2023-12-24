<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\PageHomeController;
;use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomAuthController;
use Illuminate\Support\Facades\Auth;

Route::group(['middleware' =>'sitesetting'], function() {

Route::get('/' , [PageHomeController::class, 'anasayfa'] )->name('anasayfa');


Route::get('/urunler' , [PageController::class, 'urunler'] )->name('urunler');
Route::get('/erkek/{slug?}' , [PageController::class, 'urunler'] )->name('erkekurunler');
Route::get('/kadin/{slug?}' , [PageController::class, 'urunler'] )->name('kadinurunler');
Route::get('/cocuk/{slug?}' , [PageController::class, 'urunler'] )->name('cocukurunler');
Route::get('/indirimdekiler' , [PageController::class, 'indirimdekiurunler'] )->name('indirimdekiurunler');



Route::get('/urun/{slug}' , [PageController::class, 'urundetay'] )->name('urundetay');
Route::get('/hakkimizda' , [PageController::class, 'hakkimizda'] )->name('hakkimizda');
Route::get('/iletisim' , [PageController::class, 'iletisim'] )->name('iletisim');
Route::post('/iletisim/kaydet' , [AjaxController::class, 'iletisimkaydet'] )->name('iletisim.kaydet');

Route::get('/sepet' , [CartController::class, 'index'] )->name('sepet');
Route::post('/sepet/ekle' , [CartController::class, 'add'] )->name('sepet.add');
Route::post('/sepet/remove' , [CartController::class, 'remove'] )->name('sepet.remove');
Route::post('/sepet/coouponcheck' , [CartController::class, 'coouponcheck'] )->name('cooupon.check');

Auth::routes();


Route::get('/cikis' , [AjaxController::class, 'logout'])->name('cikis');

});

//diğer türde olan view giriş çıkışlarda genel olarka bu yapıda kullanıyoruz

//ortada pagecontroller::class yapıları pagecontroller.phpdeki fonksiyonlar ismini burdan alıyor    vs vs daki tanımladığımız{{route}}
//tanımladğımız route yapısı yine bu yerde
//->name('anasayfa'): Bu, routa bir isim verir. Bu ismi daha sonra URL'leri oluştururken veya linkler oluştururken kullanabilirsiniz. Örneğin, route('anasayfa') kullanarak bu route'a yönlendiren bir link oluşturabilirsiniz. yani sol en altta çıkan  isim
//örneğin index.blade.php yani anasayfadaki iletişim ürünler hakkımızdaki vs kısmının ynaına belirdeiğimiz routlar burdan oluyour istek alınıyor


#Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
