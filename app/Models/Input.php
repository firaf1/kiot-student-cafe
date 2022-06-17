<?php

namespace App\Models;

use App\Models\Measurement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Input extends Model
{
    
    use HasFactory;

    /**
     * Get the measurement that owns the Input
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function measurement() 
    {
        return $this->belongsTo(Measurement::class);
    }
}
