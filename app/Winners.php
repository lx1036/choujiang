<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Winners extends Model {

    //
    protected $table = 'winners';

//    protected $primaryKey   = 'openid';
    public function __construct($openid = null,$shakeCount=null,$times=null) {
        $this->openid = $openid;
        $this->shakecount = $shakeCount;
        $this->times = $times;
    }

}
