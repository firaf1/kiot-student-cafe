<?php

namespace App\Http\Livewire;

use App\Models\Input;
use App\Models\Store;
use Livewire\Component;

class StoreIndex extends Component
{
    public $items, $inputs;
    public function mount()
    {
        $this->items = Store::all();
        $this->inputs = Input::all();
    }
    public function render()
    {

        return view('livewire.store-index');

    }
}