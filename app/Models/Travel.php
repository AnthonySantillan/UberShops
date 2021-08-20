<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//use OwenIt\Auditing\Contracts\Auditable;
//use OwenIt\Auditing\Auditable as Auditing;
use Illuminate\Database\Eloquent\SoftDeletes;


class Travel extends Model
{
    use HasFactory;
    //use Auditing;
    use SoftDeletes;

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
