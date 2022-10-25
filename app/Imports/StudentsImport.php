<?php

namespace App\Imports;

use App\Models\Student;
 use Illuminate\Support\Collection;
use App\Models\Customer;
use Maatwebsite\Excel\Concerns\ToCollection;

class StudentsImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public $item;
    public function __construct($item)
    {
        $this->item = $item;
    }
    public function collection(Collection $rows)
    {
    
        foreach ($rows as $row) 
        {
           
            // Customer::create([
            //     'phone_number'=>$row[0],
            // ]);
          Student::create([
            'name'=> $row[0],
            'department'=> $this->item,
            'id_number'=> $row[2],
            'type'=> $row[3],
        ]);
    }
}
}
