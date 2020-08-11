@extends('adminlte::page')
@section('title', 'Create property')

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
@endsection

@section('script')

    <script type="text/javascript">

        Dropzone.options.dropzoneForm = {
            autoProcessQueue : false,
            acceptedFiles : ".png,.jpg,.gif,.bmp,.jpeg",

            init:function(){
                var submitButton = document.querySelector("#submit-all");
                myDropzone = this;

                submitButton.addEventListener('click', function(){
                    myDropzone.processQueue();
                });

                this.on("complete", function(){
                    if(this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0)
                    {
                        var _this = this;
                        _this.removeAllFiles();
                    }
                    load_images();
                });

            }

        };

        load_images();

        function load_images()
        {

            $.ajax({
               url:"{{ route('home.properties.img-dropzone-fetch', $property->id) }}",
                success:function(data)
                {
                    $('#uploaded_image').html(data);
                }
            })

        }

        $(document).on('click', '.remove_image', function(){
            var name = $(this).attr('id');
            $.ajax({
                url:"{{ route('home.properties.{id?}.img-dropzone-delete', $property->id) }}",
                data:{name : name},
                success:function(data){
                    load_images();
                }
            })
        });

    </script>
@endsection

@section("content")
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Select Image</h3>
        </div>
        <div class="panel-body">
            <form id="dropzoneForm" class="dropzone" action="{{ route('home.properties.{id}.img-dropzone-upload', $property->id) }}">
                @csrf
            </form>
            <div align="center">
                <button type="button" class="btn btn-info" id="submit-all">Upload</button>
            </div>
        </div>
    </div>
    <br />
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Uploaded Image</h3>
        </div>
        <div class="panel-body" id="uploaded_image">

            </div>

        </div>

    <h1>Edit property</h1>
    {!! Form::open(['action' => ['PropertiesController@update', $property->id], 'method' => 'PATCH', 'multiple'=>'multiple', 'enctype' => 'multipart/form-data',  'files' => true, 'id' => 'update_property']) !!}
    @csrf
    @method("PATCH")
    <div class="form-group" >
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title',$property->title, ['class' => 'form-control', 'placeholder' => 'Title']) }}
    </div>
    <div class="form-group" >
        <label for="categories">Вид сделки</label>
        <select id="categories" name='categories' class="form-control">
            <option value="{{ $property->categories }}">{{ $property->categories }}</option>
            @foreach($categories_prop as $category)
                @if($property->categories !== $category->categories)
                <option  >{{$category->categories}}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group" >
        {{ Form::label('address', 'Address') }}
        {{ Form::text('address', $property->address, ['class' => 'form-control', 'placeholder' => 'Address']) }}
    </div>
    <div class="form-group" >
        <label for="propertyType">Тип недвижимости</label>
        <select class="form-control" name="propertyType" id="propertyType">
            <option value="{{ $property->propertyType }}" >{{ $property->propertyType }}</option>
            @foreach($properties_type as $property_type)
                @if($property->propertyType !== $property_type->propertyType)
                <option>{{$property_type->propertyType}}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group" >
        {{ Form::label('NumRooms', 'Number Rooms') }}
        {{ Form::number('NumRooms', $property->NumRooms, ['class' => 'form-control', 'placeholder' => 'Number Rooms']) }}
    </div>
    <div class="form-group" >
        {{ Form::label('location', 'Location') }}
        {{ Form::text('location', $property->location, ['class' => 'form-control', 'placeholder' => 'Location']) }}
    </div>
    <div class="form-group" >
        {{ Form::label('country', 'Country') }}
        {{ Form::text('country', $property->country, ['class' => 'form-control', 'placeholder' => 'Country']) }}
    </div>
    <div class="form-group" >
        {{ Form::label('city', 'City') }}
        {{ Form::text('city', $property->city, ['class' => 'form-control', 'placeholder' => 'City']) }}
    </div>
    <div class="form-group" >
        {{ Form::label('price', 'Price') }}
        {{ Form::number('price', $property->price, ['step' => "0.01", 'class' => 'form-control', 'placeholder' => 'Price']) }}
    </div>
    <div class="form-group" >
        {{ Form::label('indoorSquare', 'Indoor Square, m<sup>2</sup>', [], false) }}
        {{ Form::number('indoorSquare', $property->indoorSquare, ['class' => 'form-control', 'placeholder' => 'Indoor Square, m²']) }}
    </div>
    <div class="form-group" >
        {{ Form::label('beds', 'Number of Beds') }}
        {{ Form::number('beds', $property->beds, ['class' => 'form-control', 'placeholder' => 'Number of Beds']) }}
    </div>
    <div class="form-group" >
        {{ Form::label('description', 'Description') }}
        {{ Form::textarea('description', $property->description, ['class' => 'form-control', 'placeholder' => 'Description']) }}
    </div>
    {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    {!! Form::close() !!}

@endsection
