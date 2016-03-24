<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShakeToken extends Model
{
    protected $table = 'shaketoken';
    protected $fillable = ['count_setting', 'number_person', 'shake_token'];
}
