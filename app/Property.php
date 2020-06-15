<?php

namespace App;
//use App\User;
use App\PropertiesPhoto;
use Illuminate\Support\Facades\Storage;
use Auth;

use Illuminate\Database\Eloquent\Model;


class Property extends Model
{

    protected $table = 'properties';
    public $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'title',
        'description',
        'categories',
        'tags',
        'propertyType',
        'NumRooms',
        'address',
        'location',
        'country',
        'state',
        'city',
        'features',
        'videos',
        'nearbyAmenities',
        'price',
        'constructionStage',
        'legal',
        'outdoorSquare',
        'indoorSquare',
        'kitchenSquare',
        'baths',
        'beds',
        'garages',
        'floor',
        'floors',
        'completedIn'
    ];
/*
    public function seller(){
        return $this->belongsTo(User::class);
    }
*/

    public static function add($fields) // Добавление события
    {
        $event = new static;
        $event->fill($fields);
        $event->user_id = Auth::id();
        $event->save();

        return $event;
    }
    public function UploadPropertyPhoto($files){
        if(count($files) == 0 ) { return; }
        foreach ($files as $file) {
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME). '_' . time(). '.'.$file->extension();
            $file->storeAs('public/properties_images', $filename);
            $this->properties_photo()->create([
                'name'=>$filename,
            ]);
        }
       //return;
    }
    public function properties_photo(){
        return $this->hasMany(PropertiesPhoto::class);
    }
    public function properties_photo_cover()
    {
        return $this->properties_photo()->first();
    }
}
