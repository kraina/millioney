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
    </div>

@endsection
