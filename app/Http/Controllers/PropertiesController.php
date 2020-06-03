<?php

namespace App\Http\Controllers;
use Auth;
use App\Property;
use Illuminate\Http\Request;

class PropertiesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::where(['user_id'=>Auth::user()->id])
            ->orderBy('created_at', 'desc')
            ->get();
        //$properties = Property::orderBy('created_at', 'desc')->get();
        return view('properties.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('properties.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => ''
        ]);
        $property = new Property;
        $user = Auth::user();
        $property->title = $request->input('title');
        $property->description          = $request->input('description');
        $property->user_id              = Auth::user()->id;
        $property->categories           = $request->input('categories');
        $property->tags                 = $request->input('tags');
        $property->propertyType         = $request->input('propertyType');
        $property->NumRooms             = $request->input('NumRooms');
        $property->address              = $request->input('address');
        $property->location             = $request->input('location');
        $property->country              = $request->input('country');
        $property->state                = $request->input('state');
        $property->city                 = $request->input('city');
        $property->openHouse            = $request->input('openHouse');
        $property->features             = $request->input('features');
        $property->image                = $request->input('image');
        $property->videos               = $request->input('videos');
        $property->nearbyAmenities      = $request->input('nearbyAmenities');
        $property->price                = $request->input('price');
        $property->constructionStage    = $request->input('constructionStage');
        $property->legal                = $request->input('legal');
        $property->outdoorSquare        = $request->input('outdoorSquare');
        $property->indoorSquare         = $request->input('indoorSquare');
        $property->kitchenSquare        = $request->input('kitchenSquare');
        $property->baths                = $request->input('baths');
        $property->beds                 = $request->input('beds');
        $property->garages              = $request->input('garages');
        $property->floor                = $request->input('floor');
        $property->floors               = $request->input('floors');
        $property->completedIn          = $request->input('completedIn');
        $property->created_at           = now();
        $property->save();
        return redirect('/properties')->with('success', "Property created");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $property = Property::where('id', $id)->first();

        return view('properties.show', compact('property' ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
