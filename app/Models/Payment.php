<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//use OwenIt\Auditing\Contracts\Auditable;
//use OwenIt\Auditing\Auditable as Auditing;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory;
    //use Auditing;
    use SoftDeletes;

    protected $table = 'app.payments';
    protected $fillable = [
        'name',
        // 'value',
    ];
    function user()
    {
        return $this->hasMany(User::class);
    }
    function travels()
    {
        return $this->belongsTo(Travel::class);
    }
    function details()
    {
        return $this->hasMany(Detail::class);
    }
    //mutators
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtoupper($value);
    }
}
