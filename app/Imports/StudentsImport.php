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
            '*.first_name' => 'required',
            '*.last_name' => 'required',
            '*.department' => 'required',
            '*.id_number' => 'required',
            '*.cafteria' => 'required',
            
            '*.registratin_type' => 'required',
        ])->validate();

        foreach ($rows as $row) {
            Student::create([
                'name' => $row['first_name'] . " " . $row['last_name'],
                'department' => $row['department'],
                'id_number' => $row['id_number'],
                'type' => $row['cafteria'],
                'image'=> 'storage/StudentImage'.'/'. $row['id_number'].'.jpg',
                'status' => 'Approved',
                'reg_type' => $row['registratin_type'],
            ]);
        }
    }
}
