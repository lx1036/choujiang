<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model {

    //
    protected $table = 'users';

//    protected $primaryKey   = 'user_id';
    protected $fillable = ['openid', 'nickname', 'sex', 'language', 'city', 'province', 'country', 'headimgurl', 'subscribe_time', 'groupid'];

    public function msgTexts() {
        return $this->hasMany('App\MsgText','openid','openid');
    }
    public function msgImages() {
        return $this->hasMany('App\MsgImage','openid','openid');
    }

}
