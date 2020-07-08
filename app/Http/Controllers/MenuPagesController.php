<?php

namespace App\Http\Controllers;

use App\Category;
use App\Property;
use App\PropertiesPhoto;
use Illuminate\Http\Request;

class MenuPagesController extends Controller
{
    public function index(){
            return view('index');
    }
    /*
    public function listings(){
        return view('listings');
    }
    */
    public function categories(){
        $categories = Category::get();
        return view('categories', compact('categories'));
    }
    public function category($slug = null){
        $slug = Category::where('slug', $slug)->first();
        return view('category', ['category' =>$slug]);
    }
    /**
    public function listings(Request $request, Property $property){
        //$properties = Property::orderBy('created_at', 'desc')->get();
        $properties = $property->getPropertiesBySearch($request)->get();
        return view('listings', ['properties'=>$properties ]);
    }
     * */
    public function property($id){
        $property = Property::where('id', $id)->first();
        return view('property', ['property' =>$property]);
    }
    public function single(){
        return view('single');
    }
    public function blog(){
        return view('blog');
    }
    public function contact(){
        return view('contact');
    }
    public function about(){
        return view('about');
    }
    public function ajax_listings(Request $request, Property $property)
    {
        if(!empty($request->property_type)) {
            //$properties = Property::orderBy('created_at', 'desc')->get();
            $properties = $property->getPropertiesBySearch($request)->get();
            return view('ajax_listing', ['properties' => $properties]);
        }
        $properties = $property->getPropertiesBySearch($request)->get();
        return view('listings', ['properties' => $properties]);
    }
    function ajaxFilterInputPropertyType(Request $request)
    {
        $query = !empty($request->property_type) ? ($request->property_type) : null;
        $properties = Property::get();
        $properties2 = Property::select('propertyType')->groupBy('propertyType')->get();
        foreach($properties2 as $property) {
            $property_types[] = $property->propertyType;
        }
        echo json_encode($property_types);
    }
}
