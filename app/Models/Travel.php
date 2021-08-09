<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    use HasFactory;
    protected $table = 'app.travels';
    protected $fillable = [];

    function drivers()
    {
        return $this->hasMany(Driver::class);
    }
    function shops()
    {
        return $this->hasMany(Shop::class);
    }
    function details()
    {
        return $this->hasMany(Detail::class);
    }
}
