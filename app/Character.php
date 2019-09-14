<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Character extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'personaggi';

    protected $fillable = [
        'name',
        'imgurl'
    ];
}
