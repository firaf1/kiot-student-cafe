<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Livewire\Component;

class StudentEnterance extends Component
{
    public $student;

    protected $listeners = ['postAdded' => 'incrementPostCount'];

public function incrementPostCount($qr)
    {
       $this->student = Student::where('qr', $qr)->first();
       
    }



    public function render()
    {
        return view('livewire.student-enterance');
    }
}
