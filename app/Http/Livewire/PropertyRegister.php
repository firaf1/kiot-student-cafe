<?php

namespace App\Http\Livewire;

use App\Models\Property;
use App\Models\Student;
use Livewire\Component;
use Livewire\WithFileUploads;

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
            return $this->addError('id_number', 'ID number is not found');

        }

        $property = new Property();
        $tempImage = 'kiot-property-' . time() . '.' . $this->first->extension();
        $this->first->storeAs('User_Profile/', $tempImage, 'public');
        $property->firstImage = "storage/Property/" . $tempImage;

        $tempImage = 'kiot-property-' . time() . '.' . $this->second->extension();
        $this->second->storeAs('Property/', $tempImage, 'public');
        $property->secondImage = "storage/Property/" . $tempImage;

        $tempImage = 'kiot-property-' . time() . '.' . $this->third->extension();
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
