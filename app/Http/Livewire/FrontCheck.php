<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Ticke;
use App\Models\Student;
use Livewire\Component;
use App\Models\Property;
use App\Models\Schedule;
use App\Models\Notification;


class FrontCheck extends Component
{
    public $student, $status, $errorMessage, $properties, $proStatus=0;

    protected $listeners = ['postAdded' => 'incrementPostCount'];

public function incrementPostCount($qr)
    {
     
         
        $schedule = Schedule::where('type', 'active')->first();
        if($schedule == null){
           $this->status = 0;
            $this->emit('tickProblemEmit', "Schedule Successfully Deleted!");
            return $this->errorMessage = "there is no active schedule";
        }

       $this->student = Student::where('qr', $qr)->first();
       
       $this->proStatus =0;
       if($this->student){
        $this->status = 2;
        if($this->student->status == "Unapproved"){
            $this->emit('dangerNotification111', "Schedule Successfully Deleted!");
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
        return view('livewire.front-check');
    }
}
