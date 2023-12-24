<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductRequest;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
         $products =Product::with('category:id,cat_ust,name')->orderBy('id','desc')->paginate(20);
        return view('backend.pages.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


        $categories=Category::where('cat_ust',null)->get();
        return view('backend.pages.product.edit', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {

       if($request->hasFile('image')){
        $image=$request->file('image');
        $dosyadi = $request->name;
        $yukleKlasor ='img/urun/';
        klasorac($yukleKlasor);
       $resimurl = resimyukle($image,$dosyadi,$yukleKlasor);


    }
       Product::create([
        'name'=>$request->name,
        'category_id'=>$request->category_id,
        'content'=>$request->content,
        'short_text'=>$request->short_text,
        'price'=>$request->price,
        'size'=>$request->size,
        'color'=>$request->color,
        'qty'=>$request->qty,
        'image'=>$resimurl ?? NULL,
        'status'=>$request->status,
       ]);

        return back()->withSuccess('Başarıyla Oluşturuldu!');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::where('id',$id)->first();


        $categories=Product::get();
        return view('backend.pages.product.edit' , compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {


            $product = Product::where('id',$id)->firstOrFail();

            if($request->hasFile('image')){
                dosyasil($product->image);

                #if($request->hasFile('image')){
                    $image=$request->file('image');
                    $dosyadi = $request->name;
                    $yukleKlasor ='img/urun/';
                    klasorac($yukleKlasor);
                   $resimurl = resimyukle($image,$dosyadi,$yukleKlasor);




            } //buraya  bak

           $product->update([
            'name'=>$request->name,
          'category_id'=>$request->category_id,
          'content'=>$request->content,
          'short_text'=>$request->short_text,
           'price'=>$request->price,
           'size'=>$request->size,
           'color'=>$request->color,
          'qty'=>$request->qty,
          'image'=>$resimurl ?? NULL,
           'status'=>$request->status,
           ]);

           return back()->withSuccess('Başarıyla Güncelledi!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $product =Product::where('id',$request->$id)->firstOrFail();

        dosyasil($product->image);
        $product->delete();
        return response(['error'=>false,'message'=>'Başarıyla Silindi.']);

    }


    public function status(Request $request){

        $update = $request->statu;
        $updatecheck = $update == "false" ? '0' : '1';
        Product::where('id',$request->id)->update(['status'=> $updatecheck]);
       return response(['error'=>false,'status'=>$update]);
}
}
