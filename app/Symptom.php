<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Symptom extends Eloquent
{
    protected $collection = 'symptom_new';

    protected $fillable = [
        '_id', 'name','displayname', 'status', 'brief', 'frequency', 'frequency_str', 'severity'
    ];
}
