<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Config extends Model {

    protected $table = 'config';

    public function __construct($key = null,$value = null,$is_delete=0) {
        $this->key = $key;
        $this->value = $value;
        $this->is_delete = $is_delete;
    }

}
