<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Step extends Model
{
  protected $fillable = [
    'user_id', 'title', 'category', 'achievement_time', 'content'
  ];

  public function user()
  {
    return $this->belongsTo('App\User', 'user_id');
  }

  public function step_children(){
    return $this->hasMany('App\Step', 'step_id');
  }

  public function user_name(){
    return $this->belongsTo('App\User', 'name')->where('id', Auth::id())->get();
  }
}
