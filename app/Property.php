<?php

namespace App;
//use App\User;
use App\Models\Filters\Properties\PropertySearch;
use App\PropertiesPhoto;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
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
    }
    public function properties_photo(){
        return $this->hasMany(PropertiesPhoto::class);
    }
    public function properties_photo_cover()
    {
        return $this->properties_photo()->first();
    }
    public function getPropertiesBySearch(Request $request):Builder
    {
        $builder = (new PropertySearch())->apply($request);
        return $builder;
    }
    public static function update_property($fields, $id){

        $event = new static;
        $event->user_id = Auth::id();
        $event->where('id', $id)->update($fields);

        return $event;
    }
}
