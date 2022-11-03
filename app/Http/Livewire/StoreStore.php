<?php

namespace App\Http\Livewire;

use App\Models\Input;
use App\Models\Store;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class StoreStore extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $amount, $password, $status = "Approved", $passwordMessage, $allInputs, $search, $isNotFound = false, $editedId, $searchItems, $totalItems, $measurement;

    protected $rules = [
        'amount' => 'required',
        'measurement' => 'required',
    ];
    public function updatedSearch()
    {
        if ($this->search != null) {
            $isInput = false;
            $searchItems = Input::where('name', 'like', $this->search)->orWhere('name', 'like', '%' . $this->search . '%')->where('status', $this->status)->get();
             if($searchItems->count()!=0){
                $this->searchItems = $searchItems;
             }else{
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
        $this->editedId = $id;

        $this->emit('signApproved', "Schedule Successfully Approved!", 'success', 'right');
        $this->resetPage();
    }

    public function save()
    {
        if ($this->password == null) {

            $this->emit('postAdded', "Password field is required!", 'error', 'center', 'Error');

        } else {

            $store = Store::findOrFail($this->editedId);

            $user = User::findOrFail($store->user_id);

            if (Hash::check($this->password, $user->password)) {
                $store->status = "Taken";
                $store->save();
                $this->emit('postAdded', "Successfully Updated!", 'success', 'center', 'Success');
                $this->reset();
            } else {
                $this->emit('postAdded', "Wrong Credential!", 'error', 'center', 'Error');

            }
            //    dd($this->editedId);
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

            return view('livewire.store-store', ['items' => $this->searchItems]);
        } else {
            $this->totalItems = Input::where('status', $this->status)->count();
            $this->allInputs = Input::all();

            return view('livewire.store-store', ['items' => Input::where('status', $this->status)->paginate(30)]);

        }
    }
}
