<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Notification;
use Illuminate\Contracts\View\View;
 

class NotificationIndex extends Component
{
    public $old = 0, $latest=0, $users;
    public function mount()
    {
        
        $old = Notification::latest()->first();
        if($old) 
        $this->old = $old->id;
    }
    protected $listeners = ['stopeAlarm' => 'stop'];
    public function stop()
    {
        
        $this->mount();
    }
    public function deleteAll()
    {
        $nots = Notification::all();
        foreach($nots as $not){
            $not->delete();
            $this->mount();
            $this->emit('SweetAletSuccessNotification', "All Notification deleted successfully!", 'success', 'right');
        }
    }
    public function render()
    {
        $this->users = Notification::latest()->get();
        $latest = Notification::latest()->first(); 
       
        if($latest)
        $this->latest = $latest->id;
      
        if($this->latest > $this->old){
            if($latest->type == "bar"){
                $this->emit('SweetAletSuccessNotification', "Someone Try to Enter With Blocked Card !", 'warning', 'right');
            }
            if($latest->type == "property")
            $this->emit('SweetAletSuccessNotification', "Someone Try to Register Already Registered Property !", 'warning', 'right');

            if($latest->type == "cafe")
            $this->emit('SweetAletSuccessNotification', "Someone Try to Enter Cafeteria With Blocked Card !", 'warning', 'right');

            $this->emit('notificationSound', "Schedule Successfully Deleted!");
        }
       
     
        return view('livewire.notification-index',['count' => $this->old]);
    }
}
