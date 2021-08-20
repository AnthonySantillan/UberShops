<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//use OwenIt\Auditing\Contracts\Auditable;
//use OwenIt\Auditing\Auditable as Auditing;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shop extends Model
{
    use HasFactory;
    //use Auditing;
    use SoftDeletes;

    protected $table = 'app.shops';
    protected $fillable = [
        'name',
        'code',
        'direction',
    ];
    function sellers()
    {
        return $this->belongsTo(Seller::class);
    }
    function products()
    {
        return $this->belongsTo(Product::class);
    }
    function travels()
    {
        return $this->belongsTo(Travel::class);
    }
    //mutators
    public function setCodeAttribute($value)
    {
        $this->attributes['code'] = strtoupper($value);
    }
}
