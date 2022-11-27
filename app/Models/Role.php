<?php

namespace App\Models;

use App\Models\RoleConsumption;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    /**
     * Get the consumer that owns the Role
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function consumer()
    {
        return $this->belongsTo(RoleConsumption::class, 'role_id', 'id');
    }
    /**
     * The Role that belong to the Role
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function consu($id)
    {
        $con = RoleConsumption::where('role_id', $id)->first();
        return $con->name;
        return 'dd';
        return $this->belongsTo(RoleConsumption::class, 'role_id');
    }
    public function consuM($id)
    {
        $con = RoleConsumption::where('role_id', $id)->first();
        return $con->measurement;
        return 'dd';
        return $this->belongsTo(RoleConsumption::class, 'role_id');
    }
    public function conCheck($id)
    {
        $role = RoleConsumption::where('role_id',$id)->count();
        if($role == 0) return false;
        if($role >0) return true;
    }
}
