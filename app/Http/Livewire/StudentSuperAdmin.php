<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Livewire\Component;

class StudentSuperAdmin extends Component
{
    public $student;
    public function mount()
    {
        $this->students = Student::latest()->get();
    }
public function StatusChangeUnapprove($id)
{
    $student = Student::where('id', $id)->first();
    $student->status = "Unapproved";
        $student->save();
        $this->mount();
}

    public function StatusChangeApprove($id)
    {
         
        $student = Student::where('id', $id)->first();
        $student->status = "Approved";
            $student->save();
            $this->mount();
    }
    public function render()
    {
        return view('livewire.student-super-admin');
    }
}
