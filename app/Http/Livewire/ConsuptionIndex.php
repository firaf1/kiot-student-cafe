<?php

namespace App\Http\Livewire;

use App\Models\Role;
use App\Models\User;
use App\Models\Store;
use Livewire\Component;
use App\Models\Schedule;
use App\Models\Consumption;
use App\Models\RoleConsumption;
use Illuminate\Support\Facades\Auth;
 

class ConsuptionIndex extends Component
{
    public $amount, $schedules, $editSchedule, $schedule, $conId, $scheduleErrorMessage, $delete_id, $editAmount, $editconMeas, $conEditId, $consumptions;
    
    public function mount()
    {
        $this->schedules = Schedule::where('status', 'Approved')->get();
        $this->consumptions = Consumption::where('user_id', Auth::user()->id)->latest()->get();
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

    
    public function AddSchedule()
    {
    
        $this->validate([
            'amount' => 'required|numeric',
            'schedule' => 'required',
         ]);
            $role = Role::find(Auth::user()->role_id);
            if(!$role) return $this->emit('postAdded', "You have no roles assigned!", 'error', 'right');
            if(!(RoleConsumption::where('role_id', $role->id)->first())) 
            return $this->emit('postAdded', "Your Role is not assigned any Consumption!", 'error', 'right');
         $rolcon = RoleConsumption::where('role_id', $role->id)->first();
         $conn = new Consumption();
       $conn->amount = $this->amount;
       $conn->role_id = $rolcon->id;
       $conn->schedule_id = $this->schedule;
       $conn->status = "Pending";
       $conn->user_id = Auth::user()->id;
       $conn->save();
       $this->amount = null;
            $this->mount();
              $this->emit('postAdded', "  Successfully Added!", 'success', 'right');
      
   
    }

    public function deletedId($id)
    {
      $this->delete_id = $id;
      $this->emit('Show_shedule_warning_modal', "Schedule Successfully Added!");
    }
    public function delete()
    {
        $con = Consumption::findOrFail($this->delete_id);
        $con->delete();
        $this->mount();
        $this->emit('postAdded', "Successfully deleted!", 'warning', 'right');

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
    public function editConsuption($id)
    {
       $this->conEditId = $id;
       $con = Consumption::findOrFail($id);
       $this->editSchedule = $con->schedule_id;
       $this->editAmount = $con->amount;
       

    }
    public function updatCon()
    {
        $this->validate([
            'editAmount' => 'required|numeric',
            'editSchedule' => 'required',
        ]);
        $con = Consumption::findOrFail($this->conEditId);
        $con->amount = $this->editAmount;
        $con->schedule_id = $this->editSchedule;
        $con->save();
        $this->emit('postAdded', "Successfully Updated!", 'success', 'right');
        $this->mount();

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
        return view('livewire.consuption-index');
    }
}
