<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StepChild extends Model
{
  protected $fillable = [
    'step_id', 'title', 'content'
  ];

  public function user()
  {
    return $this->belongsTo('App\User', 'user_id');
  }

  public function step()
  {
    return $this->HasMany('App\Step', 'step_id');
  }
}
