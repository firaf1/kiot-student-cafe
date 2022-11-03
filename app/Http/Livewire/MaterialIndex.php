<?php

namespace App\Http\Livewire;

use stdClass;
use App\Models\Role;
use App\Models\User;
use App\Models\Input;
use Livewire\Component;
use App\Models\Schedule;
use App\Models\Measurement;
use App\Models\Input_Role;
use Illuminate\Support\Facades\Auth;

class MaterialIndex extends Component
{
    
    public $time,  $title,$multi,$roles,$edited_roles, $edited_multi, $editTitle,$editMeasurement, $schedule_id,$measurements,  $schedules, $measurement;
    protected $rules = [

        'title' => 'required|unique:inputs,name',
        'measurement' => 'required|unique:inputs,name',
       
        

    ];
    public function mount()
    {
        
        $this->schedules = Input::latest()->get();
        $this->roles = Role::where('status','Approved')->get();
        $this->measurements = Measurement::latest()->get();
        
    }
public function delete_role($id)
{ 
 
 $input = Input_Role::find($id);
  
 $input->delete();
  
 $this->emit('postAdded', "Role Is Successfully Deleted!", 'success', 'center' , 'Success');
        $this->mount();
    
}
   

    
    public function AddSchedule()
    {
       
        // foreach ($this->multi as $m){
        //     dd($m);
        // }
        // $answers;
        // dd($this->multi);
   
// dd($answers);
  
 
        $this->validate();
      
        $input = new Input();
        $input->name = $this->title;
        $input->measurement_id = $this->measurement;
       
        $input->status = "Approved";
        $input->save();

        for ($i = 0; $i < count($this->multi); $i++) {
            $in = new Input_Role();
            $in->role_id = $this->multi[$i];
            $in->input_id = $input->id;
            $in->save();
            }
        // dd(User::find(Auth::user()->id));

        $this->emit('postAdded', "Input Successfully Added!!", 'info', 'right');
        $this->reset();
   $this->mount();
           
    }

    public function deletedId($id)
    {
      $this->delete_id = $id;
      $this->emit('Show_shedule_warning_modal', "Input Successfully Added!");
    }
    public function delete()
    {
        $rr = Input_Role::where('input_id', $this->delete_id)->get();
        foreach ($rr as $r){
            $r->delete();
        }
       
        $sche = Input::where('id', $this->delete_id)->first();
        $sche->delete();
        $this->mount();
        $this->emit('dangerNotification', "Input Successfully Deleted!");

    }
    public function editSchedule($id)
    {
        $this->edited_multi = null;
        $input = Input::find($id);
         
         
        $xx = $input->roles;

          $ff = unserialize(base64_decode($xx));
         $this->edited_roles = Input_Role::where('input_id', $id)->get();
  
        $this->schedule_id = $id;
        $this->editTitle = $input->name;
      $this->editMeasurement = $input->measurement_id;
        $this->emit('EditscheduleModal', "Input Successfully Deleted!");
    }

    public function update_Schedule()
    {
        // dd($this->edited_multi);
        if($this->schedule_id == null)
        return $this->emit('postAdded', "Oops Something is went wrong!", 'error', 'center');
        $rr = Input_Role::where('input_id', $this->schedule_id)->get();
foreach ($rr as $r){
    $r->delete();
}
 
        $input = Input::where('id',$this->schedule_id)->first();
         
        $input->name = $this->editTitle;
        $input->measurement_id = $this->editMeasurement;
        $input->save();

        
        for ($i = 0; $i < count($this->edited_multi); $i++) {
            $in = new Input_Role();
            $in->role_id = $this->edited_multi[$i];
            $in->input_id = $input->id;
            $in->save();
            }
        $this->mount();
        $this->emit('postAdded', "Input Successfully Updated!", 'success', 'center');

    }
    public function render()
    {
        return view('livewire.material-index');
    }
}
