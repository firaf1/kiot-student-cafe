<?php

namespace App\Http\Livewire;

use App\Models\Input;
use Livewire\Component;
use App\Models\Schedule;
use App\Models\Measurement;

class MaterialIndex extends Component
{
    
    public $time, $title,  $editTitle,$editMeasurement, $schedule_id,$measurements,  $schedules, $measurement;
    protected $rules = [

        'title' => 'required|unique:inputs,name',
        'measurement' => 'required|unique:inputs,name',
        
        

    ];
    public function mount()
    {
        
        $this->schedules = Input::latest()->get();
        $this->measurements = Measurement::latest()->get();
    }

   

    
    public function AddSchedule()
    {
       
        $this->validate();
      
        $input = new Input();
        $input->name = $this->title;
        $input->measurement_id = $this->measurement;
    $input->status = "Approved";
        $input->save();
        $this->emit('postAdded', "Input Successfully Added!!", 'info', 'right');
   $this->mount();
    }

    public function deletedId($id)
    {
      $this->delete_id = $id;
      $this->emit('Show_shedule_warning_modal', "Input Successfully Added!");
    }
    public function delete()
    {
        $sche = Input::where('id', $this->delete_id)->first();
        $sche->delete();
        $this->mount();
        $this->emit('dangerNotification', "Input Successfully Deleted!");

    }
    public function editSchedule($id)
    {
        $input = Input::find($id);
        $this->schedule_id = $id;
        $this->editTitle = $input->name;
      $this->editMeasurement = $input->measurement_id;
        $this->emit('EditscheduleModal', "Input Successfully Deleted!");
    }

    public function update_Schedule()
    {
        $input = Input::where('id',$this->schedule_id)->first();
        $input->name = $this->editTitle;
        $input->measurement_id = $this->editMeasurement;
        $input->save();
        $this->mount();
        $this->emit('postAdded', "Input Successfully Updated!", 'success', 'center');

    }
    public function render()
    {
        return view('livewire.material-index');
    }
}
