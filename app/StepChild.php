<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StepChild extends Model
{
  protected $fillable = [
    'user_id','step_id', 'title', 'content','pic'
  ];

  public function user()
  {
    return $this->belongsTo('App\User', 'user_id');
  }

  public function step()
  {
    return $this->belongsTo('App\Step', 'step_id');
  }

  public function clears()
  {
    return $this->hasMany('APP\Clear');
  }
}
