<?php

namespace App\Models;

use App\Models\Measurement;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Input extends Model
{

    use HasFactory;

    /**
     * Get the measurement that owns the Input
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function measurement()
    {
        return $this->belongsTo(Measurement::class);
    }
    public function totalIn($id)
    {
        $inStore = Store::where('status', 'Approved')->where('type', 'in')->where('inputs_id', $id)->sum('amount');
        $outStore = Store::where('status', 'Approved')->where('type', 'out')->where('inputs_id', $id)->sum('amount');
        $outStore = $outStore + Store::where('status', 'Taken')->where('type', 'out')->where('inputs_id', $id)->sum('amount');
        $rest = $inStore - $outStore;
        if ($inStore != 0) {
            return ($rest * 100) / $inStore;
        }

        return 0;
    }
    public function check($id)
    {
        $store = Store::where('status', 'Approved')->where('inputs_id', $id)->first();
        if ($store) {
            return true;
        }

        return false;
    }
    public function inItems($id)
    {
        $inStore = Store::where('status', 'Approved')->where('type', 'in')->where('inputs_id', $id)->sum('amount');
        $outStore = Store::where('status', 'Approved')->where('type', 'out')->where('inputs_id', $id)->sum('amount');
        $outStore = $outStore + Store::where('status', 'Taken')->where('type', 'out')->where('inputs_id', $id)->sum('amount');
        return $inStore - $outStore;
    }
    public function one_input($id)
    {

        $input = Role::find($id);
        return $input->name;
    }
    public function roles($id)
    {
        $role = Input_Role::where('input_id', $id)->get();

        return $role;
    }
    public function roleCheck($id)
    {

        $in = Input_Role::where('input_id', $id)->where('role_id', Auth::user()->role_id)->first();
        if ($in != null) {
            return true;
        } else {
            false;
        }

    }
    public function check_one_hour($id)
    {
        $store = Store::find($id);
        $date = Carbon::parse($store->created_at);
        $current_hour = Carbon::now()->format('Y-m-d H:i:s');
        dd($date, $current_hour);
        if ($date->isToday()) {
            $hour = $date->format('h');
            if ($hour);
        }
        //        dd($isToday);
    }
    public function CheckStore($id)
    {
        $date = new \DateTime();

        $date->modify('-1 hours');
        $formatted_date = $date->format('Y-m-d H:i:s');

        $inStore = Store::where('type', 'in')->where('status', 'Approved')->where('created_at', '<', $formatted_date)
            ->where('inputs_id', $id)->sum('amount');
        $outStore = Store::where('type', 'out')->where('status', 'Approved')->where('created_at', '<', $formatted_date)
            ->where('inputs_id', $id)->sum('amount');
        return $inStore - $outStore;
    }
}
