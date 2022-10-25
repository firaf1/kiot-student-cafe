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
