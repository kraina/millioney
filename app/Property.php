<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = 'properties';
    public $primaryKey = 'id';
    public $timestamps = true;
}
