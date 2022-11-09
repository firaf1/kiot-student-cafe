<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Livewire\Component;
use App\Models\Property;
use App\Models\Notification;
use Livewire\WithFileUploads;
use App\Models\Property_Report;

class PropertyRegister extends Component
{
    use WithFileUploads;
    public $id_number, $first, $second, $msg, $third, $serial_number;
    public function save()
    {
        $this->validate([
            'first' => 'required|image|max:2048',
            'second' => 'required|image|max:2048', // 1MB Max
            'third' => 'required|image|max:2048',
            'id_number' => 'required',
            'serial_number' => 'required',
        ]);
        $student = Student::where('id_number', $this->id_number)->first();
        if (!$student) {
            return $this->addError('id_number', 'ID number is not Register');
        }
        $pro = Property::where('user_id', $student->id)->count();
        if($pro>3){
            return $this->addError('id_number', 'Not allowed more than 3 properties');
        }
        if(0 != Property::where('serial_number', $this->serial_number)->count()){
           $pro_report = new Property_Report();
           $temp_id = Property::where('serial_number', $this->serial_number)->first();
           $pro_report->property_id = $temp_id->id;
           $pro_report->student_id = $student->id;
           $pro_report->status = "Pending";
           $pro_report->save();
           
           $not = new Notification();
           $not->user_id = $student->id;
           $not->save();
           
            return $this->msg = "Property is Successfully saved";
        }
         
        $property = new Property();
        $tempImage = 'kiot-property-1' . time() . '.' . $this->first->extension();
        $this->first->storeAs('Property/', $tempImage, 'public');
        $property->firstImage = "storage/Property/" . $tempImage;

        $tempImage = 'kiot-property-2' . time() . '.' . $this->second->extension();
        $this->second->storeAs('Property/', $tempImage, 'public');
        $property->secondImage = "storage/Property/" . $tempImage;

        $tempImage = 'kiot-property-3' . time() . '.' . $this->third->extension();
        $this->third->storeAs('Property/', $tempImage, 'public');
        $property->thirdImage = "storage/Property/" . $tempImage;
        $property->serial_number = $this->serial_number;
        $property->user_id = $student->id;
        $property->status = "Pending";
        $property->save();
        $this->reset();
        $this->msg = "Property is Successfully saved";

    }
    public function render()
    {
        return view('livewire.property-register');
    }
}
