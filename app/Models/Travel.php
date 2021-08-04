<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    use HasFactory;
    protected $table = 'app.travels';
    protected $fillable = [
        'starting',
        'arrival',
        'value'
    ];

    function role()
    {
        return $this->hasMany(Role::class);
    }
}
