<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LuckyBooks extends Model
{
    protected $table = 'luckybooks';
    protected $fillable = [
        'number',
        'name',
        'book_name_1',
        'book_name_2',
    ];
}
