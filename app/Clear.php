<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clear extends Model
{
  protected $fillable = [
    'user_id', 'step_id','step_child_id','challgeng_id','clear_flg'
  ];

  public function user()
  {
    return $this->belongsTo('App\User', 'user_id');
  }

  public function step()
  {
    return $this->belongsTo('App\Step', 'step_id');
  }

  public function challenge()
  {
    return $this->belongsTo('App\Challenge', 'challenge_id');
  }
}
