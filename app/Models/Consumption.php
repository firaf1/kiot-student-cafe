<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consumption extends Model
{

    use HasFactory;

    /**
     * Get the schedule that owns the Consumption
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function schedule()
    {
        return $this->belongsTo(Schedule::class,'schedule_id');
    }
    /**
     * Get the roleconsump that owns the Consumption
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function roles()
    {
 
        return $this->belongsTo(RoleConsumption::class, 'role_id');
    }
}
