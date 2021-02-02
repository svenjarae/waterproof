<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;



class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasFactory, Notifiable;


        //Generate equipment ID to display a more readable ID for user
        public function getUserID()
        {
            return sprintf('CSTM-%03d', $this->id);
        }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'surname',
        'gender',
        'dob',
        'phone',
        'certification',
        'noofdives',
        'email',
        'password',
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
        'email_verified_at' => 'datetime',
    ];

    //relate to equipment
    public function equipment()
    {
        return $this->hasMany(Equipment::class);
    }

    //relate to service
    public function service()
    {
        return $this->hasMany(Service::class);
    }

    //relate to address
    public function address()
    {
        return $this->hasOne(Address::class);
    }


    
}
