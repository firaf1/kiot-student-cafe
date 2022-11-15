<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Livewire\Component;
use App\Models\Property;

class PropertyIndex extends Component
{
    public $search, $searchItems, $delete_id;

    public function UpdatedSearch()
    {
        $users = Student::where('name', 'like', $this->search)->orWhere('id_number', 'like', '%' . $this->search . '%')
        ->orWhere('name', 'like', '%' . $this->search . '%')
        ->get();

        $this->searchItems = null;
        if($users->count()>0){
        foreach($users as $user){
            $pros = Property::where('user_id', $user->id)->get();
            if($pros->count()>0){
            // if($pros->count() > 0)
            // dd($pros);

            foreach($pros as $pro){
                if($this->searchItems ==null){
                    $this->searchItems =Property::where('user_id', $user->id)->get()->take(1);
                } else
                $this->searchItems->push($pro);
            }
        } else $this->searchItems = Student::where('id','<',1)->get();
        }
    }
        else{
               $dd = Property::where('id', 'like', $this->search)->orWhere('serial_number', 'like', '%' . $this->search . '%')->get();
           
            $this->searchItems = $dd;
       
        }
        
    }

    public function delete()
    {
        $rr = Property::find($this->delete_id);
        
        $rr->delete();
        $this->mount();
        $this->emit('dangerNotification', "Successfully Deleted!");

    }
    public function deletedId($id)
    {
      $this->delete_id = $id;
      $this->emit('Show_shedule_warning_modal', "Input Successfully Added!");
    }
    public function ChangeStat($status,$id)
    {
        $pro = Property::findOrFail($id);
        $pro->status = $status;
        $pro->save();
        $this->emit('postAdded', "Successfully ".$status."!!", 'success', 'center', 'Success');

    }

    public function render()
    {
        if($this->search == null)
        
        return view('livewire.property-index', ['propeties'=>Property::latest()->get()]);
        
        else
        return view('livewire.property-index', ['propeties'=>$this->searchItems]);
       
    }
}
