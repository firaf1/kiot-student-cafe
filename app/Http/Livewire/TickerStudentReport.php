<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Ticke;
use Livewire\Component;
use App\Models\Schedule;

class TickerStudentReport extends Component
{
    public $schedules, $changedSchedule = 0, $date = 0;
    public function ScheduleList($id)
    {
        $this->changedSchedule = $id;
        $this->render();

    }
    public function Changedate($date)
    {
        $this->date = $date;
        $this->render();
      
    }

    public function render()
    {
        $this->schedules = Schedule::where('status', 'Approved')->get();
        if ($this->changedSchedule == 0) {
            if ($this->date == 0) {
                $users1 = Ticke::all();
                $users = $users1->unique(['student_id']);
            }
            if ($this->date == 1) {
                $users1 = Ticke::whereDate('created_at', Carbon::today())->get();
                $users = $users1->unique(['student_id']);
            }
            if ($this->date == 2) {
                $users1 = Ticke::select("*")
                    ->whereBetween('created_at',
                        [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]
                    )
                    ->get();
                $users = $users1->unique(['student_id']);
            }
            if ($this->date == 3) {
                $users1 = Ticke::whereMonth('created_at', date('m'))
                ->whereYear('created_at', date('Y'))
                ->get();
                $users = $users1->unique(['student_id']);
            }

            return view('livewire.ticker-student-report', ['users' => $users]);
        } else {
            if ($this->date == 0) {
                $users1 = Ticke::where('schedule_id', $this->changedSchedule)->get();
                $users = $users1->unique(['student_id']);
            }
            if ($this->date == 1) {
                $users1 = Ticke::where('schedule_id', $this->changedSchedule)->whereDate('created_at', Carbon::today())->get();
                $users = $users1->unique(['student_id']);
            }
            if ($this->date == 2) {
                $users1 =Ticke::select("*")
                ->whereBetween('created_at',
                    [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]
                )->where('schedule_id', $this->changedSchedule)->whereDate('created_at', Carbon::today())->get();
                $users = $users1->unique(['student_id']);
            }
            if ($this->date == 3) {
                $users1 = Ticke::where('schedule_id', $this->changedSchedule)->whereMonth('created_at', date('m'))
                ->whereYear('created_at', date('Y'))
                ->get();
                $users = $users1->unique(['student_id']);
            }

            return view('livewire.ticker-student-report', ['users' => $users]);
        }

    }
}
