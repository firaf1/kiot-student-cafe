<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Property extends Model
{
    use HasFactory;

    /**
     * Get the user that owns the Property
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() 
    {
        return $this->belongsTo(Student::class,'user_id');
    }
}
