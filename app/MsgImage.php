<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MsgImage extends Model
{
    //
    protected $table = 'msg_img';

    public function user() {
        return $this->belongsTo('App\Users');
    }
}
