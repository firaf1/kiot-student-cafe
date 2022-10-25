<?php

namespace App\Models;

use App\Models\Input;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    /**
     * Get the input that owns the Store
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function inItems($id)
    {
        $inStore = Store::where('status', 'Approved')->where('type', 'in')->where('inputs_id', $id)->sum('amount');
        $outStore = Store::where('status', 'Approved')->where('type', 'out')->where('inputs_id', $id)->sum('amount');
       $outStore = $outStore + Store::where('status', 'Taken')->where('type', 'out')->where('inputs_id', $id)->sum('amount');
        return $inStore - $outStore;
    }
    public function ItemsPercent($id)
    {
        $inStore = Store::where('status', 'Approved')->where('type', 'in')->where('inputs_id', $id)->sum('amount');
        $outStore = Store::where('status', 'Approved')->where('type', 'out')->where('inputs_id', $id)->sum('amount');
        if ($outStore != 0) {
            $per1 = (($outStore * 100) / $inStore);
            if ($per1 < 0) {
                return 0;
            }

            return $per1;
        } else {
            return 0;
        }

    }
    public function input()
    {
        return $this->belongsTo(Input::class, 'inputs_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function CheckHour($date)
    {
      $diff = now()->diffInHours($date);
      return $diff;
    }
}
