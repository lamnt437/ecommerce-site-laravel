<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $guarded = ['id'];

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function seller_category() {
        return $this->belongsTo('App\SellerCategory', 'seller_category_id');
    }

    public function approve() {
        $owner = $this->user;

        // update owner's info
        $owner->role_id = 2;
        $owner->address = $this->address;
        $owner->phone = $this->phone;
        $owner->seller_category_id = $this->seller_category_id;

        $owner->save();

        // remove approved request
        $this->delete();
    }

    public function reject() {
        $this->status = true;
    }
}
