<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $table = 'app.clients';
    protected $fillable = [];


    function users()
    {
        return $this->hasMany(User::class);
    }
    function roles()
    {
        return $this->hasMany(Role::class);
    }
}
