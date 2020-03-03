<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StepChild extends Model
{
  protected $fillable = [
    'step_id', 'title', 'content','clear_flg'
  ];

  public function user()
  {
    return $this->belongsTo('App\User', 'user_id');
  }

  public function step()
  {
    return $this->belongsTo('App\Step', 'step_id');
  }
}
