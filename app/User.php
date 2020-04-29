<?php

namespace App;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','type',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function orders()
    {
        return $this->hasMany(\App\Order::class);
    }

    public function shipping()
    {
        return $this->hasOne(\App\Shipping::class);
    }

    public function billing()
    {
        return $this->hasOne(\App\Billing::class);
    }


    public static function username($user_id) {
        $user =User::where('id',$user_id)->first();

        return (isset($user->name) ? $user->name : '');
    }
}
