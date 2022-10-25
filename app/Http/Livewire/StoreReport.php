<?php

namespace App\Http\Livewire;

use App\Models\Input;
use App\Models\Store;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class StoreReport extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $amount, $password, $passwordMessage, $allInputs, $search, $isNotFound = false, $editedId, $searchItems, $totalItems, $measurement;

    protected $rules = [
        'amount' => 'required',
        'measurement' => 'required',
    ];
    public function updatedSearch()
    {
        if ($this->search != null) {
            $isInput = false;
            $searchInput = Input::where('name', 'like', $this->search)->orWhere('name', 'like', '%' . $this->search . '%')->get();
            if ($searchInput->count() == 0) {
                $isInput = true;
                $searchInput = User::where('fname', 'like', $this->search)->orWhere('fname', 'like', '%' . $this->search . '%')->get();

            }
            if ($searchInput->count() > 0) {

                // dd($searchInput);
                $i = 0;
                $isF = false;
                $this->searchItems = null;
                foreach ($searchInput as $se) {
                    if ($isInput) {
                        $store = Store::where('type', 'out')
                            ->where('status', 'Taken')->where('user_id', $se->id)->get();
                        if ($store->count() == 0) {

                            $store = Store::where('type', 'out')
                                ->where('status', 'Taken')->where('approved_by', $se->id)->get();
                        }

                    } else {
                        $store = Store::where('inputs_id', $se->id)->where('type', 'out')->where('status', 'Taken')->get();
                    }

                    if ($store->count() != 0) {
                        $isF = true;

                        $i = 0;
                        foreach ($store as $st) {
                            if ($this->searchItems == null) {
                                $this->searchItems = $store;
                            } else {
                                $this->searchItems->push($st);

                            }
                            $i++;
                        }
                    }

                }
                if ($isF) {
                    $this->isNotFound = false;
                } else {
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

            return view('livewire.store-report', ['items' => $this->searchItems]);
        } else {
            $this->totalItems = Store::where('type', 'out')->where('status', 'Taken')->count();
            $this->allInputs = Input::all();

            return view('livewire.store-report', ['items' => Store::where('type', 'out')->where('status', 'Taken')->latest()->paginate(30)]);

        }
    }
}
