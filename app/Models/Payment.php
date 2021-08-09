<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'app.payments';
    protected $fillable = [
        'name',
    ];
    function user()
    {
        return $this->hasMany(User::class);
    }
    function travels()
    {
        return $this->belongsTo(Travel::class);
    }
    function details()
    {
        return $this->hasMany(Detail::class);
    }
}
