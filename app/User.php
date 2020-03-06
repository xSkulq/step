<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\CustomResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'pic', 'bio', 'temporary_new_email', 'email_changed_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function user()
    {
      return $this->belongsTo('App\User');
    }

    public function steps()
    {
        return $this->hasMany('App\Step');
    }

    public function step_children()
    {
        return $this->hasMany('APP\StepChild');
    }

    public function challenges()
    {
        return $this->hasMany('APP\Challenge');
    }

    public function clears()
    {
        return $this->hasMany('APP\Clear');
    }

    // パスワードリセットemail
    /**
     * パスワード再設定メールの送信
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomResetPassword($token));
    }
}
