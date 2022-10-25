<?php

namespace App\Http\Livewire;

use App\Models\Role;
use Livewire\Component;
 

class RoleIndex extends Component
{
    public $title, $startingDate,$schedule,$scheduleErrorMessage, $editTitle, $editEndDate,$schedule_id, $editStartDate, $endingDate, $schedules;
    protected $rules = [

        'title' => 'required|unique:roles,name',
       
        

    ];
    public function mount()
    {
        
        $this->schedules = Role::latest()->get();
    }

    public function StatusChangeUnapprove($id)
{
    $student = Role::where('id', $id)->first();
    $student->status = "Unapproved";
        $student->save();
        $this->mount();
        $this->emit('postAdded', "Schedule Successfully Unapproved!");
        $this->emit('postAdded', "Schedule Successfully Unapproved!!", 'warning', 'center');
}

    public function StatusChangeApprove($id)
    {
         
        $student = Role::where('id', $id)->first();
        $student->status = "Approved";
            $student->save();

            $this->mount();
            $this->emit('postAdded', "Schedule Successfully Approved!!", 'info', 'right');
    }
    public function AddSchedule()
    {
        
        $this->validate();
        $role = new Role();
       $role->name = $this->title;
       $role->save();
            $this->mount();
              $this->emit('postAdded', "Role Successfully Added!", 'success', 'right');
      
   
    }

    public function deletedId($id)
    {
      $this->delete_id = $id;
      $this->emit('Show_shedule_warning_modal', "Schedule Successfully Added!");
    }
    public function delete()
    {
        $sche = Role::where('id', $this->delete_id)->first();
        $sche->delete();
        $this->mount();
        $this->emit('dangerNotification', "Schedule Successfully Deleted!");

    }
    public function editSchedule($id)
    {
        $schedule = Role::find($id);
        $this->schedule_id = $id;
        $this->editTitle = $schedule->name;
      
        $this->emit('EditscheduleModal', "Schedule Successfully Deleted!");
    }

    public function update_Schedule()
    {
        $schedule = Role::where('id',$this->schedule_id)->first();
        $schedule->name = $this->editTitle;
       
        $schedule->save();
        $this->mount();
        $this->emit('postAdded', "Schedule Successfully Updated!", 'success', 'center');

    }
    public function render()
    {
        return view('livewire.role-index');
    }
}
