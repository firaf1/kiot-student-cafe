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
       

       $this->student = Student::where('qr', $qr)->first();
       
       $this->proStatus =0;
       if($this->student){
        $this->status = 2;
        if($this->student->status == "Unapproved"){
            $not = new Notification();
            $not->type = "bar";
            $not->user_id = $this->student->id;
            $not->save();
             
            $this->emit('dangerNotification111', "Schedule Successfully Deleted!");
        }
        else{
          
            $this->emit('beepBeepsuccessSound', "Schedule Successfully Deleted!");
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
