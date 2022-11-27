<?php

namespace App\Imports;

use App\Models\Student;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements ToCollection, WithHeadingRow
{

    public function collection(Collection $rows)
    {
        Validator::make($rows->toArray(), [
            '*.first_name' => 'required|alpha',
            '*.last_name' => 'required|alpha',
            '*.department' => ['regex:/^[a-zA-Z\s]*$/','required'],
            '*.id_number' => 'required|unique:students,id_number',
            '*.cafteria' => 'required',
            '*.phone_number' => 'min:9|max:9|required|unique:students,phone_number',
            '*.registratin_type' => 'required',
        ])->validate();
       

        foreach ($rows as $row) {
            if(Student::where('id_number', $row['id_number'])->count() == 0){
               $myID = str_replace("/","-",$row['id_number']);
                Student::create([
                    'name' => $row['first_name'] . " " . $row['last_name'],
                    'department' => $row['department'],
                    'id_number' => $row['id_number'],
                    'phone_number' => $row['phone_number'],
                    'type' => $row['cafteria'],
                    'image'=> 'storage/StudentImage'.'/'. $myID.'.jpg',
                    'status' => 'Approved',
                    'reg_type' => $row['registratin_type'],
                ]);
            }else{
               $student = Student::where('id_number', $row['id_number'])->first();
               $end = date('Y', strtotime('-1 years'));
               $student->created_at = now();
               $student->save();
            }
        }
      
        $end = date('Y', strtotime('-1 years'));
 
        $st = Student::whereYear('created_at', $end)->delete();


    }
}
