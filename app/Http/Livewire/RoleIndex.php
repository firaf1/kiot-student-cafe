<?php

namespace App\Http\Livewire;

use App\Models\Role;
use App\Models\User;
use App\Models\Store;
use Livewire\Component;
use App\Models\RoleConsumption;
 

class RoleIndex extends Component
{
    public $title, $conId, $editConName, $editconMeas, $conName, $editConId, $conMeasur, $startingDate,$schedule,$scheduleErrorMessage, $editTitle, $editEndDate,$schedule_id, $editStartDate, $endingDate, $schedules;
    protected $rules = [

        'title' => ['regex:/^[a-zA-Z\s]*$/','required','unique:roles,name']
       
        

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
        $users = User::where('role_id',$this->delete_id)->count();
        if($user > 0){
            return $this->emit('postAdded', "You Cann't delete this role becouse it has user Role!", 'success', 'right');

        }

        $role = RoleConsumption::where('role_id', $this->delete_id)->count();
        if($role > 0){
            return $this->emit('postAdded', "You Cann't delete this role becouse it has Consumption!", 'success', 'right');

        }
      
        $sche = Role::where('id', $this->delete_id)->first();
        $sche->delete();
        $this->mount();
        $this->emit('dangerNotification', "Schedule Successfully Deleted!");

    }
    public function addConsuption($id)
    {
        $this->conId = $id;
    }
    public function submitCon()
    {
        $this->validate([
            'conName' => 'alpha|required|unique:role_consumptions,name',
            'conMeasur' => 'alpha|required'
        ]);
        $con = new RoleConsumption();
        $con->name = $this->conName;
        $con->measurement = $this->conMeasur;
        $con->role_id = $this->conId;
        $con->save();
        $this->emit('postAdded', "Successfully Added!", 'success', 'center');

    }
    public function editCon($id)
    {
       $this->editConId = $id;
       $mm = RoleConsumption::where('role_id', $id)->first();
       $this->editConName = $mm->name;
       $this->editconMeas = $mm->measurement;

    }
    public function updatCon()
    {
        
        $mm = RoleConsumption::where('role_id', $this->editConId)->first();
        $this->validate([
           'editConName' => 'alpha|required|unique:role_consumptions,name,'.$mm->id,
           'editconMeas' => 'required|alpha'
       ]);
        $mm->name = $this->editConName;
        $mm->measurement = $this->editconMeas;
        $mm->save();
        $this->emit('postAdded', "Successfully Updated!", 'success', 'right');

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
