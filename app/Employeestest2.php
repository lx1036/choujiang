<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employeestest2 extends Model
{
    protected $table = 'employeestest2';
    protected $fillable = array('number', 'name', 'department');
}
