@extends('adminlte::page')
@section('title', 'Create property')

@section('style')

@endsection

@section('script')

@endsection

@section("content")
    <h1>Create page</h1>

    {!! Form::open(['action' => 'Admin\PageController@store', 'method' => 'post', 'files' => true, 'id' => 'page_dropzone']) !!}
    <div class="form-group" >
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title']) }}
    </div>
    <div class="form-group" >
        {{ Form::label('description', 'Description') }}
        {{ Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Description']) }}
    </div>
    <div class="form-group" >
        {{ Form::label('location', 'Location') }}
        {{ Form::text('location', '', ['class' => 'form-control', 'placeholder' => 'Location']) }}
    </div>
    <div class="form-group" >
        {{ Form::label('notes', 'Notes') }}
        {{ Form::textarea('notes', '', ['class' => 'form-control', 'placeholder' => 'Notes']) }}
    </div>
    <div class="form-group" >
        {{ Form::label('team', 'Team') }}
        {{ Form::textarea('team', '', ['class' => 'form-control', 'placeholder' => 'Team']) }}
    </div>
    {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    {!! Form::close() !!}

@endsection
