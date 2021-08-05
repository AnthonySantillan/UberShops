<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = 'app.roles';
    protected $fillable = [
        'name',
    ];

    function sellers()
    {
        return $this->belongsTo(Seller::class);
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
