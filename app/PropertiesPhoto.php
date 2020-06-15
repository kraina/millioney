<?php

namespace App;
use App\Property;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class PropertiesPhoto extends Model {
	protected $table = 'properties_photos';
	public $primaryKey = 'id';
	protected $fillable = [
		'property_id',
		'name',
	];
	public function property() {
		return $this->belongsTo(Property::class);
	}
}
