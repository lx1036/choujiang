<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VoiceUsers extends Model
{
    protected $table   = 'voiceusers';
    protected $fillable = [
        'openid',
        'token',
    ];
    public $timestamps = true;
}
