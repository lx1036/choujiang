<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MsgText extends Model {

    //
    protected $table = 'msg_text';
    protected $fillable = [
        'to_user_name',
        'openid',
        'msg_type',
        'content',
        'msg_id',
    ];

    public function user() {
        return $this->belongsTo('App\Users');
    }

}
