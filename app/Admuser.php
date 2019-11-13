<?php


namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Admuser extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'Admusers';

    protected $fillable = [
        'name', 'email','password'
    ];
}
