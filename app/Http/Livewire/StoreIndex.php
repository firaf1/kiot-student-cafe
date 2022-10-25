<?php

namespace App\Http\Livewire;

use App\Models\Input;
use App\Models\Store;
use Livewire\Component;
use App\Models\Measurement;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class StoreIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $amount, $allInputs, $search, $isNotFound = false, $searchItems, $totalItems, $measurement;

    protected $rules = [
        'amount' => 'required',
        'measurement' => 'required',
    ];
    public function updatedSearch()
    {
        if ($this->search != null) {
            $searchInput = Input::where('name', 'like', $this->search)->orWhere('name', 'like', '%' . $this->search . '%')->get();

            if ($searchInput->count() > 0) {
                $this->isNotFound = false;
                $store = Store::all();
                $i = 0;
                foreach ($searchInput as $se) {
                    $store = Store::where('inputs_id', $se->id)->latest()->get();
                    if ($i == 0) {
                        $this->searchItems = $store;
                    } else {
                        $this->searchItems->push($store);
                    }
                    $i++;
                }
                $this->resetPage();
            } else {
                $this->isNotFound = true;
                $this->resetPage();
            }

        } else {
            $this->isNotFound = false;
            $this->searchItems = null;
            $this->resetPage();
        }
    }

    public function addItems()
    {
        
        $this->validate();
    
        $store = new Store();
        $store->inputs_id = $this->measurement;
        $store->amount = $this->amount;
        $store->type = "in";
        $store->user_id = Auth::user()->id;
        $store->role_id = "2";
        $store->status = "Pending";
        $store->save();
        $this->reset();
        $this->emit('postAdded', "Schedule Successfully Added!!", 'info', 'right');
      

    }

    public function deletedId($id)
    {
        $this->delete_id = $id;
        $this->emit('Show_shedule_warning_modal', "Schedule Successfully Added!");
    }
    public function delete()
    {
        $sche = Store::where('id', $this->delete_id)->first();
        $sche->delete();
        $this->render();
        $this->emit('dangerNotification', "Items is Successfully Deleted from Store");

    }
    public function editSchedule($id)
    {
 
        $store = Store::find($id);
         if($store->status == "Approved") {
            $this->emit('sweet_alert_comfirmation', "Store Item is Already Approved!", 'error', 'oops!');
         } else if($store->status == "Pending"){
            $this->schedule_id = $id;
            $this->editTitle = $store->amount;
    $this->editMeasurement = $store->inputs_id;
            $this->emit('EditscheduleModal', "Schedule Successfully Deleted!");
         }
  
    }

    public function update_Schedule()
    {
        $schedule = Store::where('id', $this->schedule_id)->first();
        $schedule->amount = $this->editTitle;
        $schedule->inputs_id = $this->editMeasurement;
        $schedule->save();
        $this->render();
        $this->emit('postAdded', "Schedule Successfully Updated!", 'success', 'center');

    }

    public function render()
    {
        if ($this->searchItems != null) {
            return view('livewire.store-index', ['items' => $this->searchItems]);
        } else {
            $this->totalItems = Store::where('type','in')->count();
            $this->allInputs = Input::all();

            return view('livewire.store-index', ['items' => Store::where('type', 'in')->latest()->paginate(30)]);

        }
    }
}
