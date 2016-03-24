<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeesTest extends Model
{
    protected $table = 'employeestest';
    protected $fillable = array('number', 'name', 'department');
}
