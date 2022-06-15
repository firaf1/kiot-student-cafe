<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Ticke;
use App\Models\Student;
use Livewire\Component;
use App\Models\Schedule;

class StudentEnterance extends Component
{
    public $student, $status, $errorMessage;

    protected $listeners = ['postAdded' => 'incrementPostCount'];

public function incrementPostCount($qr)
    {
     
         
        $schedule = Schedule::where('type', 'active')->first();
        
       $this->student = Student::where('qr', $qr)->first();
       if($this->student && $schedule) {

           $tick = Ticke::where('student_id', $this->student->id)
           ->where('schedule_id', $schedule->id)->whereDate('created_at', Carbon::today())->count();
        // $tick = Ticke::where('student_id', $this->student->id)->where('schedule_id', $schedule->id)->count();
         
        if($tick > 0){
            $this->status = 1;
            $this->emit('tickProblemEmit', "Schedule Successfully Deleted!");
                       $this->errorMessage = "ድጋሜ ነው ...";
     

           }
           else{
         $ticke = new Ticke();
         $ticke->student_id = $this->student->id;
         $ticke->schedule_id = $schedule->id;
         $ticke->save();
            $this->status = 2;
            return 0;
           }
       }
       else{
        $this->status = 0;
        $this->errorMessage = "Not Registered";
        $this->emit('dangerNotification111', "Schedule Successfully Deleted!");

       }
       
    }



    public function render()
    {
        return view('livewire.student-enterance');
    }
}
