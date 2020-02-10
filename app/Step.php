<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
  protected $fillable = [
    'user_id', 'title', 'category', 'achievement_time', 'content'
  ];

  public function user()
  {
    return $this->belongsTo('App\User', 'user_id');
  }
}
