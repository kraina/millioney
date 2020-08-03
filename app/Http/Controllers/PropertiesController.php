<?php

namespace App\Http\Controllers;
use App\PropertiesPhoto;
use Auth;
use App\Property;
use Illuminate\Http\Request;

class PropertiesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
        $categories_prop = Property::select("categories")
            ->groupBy('categories')
            ->get();
        $properties_type = Property::select('propertyType')
            ->groupBy('propertyType')
            ->get();
        return view('properties.create', compact('categories_prop','properties_type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'title'             => 'required',
            'description'       => '',
            'categories'        => '',
            'tags'              => '',
            'propertyType'      => '',
            'NumRooms'          => '',
            'address'           => '',
            'location'          => '',
            'country'           => '',
            'state'             => '',
            'city'              => '',
            'features'          => '',
            'videos'            => '',
            'nearbyAmenities'   => '',
            'price'             => '',
            'constructionStage' => '',
            'legal'             => '',
            'outdoorSquare'     => '',
            'indoorSquare'      => '',
            'kitchenSquare'     => '',
            'baths'             => '',
            'beds'              => '',
            'garages'           => '',
            'floor'             => '',
            'floors'            => '',
            'completedIn'       => ''
        ]);
        $event = Property::add($data);

        if($request->hasFile('photo_id')){
            $files = $request->file('photo_id');
            $property_photo_name = $event->UploadPropertyPhoto($files);
        }

/*
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
        $property->features             = $request->input('features');
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
*/
        /*
        if($request->hasFile('photo_id')){
            $files = $request->file('photo_id');
            foreach ($files as $file) {
                //$propertiesPhoto = new PropertiesPhoto;
                $name = 'property-'.time().'-'.$file->getClientOriginalName();
                $name = str_replace(' ', '-', $name);
                $file->move('images', $name);

                $property->properties_photo()->create([
                'name'=>$name
                ]);
        */
                /*
                $propertiesPhoto->property_id = $property->id;
                $propertiesPhoto->name = $name;
                $propertiesPhoto->save();
                */
        /*
            }

        }
*/
        return redirect('/home/properties')->with('success', "Property created");
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
        if(Auth::user()->id === $property->user_id) {
        $properties_photo = PropertiesPhoto::get();
        return view('properties.show', compact('property', 'properties_photo' ));
        } else {
            return back()->with('message','access forbidden');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $property = Property::where('id', $id)->first();
        if(Auth::user()->id === $property->user_id) {
        return view('properties.edit', compact('property'));
        } else {
            return back()->with('message','access forbidden');
        }
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
    function imgDropzoneUpload(Request $request, $id)
    {
        $image = $request->file('file');
        $property = Property::where('id', $id)->first();
        if(Auth::user()->id === $property->user_id) {
        $filename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME). '_' . time(). '.'.$image->extension();
        $image->storeAs('public/properties_images', $filename);
        $property->properties_photo()->create([
            'name'=>$filename,
        ]);
        return response()->json(['success' => $filename]);
        } else {
            return back()->with('message','access forbidden');
        }
    }
    public function imgDropzoneFetch($id)
    {
        //$images = \File::allFiles('storage/properties_images');
        $property = Property::where('id', $id)->first();
        if(Auth::user()->id === $property->user_id) {
        $properties_photo = $property->properties_photo()->get();
        $output = '<div class="row">';
        foreach($properties_photo as $image)
        {
            $output .= '
      <div class="col-md-2" style="margin-bottom:16px;" align="center">
                <img src="'.asset('storage/properties_images/' . $image->name).'" class="img-thumbnail" style="height:175px;" />
                <button type="button" class="btn btn-link remove_image" id="'.$image->name.'">Remove</button>
            </div>
      ';
        }
        $output .= '</div>';
        echo $output;
        } else {
            return back()->with('message','access forbidden');
        }
    }
    function imgDropzoneDelete(Request $request, $id = null)
    {
        $property = Property::where('id', $id)->first();
        if(Auth::user()->id === $property->user_id) {
        $name = $request->get('name');
        PropertiesPhoto::where('name', $name )->delete();
        $photo_path = 'storage/properties_images/' . $name;
        unlink($photo_path);
        } else {
            return back()->with('message','access forbidden');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $property = Property::find($id);
        $property_photos = PropertiesPhoto::where('property_id', $id )->get();
        foreach($property_photos as $photo_name) {
            $photo_path = 'storage/properties_images/' . $photo_name->name;
            unlink($photo_path);
        }
        $property->delete();
        return redirect('/home/properties')->with('success', "Property deleted");
    }
}
