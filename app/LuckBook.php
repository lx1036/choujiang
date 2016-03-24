<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LuckBook extends Model
{
    protected $table = 'luckbooks';
    protected $fillable = [
        'number',
        'name',
        'book_name_1',
        'book_name_2',
    ];
}
