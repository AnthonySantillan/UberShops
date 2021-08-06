<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;
    protected $table = 'app.drivers';
    protected $fillable = [
        'license',
    ];

    function vehicle()
    {
        return $this->hasMany(Vehicle::class);
    }
    function users()
    {
        return $this->hasMany(User::class);
    }
    function roles()
    {
        return $this->hasMany(Role::class);
    }
}
