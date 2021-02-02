<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;

class Address extends Model
{
    use LaratrustUserTrait;
    use HasFactory, Notifiable;

    public $table = "address";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'country',
        'city',
        'zip',
        'street',
        'user_id'
    ];

    //relation to User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
