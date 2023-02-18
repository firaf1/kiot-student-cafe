<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Ticke;
use App\Models\Student;
use Livewire\Component;
use App\Models\Schedule;
use App\Models\Consumption;
use App\Exports\StudentExport;
use Maatwebsite\Excel\Facades\Excel;

class ConsuptionReportIndex extends Component
{
    public $schedules, $users, $changedSchedule = 0, $date = 0;
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
public function export()
{
   
    if($this->users->count() > 0){
        if($this->changedSchedule == null)
        return Excel::download(new StudentExport($this->users), 'students.xlsx');
        else{
            $sche = Schedule::findOrFail($this->changedSchedule);
            return Excel::download(new StudentExport($this->users), $sche->title.'.xlsx');
        }
    } else{
        return $this->emit('sweetAlertToast', "Sorry No Student is found !!", 'error');

    }
   

}
    public function render()
    {
        $this->schedules = Schedule::where('status', 'Approved')->get();
        if ($this->changedSchedule == 0) {
            if ($this->date == 0) {
                $this->users = Consumption::all();
             }
            if ($this->date == 1) {
                $users1 = Consumption::whereDate('created_at', Carbon::today())->get();
                $this->users= $users1->unique(['student_id']);
            }
            if ($this->date == 2) {
                $users1 = Consumption::select("*")
                    ->whereBetween('created_at',
                        [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]
                    )
                    ->get();
                $this->users= $users1->unique(['student_id']);
            }
            if ($this->date == 3) {
                $users1 = Consumption::whereMonth('created_at', date('m'))
                ->whereYear('created_at', date('Y'))
                ->get();
                $this->users= $users1->unique(['student_id']);
            }

            return view('livewire.consuption-report-index', ['users' => $this->users]);
        } else {
            if ($this->date == 0) {
                $users1 = Consumption::where('schedule_id', $this->changedSchedule)->get();
                $this->users= $users1->unique(['student_id']);
            }
            if ($this->date == 1) {
                $users1 = Consumption::where('schedule_id', $this->changedSchedule)->whereDate('created_at', Carbon::today())->get();
                $this->users= $users1->unique(['student_id']);
            }
            if ($this->date == 2) {
                $users1 =Consumption::select("*")
                ->whereBetween('created_at',
                    [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]
                )->where('schedule_id', $this->changedSchedule)->get();
                $this->users= $users1->unique(['student_id']);
            }
            if ($this->date == 3) {
                $users1 = Consumption::where('schedule_id', $this->changedSchedule)->whereMonth('created_at', date('m'))
                ->whereYear('created_at', date('Y'))
                ->get();
                $this->users= $users1->unique(['student_id']);
            }

            return view('livewire.consuption-report-index');
        }

    }
}
