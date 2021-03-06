<?php

namespace App\Http\Controllers;
use Auth;
use App\Category;
use App\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        /*
        $request->session()->flash('success', "testing success flash message");
        $request->session()->flash('warning', "testing warning flash message");
        $request->session()->flash('error', "testing error flash message");
        */
        return view('home');
    }
    public function properties(){
        $properties = Property::orderBy('created_at', 'desc')->get();
        return view('listings', compact('properties'));
    }
}
