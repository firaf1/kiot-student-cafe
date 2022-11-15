<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Schedule;
use App\Models\Measurement;

class MeasurementIndex extends Component
{
    public $title, $startingDate,$schedule,$scheduleErrorMessage, $editTitle, $editEndDate,$schedule_id, $editStartDate, $endingDate, $schedules;
    protected $rules = [

        'title' => 'required|unique:measurements,name',
        
        

    ];
    public function mount()
    {
        
        $this->schedules = Measurement::latest()->get();
    }

   

    
    public function AddSchedule()
    {
       
        
        $this->validate();
      
        $measurement = new Measurement();
        $measurement->name = $this->title;
        $measurement->save();
        $this->emit('postAdded', "Measurement Successfully Added!!", 'success', 'right');
   $this->mount();
    }

    public function deletedId($id)
    {
      $this->delete_id = $id;
      $this->emit('Show_shedule_warning_modal', "Measurement Successfully Added!");
    }
    public function delete()
    {
        $sche = Measurement::where('id', $this->delete_id)->first();
        $sche->delete();
        $this->mount();
        $this->emit('dangerNotification', "Measurement Successfully Deleted!");

    }
    public function editSchedule($id)
    {
        $schedule = Measurement::find($id);
        $this->schedule_id = $id;
        $this->editTitle = $schedule->name;
      
        $this->emit('EditscheduleModal', "Measurement Successfully Deleted!");
    }

    public function update_Schedule()
    {
        $schedule = Measurement::where('id',$this->schedule_id)->first();
        $schedule->name = $this->editTitle;
 
        $schedule->save();
        $this->mount();
        $this->emit('postAdded', "Measurement Successfully Updated!", 'success', 'right');

    }
    public function render()
    {
        return view('livewire.measurement-index');
    }
}
