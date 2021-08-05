<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    protected $table = 'app.shops';
    protected $fillable = [
        'name',
        'code',
        'direction',
    ];
    function sellers()
    {
        return $this->belongsTo(Seller::class);
    }
    function products()
    {
        return $this->belongsTo(Product::class);
    }
    function travels()
    {
        return $this->belongsTo(Travel::class);
    }
}
