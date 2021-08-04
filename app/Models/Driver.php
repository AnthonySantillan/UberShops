<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;
    protected $table = 'app.drivers';
    protected $fillable = [
        'name',
        'phone',
        'email',
        'password',
        'direction',
        'license',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime: Y-m-d',
    ];
    function vehicle()
    {
        return $this->hasMany(Vehicle::class);
    }
}
