<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'fullname', 'email', 'password',
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

    public function role() {
        return $this->belongsTo('App\Role', 'role_id');
    }

    public function request() {
        return $this->hasOne('App\Request', 'user_id');
    }

    public function seller_category() {
        return $this->belongsTo('App\SellerCategory', 'seller_category_id');
    }

    public function canRequest() {
        if($this->role_id == 2) // user's already a seller
            return false;
        if($this->request != null && $this->request->status == false) // user has a pending request
            return false;
        return true;
    }
}
