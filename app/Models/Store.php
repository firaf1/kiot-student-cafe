<?php

namespace App\Models;

use App\Models\Input;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Store extends Model
{
    use HasFactory;
  /**
   * Get the input that owns the Store
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function input() 
  {
      return $this->belongsTo(Input::class, 'inputs_id');
  }
}
