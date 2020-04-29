<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements HasMedia
{
    use Notifiable;
    use HasRoles;
    use HasMediaTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'type',
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

    public static function username($user_id)
    {
        $user = User::where('id', $user_id)->first();

        return (isset($user->name) ? $user->name : '');
    }

    // you can define as  collections as needed
    public function registerMediaCollections()
    {

        $this->addMediaCollection('profile_logo')
            ->withResponsiveImages()
            ->singleFile(); // accept only on file

        $this->addMediaConversion('thumb')
            ->width(200)
            ->height(200)
            ->sharpen(10)
            ->format('png');

        $this->addMediaConversion('square')
            ->width(412)
            ->height(412)
            ->sharpen(10);

    }

    //getting setting information
    public static function profileImage($var = null, $type = null, $id = null)
    {

        if ($id != null) {
            $user = User::where('id', $id)->first();

        }

        if ($var == 'profile_logo' && !empty($user->getFirstMediaUrl('profile_logo')) && $type != null) {

            return $user->getFirstMediaUrl('profile_logo', $type);
        }

        return asset('assets/images/users/user-1.jpg');
    }

}
