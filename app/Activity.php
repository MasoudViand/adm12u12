<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Activity extends Eloquent
{
    protected $collection = 'activity';
    protected $fillable = [
        '_id', 'name', 'name_full', 'unit'
    ];
}
