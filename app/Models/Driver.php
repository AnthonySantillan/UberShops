<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//use OwenIt\Auditing\Contracts\Auditable;
//use OwenIt\Auditing\Auditable as Auditing;
use Illuminate\Database\Eloquent\SoftDeletes;


class Driver extends Model
{
    use HasFactory;
    //use Auditing;
    use SoftDeletes;

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
    //mutators
    public function setLicenseAttribute($value)
    {
        $this->attributes['license'] = strtoupper($value);
    }
}
