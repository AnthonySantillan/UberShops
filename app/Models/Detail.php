<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;
    protected $table = 'app.details';
    protected $fillable = [
        'amount',
        'delivery_date',
        'delivery_time',
        'value',
    ];
    function products()
    {
        return $this->belongsToMany(Product::class);
    }
    function payment()
    {
        return $this->hasMany(Payment::class);
    }
    function travels()
    {
        return $this->hasMany(Travel::class);
    }
}
