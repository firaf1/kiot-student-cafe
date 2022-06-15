<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Ticke;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Schedule extends Model
{
    use HasFactory;


    public function TotalStudent($id)
    {
        $student = Ticke::where('schedule_id', $id)->whereDate('created_at', Carbon::today())->get();
        $users = $student->unique(['student_id']);
        return $users->count();
    }
}
