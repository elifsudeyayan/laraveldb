<?php

namespace Database\Seeders;


use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Slider::create([
            'image' => 'https://fakeimg.pl/250x100/',
            'name' => 'Slider1',
            'content' => 'Eticaret sitemize hoşgeldiniz',
            'link'=> 'urunler',
            'status'=>'1'

        ]);
    }
}

//bura fake data yeri migration içindeki create users tablsounu oluşturduk burda tanımladık sonra terminalde php aritsan migrate --seed ederek phpmyadminde hem tablololar olaşcak bu komutla hemde içindeki veriler sonra burdaki verileri sorun yaşadğın pagehomecontoller yani anasayfanın olduğu yerinde tanımlayıp index.blade.phpdeki yere tanımlıcaz$ değişken şeklinde verileri çekecez
