<?php

namespace App\Models;

use App\Models\User;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notification extends Model
{
    /**
     * Get the user that owns the Notification
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() 
    {
        return $this->belongsTo(Student::class, 'user_id');
    }
    use HasFactory;
}
