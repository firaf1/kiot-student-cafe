<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Role;
use App\Models\Measurement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
    public function one_input($id)
    {
         
        $input = Role::find($id);
        return $input->name;
    }
    public function roles($id)
    {
        
        $input = Input::find($id);
        $xx = $input->roles;

          $ff = unserialize(base64_decode($xx));
// dd(count($ff));
          return $ff;
    }
    public function check_one_hour($id)
    {
        $store = Store::find($id);
               $date = Carbon::parse($store->created_at);
               $current_hour = Carbon::now()->format('Y-m-d H:i:s');
        dd($date, $current_hour);
          if($date->isToday()){
                $hour = $date->format('h');
                if($hour);
          }
        //        dd($isToday);
    }
    public function CheckStore($id)
    {
        $date = new \DateTime();
 
        $date->modify('-1 hours');
$formatted_date = $date->format('Y-m-d H:i:s');
   
     $inStore = Store::where('type', 'in')->where('status', 'Approved')->where('created_at', '<',$formatted_date)
     ->where('inputs_id', $id)->sum('amount');
    $outStore = Store::where('type', 'out')->where('status', 'Approved')->where('created_at', '<',$formatted_date)
    ->where('inputs_id', $id)->sum('amount');
    return $inStore-$outStore;
    }
}
