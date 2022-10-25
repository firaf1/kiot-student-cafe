<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Input;
use App\Models\Store;
use Livewire\Component;
use App\Models\Measurement;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class OutStore extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $amount, $allInputs, $search, $isLess, $isNotFound = false, $searchItems, $totalItems, $measurement;

    protected $rules = [
        'amount' => 'required',
        'measurement' => 'required',
    ];
    public function updatedSearch()
    {
        if ($this->search != null) {
            $searchInput = Input::where('name', 'like', $this->search)->orWhere('name', 'like', '%' . $this->search . '%')->get();
 
            if ($searchInput->count() > 0) {
              
                // dd($searchInput);
                $i = 0;
                $isF = false;
                $this->searchItems = null;
                foreach ($searchInput as $se) {
                   
                    
                    $store = Store::where('inputs_id', $se->id)->where('status', '!=', 'Taken')->where('type', 'out')
                    ->where('user_id', Auth::user()->id)->get();
                    if($store->count() != 0) {
                        $isF = true;

                        $i = 0;
                        foreach($store as $st){
                            if ($this->searchItems == null) {
                                $this->searchItems = $store;
                            } else {
                                $this->searchItems->push($st);
                                 
                            }
                            $i++;
                        }
                    }
                   
                }
                if($isF){
                    $this->isNotFound = false;
                } else{
                    $this->isNotFound = true;
                    $this->searchItems = null;
                }
                
            } else {
                $this->searchItems = null;
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
        $inStore = Store::where('type', 'in')->where('status', 'Approved')->where('inputs_id', $this->measurement)->sum('amount');
        $outStore = Store::where('type', 'out')->where('status', 'Approved')->where('inputs_id', $this->measurement)->sum('amount');
        if ($inStore) {
            if (($inStore - $outStore) < $this->amount) {
                return $this->addError('amount', 'The amount is More than Available in the  Store');

            }
        }
        $store = new Store();
        $store->inputs_id = $this->measurement;
        $store->amount = $this->amount;
        $store->type = "out";
        $store->status = "Pending";
        $store->user_id = "1";
        $store->role_id = "2";
        $store->save();
        $this->emit('postAdded', "Schedule Successfully Added!!", 'info', 'right');
        $this->reset();
        $this->render();

    }

    public function deletedId($id)
    {
        $this->delete_id = $id;
        $this->emit('Show_shedule_warning_modal', "Schedule Successfully Added!");
    }
    public function delete()
    {
        $sche = Store::where('type', 'out')->where('id', $this->delete_id)->first();
        $sche->delete();
        $this->render();
        $this->emit('dangerNotification', "Items is Successfully Deleted from Store");

    }
    public function editSchedule($id)
    {
        $schedule = Store::where('type', 'out')->find($id);
        $this->schedule_id = $id;

        $this->editTitle = $schedule->amount;
        $this->editMeasurement = $schedule->inputs_id;
        $this->emit('EditscheduleModal', "Schedule Successfully Deleted!");
    }

    public function update_Schedule()
    {

        $inStore = Store::where('type', 'in')->where('status', 'Approved')->where('inputs_id', $this->editMeasurement)->sum('amount');
        $outStore = Store::where('type', 'out')->where('status', 'Approved')->where('inputs_id', $this->editMeasurement)->sum('amount');
        if ($inStore) {
            if (($inStore - $outStore) < $this->editTitle) {
                return $this->addError('editTitle', 'The amount is More than Available in the  Store');

            }
        }

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
            return view('livewire.out-store', ['items' => $this->searchItems]);
        } else {
            $this->totalItems = Store::where('type', 'out')->where('status', '!=', 'Taken')->where('user_id', Auth::user()->id)->count();
            $this->allInputs = Input::all();

            return view('livewire.out-store', ['items' => Store::where('type', 'out')->where('status', '!=', 'Taken')->where('user_id', Auth::user()->id)->latest()->paginate(30)]);

        }
    }
}
