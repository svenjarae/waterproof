<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory;

    //change status value to readable string for user
    protected $status = array(
        '1' => 'Open',
        '2' => 'Processing',
        '3' => 'Closed'
    );

    public function getStatusAttribute($value)
    {
        return $this->status[$value];
    }

    //Generate equipment ID to display a more readable ID for user
    public function getServiceID()
    {
        return sprintf('ASS-%03d', $this->id);
    }

    
    public $table = "service";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'equipment_type',
        'service_type',
        'service_submission',
        'info',
        'status',
        'cost'
    ];

       //https://www.youtube.com/watch?v=quiUytHXutM&list=PLillGF-RfqbYhQsN5WMXy6VsDMKGadrJ-&index=11
    //relation to User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //relate to equipment
    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }
}
