<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Property_Report extends Model
{
    use HasFactory;
    /**
     * Get the student that owns the Property_Report
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function student()
    {
        return $this->belongsTo(Student::class,'student_id');
    }
    /**
     * Get the property that owns the Property_Report
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function property()
    {
        return $this->belongsTo(Property::class,'property_id');
    }
}
