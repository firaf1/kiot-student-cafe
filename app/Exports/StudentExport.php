<?php

namespace App\Exports;

use stdClass;
use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;

class StudentExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public $students, $tempStudent;
    public function __construct($students)
    {
        $this->students = $students;
    }
    public function collection()
    {
        
        foreach($this->students as $stud){
     
            $st = Student::where('id',$stud->student_id )->get(['name', 'id_number', 'phone_number', 'department','reg_type', 'type' ]);
            if($this->tempStudent == null){
                $this->tempStudent = $st;
            } else $this->tempStudent->push($st);
        }  
           return $this->tempStudent;
        }
        
        

 
 
}
