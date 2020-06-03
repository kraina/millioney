<?php

namespace App\Http\Controllers;

use App\Category;
use App\Property;
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
        $properties = Property::get();
        return view('listings', compact('properties'));
    }
    public function property($id){
        $id = Property::where('id', $id)->first();
        return view('property', ['property' =>$id]);
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
