<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//use OwenIt\Auditing\Contracts\Auditable;
//use OwenIt\Auditing\Auditable as Auditing;
use Illuminate\Database\Eloquent\SoftDeletes;

class Detail extends Model
{
    use HasFactory;
    //use Auditing;
    use SoftDeletes;

    protected $table = 'app.details';
    protected $fillable = [
        'amount',
        'delivery_date',
        'delivery_time',
        'value',
    ];
    function products()
    {
        return $this->belongsToMany(Product::class);
    }
    function payment()
    {
        return $this->hasMany(Payment::class);
    }
    function travels()
    {
        return $this->hasMany(Travel::class);
    }
    //mutators
    public function setAmountAttribute($value)
    {
        $this->attributes['amount'] = strtoupper($value);
    }
}
