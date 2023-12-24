<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Seeder\CategorySeeder;




class Category extends Model
{
    use Sluggable;
    protected $fillable = [

        'image',
        'thumbnail',
        'name',
        'slug',
        'content',
        'cat_ust',
        'status',


    ];

//fillable izin ver demek tablodaki yerler için bundan sonra seeder oluşturuluyor category için önce ayrı model açtık migrationda create categtorisde ilk verileri tanımladık sonra modelsda caregroy phpde fillable diyip izin ver dedik şimdi seeder oluştucaz






public function items() {

    return $this->hasMany(Product::class,'category_id','id');

    }

public function subCategory() {
   return $this->hasMany(Category::class, 'cat_ust','id');
}

   public function category() {
    return $this->hasOne(Category::class, 'id','cat_ust');

}

public function getTotalProductCount()
{
    $total = $this->items()->count();

    foreach ($this->subcategory as $childCategory) {
        $total += $childCategory->items()->count();
    }

    return $total;
}












public function sluggable(): array

{
   return [
        'slug' => [
            'source' => 'name'
        ]
    ];

}
}

