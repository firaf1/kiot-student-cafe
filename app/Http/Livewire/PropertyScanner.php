<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Ticke;
use App\Models\Student;
use Livewire\Component;
use App\Models\Property;
use App\Models\Schedule;
use App\Models\Notification;


class PropertyScanner extends Component
{
    public $student, $status, $errorMessage, $properties, $proStatus=0;

    protected $listeners = ['postAdded' => 'incrementPostCount'];

public function incrementPostCount($qr)
    {
     
         
        $schedule = Schedule::where('type', 'active')->first();
     
       $this->student = Student::where('qr', $qr)->first();
       
       $this->proStatus =0;
       if($this->student){
        $this->emit('beepBeepsuccessSound', "Schedule Successfully Deleted!");
        if($this->student->status == "Unapproved"){
            $this->status = 2;
            $this->proStatus = 1;
            $this->properties = Property::where('status', 'DDDd')->get();
            return $this->emit('dangerNotification111', "Schedule Successfully Deleted!");
           }
        $this->status = 2;
           $type = $this->student->type;
           $this->properties = Property::where('user_id', $this->student->id)->where('status', 'Approved')->get(); 
      
        
    }
       else{
        $this->status = 0;
        $this->errorMessage = "Not Registered";
        $this->emit('dangerNotification111', "Schedule Successfully Deleted!");

       }
       
    }



    public function render()
    {
        return view('livewire.property-scanner');
    }
}
