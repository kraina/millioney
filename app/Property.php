<?php

namespace App;
//use App\User;
use App\PropertiesPhoto;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{

    protected $table = 'properties';
    public $primaryKey = 'id';
    public $timestamps = true;
/*
    public function seller(){
        return $this->belongsTo(User::class);
    }
*/
    public function properties_photo(){
        return $this->hasMany(PropertiesPhoto::class);
    }
    public function properties_photo_cover()
    {
        return $this->properties_photo()->first();
    }

}
