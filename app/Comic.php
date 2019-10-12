<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'comics';

    protected $fillable = [
        'name',
        'imgurl'
    ];
}
