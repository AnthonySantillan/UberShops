<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'app.payments';
    protected $fillable = [
        'cash',
        'card'
    ];

    function user()
    {
        return $this->hasMany(User::class);
    }
}
