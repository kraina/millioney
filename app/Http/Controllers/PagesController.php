<?php

namespace App\Http\Controllers;

use App\Category;
use App\Property;
use App\PropertiesPhoto;
use Illuminate\Http\Request;

class PagesController extends Controller
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
    public function listings(){
        $properties = Property::orderBy('created_at', 'desc')->get();
        return view('listings', ['properties'=>$properties ]);
    }
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
}
