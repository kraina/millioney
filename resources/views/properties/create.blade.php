@extends('adminlte::page')
@section('title', 'Create property')

@section('style')

@endsection

@section('script')

@endsection

@section("content")
    <h1>Create property</h1>
    {!! Form::open(['action' => 'PropertiesController@store', 'method' => 'POST', 'files' => true]) !!}
    <div class="form-group" >
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title']) }}
    </div>
    <div class="form-group" >
        {{ Form::label('categories', 'Category') }}
        {{ Form::text('categories', '', ['class' => 'form-control', 'placeholder' => 'Category']) }}
    </div>
    <div class="form-group" >
        {{ Form::label('address', 'Address') }}
        {{ Form::text('address', '', ['class' => 'form-control', 'placeholder' => 'Address']) }}
    </div>
    <div class="form-group" >
        {{ Form::label('tags', 'Tags') }}
        {{ Form::text('tags', '', ['class' => 'form-control', 'placeholder' => 'Tags']) }}
    </div>
    <div class="form-group" >
        {{ Form::label('propertyType', 'Property Type') }}
        {{ Form::text('propertyType', '', ['class' => 'form-control', 'placeholder' => 'Property Type']) }}
    </div>
    <div class="form-group" >
        {{ Form::label('NumRooms', 'Number Rooms') }}
        {{ Form::number('NumRooms', '', ['class' => 'form-control', 'placeholder' => 'Number Rooms']) }}
    </div>
    <div class="form-group" >
        {{ Form::label('location', 'Location') }}
        {{ Form::text('location', '', ['class' => 'form-control', 'placeholder' => 'Location']) }}
    </div>
    <div class="form-group" >
        {{ Form::label('country', 'Country') }}
        {{ Form::text('country', '', ['class' => 'form-control', 'placeholder' => 'Country']) }}
    </div>
    <div class="form-group" >
        {{ Form::label('state', 'State') }}
        {{ Form::text('state', '', ['class' => 'form-control', 'placeholder' => 'State']) }}
    </div>
    <div class="form-group" >
        {{ Form::label('city', 'City') }}
        {{ Form::text('city', '', ['class' => 'form-control', 'placeholder' => 'City']) }}
    </div>
    <div class="form-group" >
        {{ Form::label('features', 'Features') }}
        {{ Form::text('features', '', ['class' => 'form-control', 'placeholder' => 'Features']) }}
    </div>
    <div class="form-group" >
        {{ Form::label('videos', 'Videos') }}
        {{ Form::text('videos', '', ['class' => 'form-control', 'placeholder' => 'Videos']) }}
    </div>
    <div class="form-group" >
        {{ Form::label('nearbyAmenities', 'Nearby Amenities') }}
        {{ Form::text('nearbyAmenities', '', ['class' => 'form-control', 'placeholder' => 'Nearby Amenities']) }}
    </div>
    <div class="form-group" >
        {{ Form::label('price', 'Price') }}
        {{ Form::number('price', '0.00', ['step' => "0.01", 'class' => 'form-control', 'placeholder' => 'Price']) }}
    </div>
    <div class="form-group" >
        {{ Form::label('constructionStage', 'Construction Stage') }}
        {{ Form::text('constructionStage', '', ['class' => 'form-control', 'placeholder' => 'Construction Stage']) }}
    </div>
    <div class="form-group" >
        {{ Form::label('legal', 'Legal') }}
        {{ Form::text('legal', '', ['class' => 'form-control', 'placeholder' => 'Legal']) }}
    </div>
    <div class="form-group" >
        {{ Form::label('outdoorSquare', 'Outdoor Square, m<sup>2</sup>', [], false) }}
        {{ Form::number('outdoorSquare', '', ['class' => 'form-control', 'placeholder' => 'Outdoor Square, m²' ]) }}
    </div>
    <div class="form-group" >
        {{ Form::label('indoorSquare', 'Indoor Square, m<sup>2</sup>', [], false) }}
        {{ Form::number('indoorSquare', '', ['class' => 'form-control', 'placeholder' => 'Indoor Square, m²']) }}
    </div>
    <div class="form-group" >
        {{ Form::label('kitchenSquare', 'Kitchen Square, m<sup>2</sup>', [], false) }}
        {{ Form::number('kitchenSquare', '', ['class' => 'form-control', 'placeholder' => 'Kitchen Square, m²']) }}
    </div>
    <div class="form-group" >
        {{ Form::label('baths', 'Number of Baths') }}
        {{ Form::number('baths', '', ['class' => 'form-control', 'placeholder' => 'Number of Baths']) }}
    </div>
    <div class="form-group" >
        {{ Form::label('beds', 'Number of Beds') }}
        {{ Form::number('beds', '', ['class' => 'form-control', 'placeholder' => 'Number of Beds']) }}
    </div>
    <div class="form-group" >
        {{ Form::label('garages', 'Number of Garages') }}
        {{ Form::number('garages', '', ['class' => 'form-control', 'placeholder' => 'Number of Garages']) }}
    </div>
    <div class="form-group" >
        {{ Form::label('floor', 'Floor') }}
        {{ Form::number('floor', '', ['class' => 'form-control', 'placeholder' => 'Floor']) }}
    </div>
    <div class="form-group" >
        {{ Form::label('floors', 'Floors') }}
        {{ Form::number('floors', '', ['class' => 'form-control', 'placeholder' => 'Floors']) }}
    </div>
    <div class="form-group" >
        {{ Form::label('completedIn', 'Completed in, year') }}
        {{ Form::number('completedIn', '', ['class' => 'form-control', 'placeholder' => 'Completed in, year']) }}
    </div>
    <div class="form-group" >
        {{ Form::label('description', 'Description') }}
        {{ Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Description']) }}
    </div>
    <div class="form-group" >
        {{ Form::label('photo_id', 'Upload Photos') }}
        {{ Form::file('photo_id[]', ['multiple'=>'multiple'], ['class' => 'form-control']) }}
    </div>

    {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    {!! Form::close() !!}

@endsection
