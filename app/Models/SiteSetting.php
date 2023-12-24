<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class SiteSetting extends Model
{
    protected $fillable = ['name','data','set_type'];
}

//burdan migrate ettik eğer veri tabanındaki tablodan silmek isteyice tek bir satırı php artisan migrate:rollback --step=1 dyioruz son eklenen iki satır eklenen verileri de --step=2 diyoruz
