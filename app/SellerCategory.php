<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SellerCategory extends Model
{
    protected $fillable = ['title'];

    protected $table = 'seller_categories';

    public function users() {
        return $this->hasMany('App\User', 'seller_category_id');
    }

    public function requests() {
        return $this->hasMany('App\Request', 'seller_category_id');
    }
}
