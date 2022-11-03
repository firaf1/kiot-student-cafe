<?php

namespace App\Models;

use App\Models\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Input_Role extends Model
{
    use HasFactory;
    public function role($id)
    {
       $input = Role::find($id);
       if($input)
       return $input->name;
    }
}
