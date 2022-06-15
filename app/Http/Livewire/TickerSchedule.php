<?php

namespace App\Http\Livewire;

use DateTime;
use DateTimeZone;
use Carbon\Carbon;
use App\Models\Ticke;
use Livewire\Component;
use App\Models\Schedule;

class TickerSchedule extends Component
{
    public $title, $startingDate,$schedule,$scheduleErrorMessage, $editTitle, $editEndDate,$schedule_id, $editStartDate, $endingDate, $schedules;
    protected $rules = [

        'title' => 'required|unique:schedules,title',
        'startingDate' => 'required|numeric|min:1|max:24',
        'endingDate' => 'required|numeric|min:1|max:24',
        

    ];
    public function mount()
    {
        // dd(Carbon::now('Africa/Nairobi'));
        $tick = Ticke::whereDate('created_at', Carbon::today())->get();
        
        $this->schedules = Schedule::where('status', 'Approved')->latest()->get();
    }

    public function StatusChangeUnapprove($id)
{
   
    $student = Schedule::where('id', $id)->first();
    $student->type = "inactive";
        $student->save();
        $this->mount();
        $this->emit('postAdded', "Schedule Successfully InActive!");
        $this->emit('postAdded', "Schedule Successfully InActive!!!", 'warning', 'center');
}

    public function StatusChangeApprove($id)
    {
        $sche = Schedule::where('type', 'active')->get();
        foreach($sche as $ss){
            $ss->type = 'inactive';
            $ss->save();
        }

        $student = Schedule::where('id', $id)->first();
        $student->type = "active";
            $student->save();

            $this->mount();
            $this->emit('postAdded', "Schedule Successfully Approved!!", 'info', 'right');
    }
    

    
     
     
    public function render()
    {
        return view('livewire.ticker-schedule');
    }
}
