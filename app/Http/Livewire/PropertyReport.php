<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Livewire\Component;
use App\Models\Property;
use App\Models\Property_Report;
class PropertyReport extends Component
{
    public $search, $searchItems, $delete_id;

    public function UpdatedSearch()
    {
       $this->searchItems = Student::where('id','<',1)->get();
        $users = Student::where('name', 'like', $this->search)->orWhere('id_number', 'like', '%' . $this->search . '%')
        ->orWhere('name', 'like', '%' . $this->search . '%')
        ->get();

        $this->searchItems = null;
        if($users->count()>0){
        foreach($users as $user){
            $pros = Property_Report::where('student_id', $user->id)->get();
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
               $dds = Property::where('id', 'like', $this->search)->orWhere('serial_number', 'like', '%' . $this->search . '%')->get();
                if($dds->count() > 0){
                    foreach($dds as $pro){
                        $temp =Property_Report::where('property_id', $pro->id)->get();
                            if($temp->count() > 0){
                                if($this->searchItems ==null){
                                    $this->searchItems = $temp;
                                } else
                                $this->searchItems->push($temp);
                            }
                          
                    }
                }
                else $this->searchItems = Student::where('id','<',1)->get();
            
        }
        
    }
    public function ChangeStat($status,$id)
    {
        $pro = Property_Report::findOrFail($id);
        $pro->status = $status;
        $pro->save();
        $this->emit('postAdded', "Successfully ".$status."!!", 'success', 'center', 'Success');

    }
    public function delete()
    {
        $rr = Property_Report::find($this->delete_id);
        
        $rr->delete();
        $this->mount();
        $this->emit('dangerNotification', "Successfully Deleted!");

    }
    public function deletedId($id)
    {
      $this->delete_id = $id;
      $this->emit('Show_shedule_warning_modal', "Input Successfully Added!");
    }
    public function render()
    {
        if($this->search == null)
        
        return view('livewire.property-report', ['propeties'=>Property_Report::latest()->get()]);
        
        else
        return view('livewire.property-report', ['propeties'=>$this->searchItems]);
       
    }
 
}
