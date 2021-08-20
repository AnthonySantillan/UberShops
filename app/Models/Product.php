<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//use OwenIt\Auditing\Contracts\Auditable;
//use OwenIt\Auditing\Auditable as Auditing;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'app.products';
    protected $fillable = [
        'name',
        'code',
        'price',
    ];
    function shops()
    {
        return $this->hasMany(Shop::class);
    }
    function purchaseDetails()
    {
        return $this->hasMany(Purchase_Detail::class);
    }
    //mutators
    public function setCodeAttribute($value)
    {
        $this->attributes['code'] = strtoupper($value);
    }
}
