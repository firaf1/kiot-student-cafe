<?php

namespace App\Models;

use App\Models\Role;
use App\Models\RoleConsumption;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the role that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function roleNameCheck()
    {
       $role = Role::find(Auth::user()->role_id);
       if(!$role) return '';
       $roleCon = RoleConsumption::where('role_id', $role->id)->first();
       if($roleCon) return $role->name;
       return '';
    }

     public function roleName()
     {
        $role = Role::find(Auth::user()->role_id);
        if($role) return $role->name;
        return '';
     }

    public function role1()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
