<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Livewire\Component;

class StudentSuperAdmin extends Component
{
    public $student, $search,$inputUser;
   
public function updatedSearch()
{
    $this->inputUser = Student::where('type', 'like', '%' . $this->search . '%')
            ->orWhere('id_number', 'like', '%' . $this->search . '%')
            ->orWhere('department', 'like', '%' . $this->search . '%')
            ->orWhere('name', 'like', '%' . $this->search . '%')
            ->get();
         
        $this->render();
}
public function StatusChangeUnapprove($id)
{
    $student = Student::where('id', $id)->first();
    $student->status = "Unapproved";
        $student->save();
        $this->render();
}

    public function StatusChangeApprove($id)
    {
         
        $student = Student::where('id', $id)->first();
        $student->status = "Approved";
            $student->save();
            $this->render();
    }
    public function render()
    {
        if($this->inputUser == null)
        
        return view('livewire.student-super-admin', ['students'=>Student::latest()->get()]);
        
        
        return view('livewire.student-super-admin', ['students'=>$this->inputUser]);

    }
}
