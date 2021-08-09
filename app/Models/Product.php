<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'app.products';
    protected $fillable = [
        'name',
        'code',
        'price',
    ];
    function shops()
    {
        return $this->hasMany(Shop::class);
    }
    function purchaseDetails()
    {
        return $this->hasMany(Purchase_Detail::class);
    }
}
