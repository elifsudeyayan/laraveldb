<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cooupon;

class CartController extends Controller
{
    public function index() {

        $cartItem = session('cart',[]);
        $totalPrice = 0;

        foreach ($cartItem as $cart) {
            $totalPrice += $cart['price'] * $cart['qty'];
        }
        session()->put('total_price',$totalPrice);
        return view('frontend.pages.cart' , compact('cartItem','totalPrice'));
    }


    public function add(Request  $request) {
        $productID= $request->product_id;
        $qty= $request->qty ?? 1;    //Bu ifade, bir değişkenin değerini kontrol eder ve değer null ise, belirtilen varsayılan değeri (bu durumda 1) atar. Eğer değer null değilse, değişkenin mevcut değerini korur.
        $size= $request->size;
        $urun = Product::find($productID);
      if(!$urun) {
          return back()->withError('Ürün Bulunamadı!');
      }
      $cartItem = session('cart',[]);

      if(array_key_exists($productID,$cartItem)) {
        $cartItem[$productID]['qty'] += $qty;
      }else{
        $cartItem[$productID]=[
            'image'=>$urun->image,
            'name'=>$urun->name,
            'price'=>$urun->price,
            'qty'=>$qty,
            'size'=>$size,
        ];
      }
      session(['cart'=>$cartItem]);

      return back()->withSuccess('Ürün Sepete Eklendi!');

    }

    public function remove(Request $request) {
        #return  $request->all();
        $productID = $request->product_id;
        $cartItem = session('cart',[]);
        if(array_key_exists($productID,$cartItem)) {
            unset($cartItem[$productID]);
        }
        session(['cart'=>$cartItem]);
        return back()->withSuccess('Başarıyla Sepetten Kaldırıldı!');

    }


    public function coouponcheck(Request $request) {


        $cartItem = session('cart',[]);
        $totalPrice = 0;

        foreach ($cartItem as $cart) {
            $totalPrice += $cart['price'] * $cart['qty'];
        }


        $kuponprice = $kupon->price ?? 0;
        $kuponcode = $kupon->name ?? '';

        $totalPrice = $kuponPrice - $kuponprice;

        session()->put('total_price',$totalPrice);
        session()->put('cooupon_code',$kuponcode);


        return back()->withSuccess('Kupon Uygulandı!');
    }
}
