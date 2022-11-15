<?php

namespace App\Http\Livewire;

use App\Models\Input;
use App\Models\Measurement;
use App\Models\Store;
use Livewire\Component;
use Livewire\WithPagination;

class StoreStatus extends Component
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
                   
                    
                    $store = Store::where('inputs_id', $se->id)->where('status', '!=', 'Taken')->where('type', 'in')->get();
                    if($store->count() != 0) {
                        $isF = true;

                        $i = 0;
                        foreach($store as $st){
                            if ($this->searchItems == null) {
                                $this->searchItems = Store::where('inputs_id', $se->id)->where('status', '!=', 'Taken')->where('type', 'in')->get()->take(1);
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
         $store->status = "Approved";
        
         $store->save();
         $this->emit('postAdded', "Schedule Successfully Approved!", 'success', 'right');
         $this->resetPage();
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

            return view('livewire.store-status', ['items' => $this->searchItems]);
            
        } else {
            $this->totalItems = Store::where('type', 'in')->count();
            $this->allInputs = Input::all();

            return view('livewire.store-status', ['items' => Store::where('type', 'in')->latest()->paginate(30)]);

        }
    }
}
