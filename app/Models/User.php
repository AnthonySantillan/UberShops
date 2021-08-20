<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;



class User extends Authenticatable
{
    use HasFactory;
    // use Auditing;
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'app.users';
    protected $fillable = [
        'name',
        'phone',
        'email',
        'password',
        'direction',
        'genred',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime: Y-m-d',
    ];

    function clients()
    {
        return $this->belongsToMany(Client::class);
    }
    function drivers()
    {
        return $this->belongsTo(Driver::class);
    }
    function sellers()
    {
        return $this->belongsTo(Seller::class);
    }
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}
