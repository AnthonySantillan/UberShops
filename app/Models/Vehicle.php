<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use OwenIt\Auditing\Contracts\Auditable;
// use OwenIt\Auditing\Auditable as Auditing;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
    use HasFactory;
    // use Auditing;
    use SoftDeletes;

    protected $table = 'app.vehicles';
    protected $fillable = [
        'plate',
        'color',
        'enrollment',
        'year'
    ];
    function driver()
    {
        return $this->belongsTo(Driver::class);
    }
    //mutators
    public function setPlateAttribute($value)
    {
        $this->attributes['plate'] = strtoupper($value);
    }
}
