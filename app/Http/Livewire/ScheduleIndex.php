<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Schedule;

class ScheduleIndex extends Component
{
    public $title, $startingDate,$schedule,$scheduleErrorMessage, $editTitle, $editEndDate,$schedule_id, $editStartDate, $endingDate, $schedules;
    protected $rules = [

        'title' => 'required|unique:schedules,title',
         
        

    ];


    public function mount()
    {
        
        $this->schedules = Schedule::latest()->get();
    }
    public function Tocafe($id)
    {
        
        $student = Schedule::where('id', $id)->first();
        $student->is_for_both = "cafe";
            $student->save();
            $this->mount();
         
            $this->emit('postAdded', "Schedule Successfully Changed to cafe!!!", 'warning', 'center', 'Success');
    }
    public function Toboth($id)
    {
        
        $student = Schedule::where('id', $id)->first();
        $student->is_for_both = "both";
            $student->save();
            $this->mount();
            
            $this->emit('postAdded', "Schedule Successfully Changed to Both!!!", 'warning', 'center', 'Success');
    }

    public function StatusChangeUnapprove($id)
{
    $student = Schedule::where('id', $id)->first();
    $student->status = "Unapproved";
        $student->save();
        $this->mount();
        $this->emit('postAdded', "Schedule Successfully Unapproved!");
        $this->emit('postAdded', "Schedule Successfully Unapproved!!", 'warning', 'center', 'Success');
}

    public function StatusChangeApprove($id)
    {
       
        $student = Schedule::where('id', $id)->first();
        $student->status = "Approved";
            $student->save();

            $this->mount();
            $this->emit('postAdded', "Schedule Successfully Approved!!", 'info', 'right', 'Success');
    }
    public function AddSchedule()
    {
      
        $this->validate();
     
      
            $schedule = new Schedule();
            $schedule->title = $this->title;
            $schedule->type = "inactive";
 
            $schedule->status = "Unapproved";
            $this->scheduleErrorMessage = "";
            $schedule->save();
         
            $this->mount();
            $this->emit('postAdded', "Schedule Successfully Added!", 'success', 'right', 'Success');
       
    
   
    }

    public function deletedId($id)
    {
      $this->delete_id = $id;
      $this->emit('Show_shedule_warning_modal', "Schedule Successfully Added!");
    }
    public function delete()
    {
        $sche = Schedule::where('id', $this->delete_id)->first();
        $sche->delete();
        $this->mount();
        $this->emit('dangerNotification', "Schedule Successfully Deleted!");

    }
    public function editSchedule($id)
    {
        $schedule = Schedule::find($id);
        $this->schedule_id = $id;
        $this->editTitle = $schedule->title;
        $this->editEndDate = $schedule->ending_time;
        $this->editStartDate = $schedule->starting_time;
        $this->emit('EditscheduleModal', "Schedule Successfully Deleted!");
    }

    public function update_Schedule()
    {
        $schedule = Schedule::where('id',$this->schedule_id)->first();
        $schedule->title = $this->editTitle;
        $schedule->ending_time = $this->editEndDate;
        $schedule->starting_time = $this->editStartDate;
        $schedule->save();
        $this->mount();
        $this->emit('postAdded', "Schedule Successfully Updated!", 'success', 'center','Notes');

    }
    public function render()
    {
        return view('livewire.schedule-index');
    }
}
