<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = 'app.roles';
    protected $fillable = [
        //'user',
        //'driver',
    ];

    function travel()
    {
        return $this->belongsTo(Travel::class);
    }

    function user()
    {
        return $this->belongsTo(Travel::class);
    }

    function driver()
    {
        return $this->belongsTo(Travel::class);
    }
}
