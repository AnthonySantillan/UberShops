<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//use OwenIt\Auditing\Contracts\Auditable;
//use OwenIt\Auditing\Auditable as Auditing;
use Illuminate\Database\Eloquent\SoftDeletes;


class Seller extends Model
{
    use HasFactory;
    //use Auditing;
    use SoftDeletes;

    protected $table = 'app.sellers';
    protected $fillable = [
        'ruc',
    ];

    function shops()
    {
        return $this->hasMany(Shop::class);
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
    public function setRucAttribute($value)
    {
        $this->attributes['ruc'] = strtoupper($value);
    }
}
