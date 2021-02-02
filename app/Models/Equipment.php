<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Equipment extends Model
{
    use HasFactory;

    // protected $primaryKey = "12345";
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'equip_type',
        'brand',
        'condition',
        'purchase',
        'maintenance',
        'info',
    ];

    protected $dates = ['maintenance'];


    //https://www.youtube.com/watch?v=quiUytHXutM&list=PLillGF-RfqbYhQsN5WMXy6VsDMKGadrJ-&index=11
    //relation to User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function service()
    {
        return $this->hasOne(Service::class);
    }

    /**
     * Aufrufbar als $equipment->status
     */
    public function getStatusAttribute() {

        //if maintenance day has passed -> expired
        if($this->maintenance->isPast()) {        
            //set status to 1/expired
            return 'expired';
        } 

        else if($this->diff_in_days < 30) {
            //set status to 1/warning
            return 'warning';

        } else {
            //set status to all good
            return 'all good';
        }
    }

    /**
     * $equipment->diff_in_days
     */
    public function getDiffInDaysAttribute() {
        // get today
        $startExpire = Carbon::today();
                        
        // get difference in days from today to maintenance date
        return $startExpire->diffInDays($this->maintenance);
    }

    //Generate equipment ID to display a more readable ID for user
    public function getEquipmentID()
    {
        return sprintf('EQ-%03d', $this->id);
    }
    
}
