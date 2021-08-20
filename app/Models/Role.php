<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//use OwenIt\Auditing\Contracts\Auditable;
//use OwenIt\Auditing\Auditable as Auditing;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory;
    //use Auditing;
    use SoftDeletes;

    protected $table = 'app.roles';
    protected $fillable = [
        'name',
    ];

    function sellers()
    {
        return $this->belongsTo(Seller::class);
    }

    function clients()
    {
        return $this->belongsTo(Client::class);
    }

    function driver()
    {
        return $this->belongsTo(Travel::class);
    }
}
