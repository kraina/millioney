<?php

namespace App;
use App\Property;
use Illuminate\Database\Eloquent\Model;

class PropertiesPhoto extends Model
{
    protected $fillable = [
        'property_id',
        'name',
    ];
    public function property(){
        return $this->belongsTo(Property::class);
    }
}
