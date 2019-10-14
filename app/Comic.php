<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Comic extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'comics';

    protected $fillable = [
        'name',
        'imgurl'
    ];
}
