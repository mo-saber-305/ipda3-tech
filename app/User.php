<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    public $timestamps = true;

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

    public function pages()
    {
        return $this->hasMany('App\Models\Page');
    }

    public function services()
    {
        return $this->hasMany('App\Models\Service');
    }

    public function projects()
    {
        return $this->hasMany('App\Models\Project');
    }

    public function clients()
    {
        return $this->hasMany('App\Models\Client');
    }

    public function articles()
    {
        return $this->hasMany('App\Models\Article');
    }
}
