<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Input;
use App\Models\Store;
use Livewire\Component;
use App\Models\Measurement;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class BetDashboard extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $amount, $allInputs, $pending, $approved, $unapproved, $taken, $status=null, $search,$name="Tola", $isLess, $isNotFound = false, $searchItems, $totalItems, $measurement;

    protected $rules = [
        'amount' => 'required',
        'measurement' => 'required',
    ];
    protected $listeners = [
        'cart:update' => 'functionReceiverCallFromComponentA',
    ];
    public function functionReceiverCallFromComponentA(){
        $this->name = "Calla";
        $this->render();
    }
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
                   
                    
                    $store = Store::where('inputs_id', $se->id)->where('type', 'out')
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

    public function StatusChange($status)
    {
         $this->status = $status;
    }
    
    
   
    

    public function render()
    {
      
        $this->pending = Store::where('type', 'out')->where('user_id', Auth::user()->id)->where('status', 'Pending')->count();
        $this->approved = Store::where('type', 'out')->where('user_id', Auth::user()->id)->where('status', 'Approved')->count();
        $this->unapproved = Store::where('type', 'out')->where('user_id', Auth::user()->id)->where('status', 'Unapproved')->count();
        $this->taken = Store::where('type', 'out')->where('user_id', Auth::user()->id)->where('status', 'Taken')->count();
        if ($this->searchItems != null) {
            return view('livewire.bet-dashboard', ['items' => $this->searchItems]);
        } else {
            if($this->status ==null)
            $this->totalItems = Store::where('type', 'out')->where('user_id', Auth::user()->id)->count();
            else {
                $this->totalItems = Store::where('type', 'out')->where('status', $this->status)->where('user_id', Auth::user()->id)->count();
                return view('livewire.bet-dashboard', ['items' => Store::where('type', 'out')->where('status', $this->status)
                ->where('user_id', Auth::user()->id)->latest()->paginate(30)]);
            }
            $this->allInputs = Input::all();

            return view('livewire.bet-dashboard', ['items' => Store::where('type', 'out')->where('user_id', Auth::user()->id)->latest()->paginate(30)]);

        }
    }
}
