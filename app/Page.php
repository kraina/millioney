<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{

    protected $table = 'pages';
    public $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'title',
        'description',
        'location',
        'notes',
        'team',
    ];
    public static function add($fields)
    {
        $event = new static;
        $event->fill($fields);
        $event->save();

        return $event;
    }
}
