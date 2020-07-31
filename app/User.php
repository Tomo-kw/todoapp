<?php

namespace App;

use App\Mail\ResetPassword;
use Illuminate\Support\Facades\Mail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'name', 'email', 'password',
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

    /**
     * タスクに関連するレコードを取得
     */
    public function tasks()
    {
        return $this->hasMany('App\Task');
    }

    /**
     * パスワードの再設定メールを送信するため
     */
    public function sendPasswordResetNotification($token)
    {
        Mail::to($this)->send(new ResetPassword($token));
    }
}
