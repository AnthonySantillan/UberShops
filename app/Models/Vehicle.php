<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    protected $table = 'app.vehicles';
    protected $fillable = [
        'plate',
        'color',
        'enrollment',
        'year'
    ];
    function driver()
    {
        return $this->belongsTo(Driver::class);
    }
}
