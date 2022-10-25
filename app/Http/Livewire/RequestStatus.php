<?php

namespace App\Http\Livewire;

use App\Models\Input;
use App\Models\Store;
use Livewire\Component;
use Livewire\WithPagination;

class RequestStatus extends Component
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
              
                // dd($searchInput);
                $i = 0;
                $isF = false;
                $this->searchItems = null;
                foreach ($searchInput as $se) {
                   
                    
                    $store = Store::where('inputs_id', $se->id)->where('status', '!=', 'Taken')->where('type', 'out')->get();
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

    public function approvedStore($id)
    {
        $store = Store::find($id);
        if($store->status!="Taken"){
        $input_id = $store->input_id;
        $inStore = Store::where('type', 'in')->where('status', 'Approved')->where('inputs_id', $input_id)->sum('amount');
        $outStore = Store::where('type', 'in')->where('status', 'Approved')->where('inputs_id', $input_id)->sum('amount');
        if (($inStore - $outStore) > $store->amount) {

            return $this->emit('sweet_alert_comfirmation', $store->amount . "Items is not found in store", 'error', 'Oops...');
            $this->resetPage();

        }
        $store->status = "Approved";
        $store->save();
        $this->emit('postAdded', "Schedule Successfully Approved!", 'success', 'right');
        $this->resetPage();
    }
    else{
        $this->emit('postAdded', "Already Taken From The Store!", 'success', 'right');
    }
    }
    public function UnapprovedStore($id)
    {
        $store = Store::find($id);
      
        $store->status = "Unapproved";
        $store->save();
        $this->emit('postAdded', "Items Successfully Unapproved!", 'success', 'right');
        $this->resetPage();
    }
    public function render()
    {
        if ($this->searchItems != null) {
            
            return view('livewire.request-status', ['items' => $this->searchItems]);
        } else {
            $this->totalItems = Store::where('type', 'out')->where('status', '!=', 'Taken')->count();
            $this->allInputs = Input::all();

            return view('livewire.request-status', ['items' => Store::where('type', 'out')->where('status', '!=', 'Taken')->latest()->paginate(30)]);

        }
    }
}
