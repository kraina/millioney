@extends('layouts.default')
@section('title', 'Listings')
@section('meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="{{asset('plugins/OwlCarousel2-2.3.4/owl.carousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('plugins/OwlCarousel2-2.3.4/owl.theme.default.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('plugins/OwlCarousel2-2.3.4/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('styles/listings.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('styles/listings_responsive.css')}}">

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/bootstrap-tokenfield.min.css">
@endsection

@section('script')
    <script src="{{asset('plugins/OwlCarousel2-2.3.4/owl.carousel.js')}}"></script>
    <script src="{{asset('plugins/Isotope/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('js/listings.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.js"></script>


    <script>
        $(document).ready(function(){
            function search_property(){
                var property_type = $('#property_type').val().toLowerCase();
                var rooms = $('#rooms').val();
                var location = $('#location').val();
                var _token = $('meta[name="csrf-token"]').attr('content');
                //alert("rooms: " + rooms);
                //alert(_token);
                if(property_type === '')
                    property_type = 'ALL';
                if(rooms === '')
                    rooms = 'ALL';
                if(location === '')
                    location = 'ALL';

               // console.log(rooms);
                $.ajax({
                    type: 'get',
                    /*headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},*/
                    dataType: 'html',
                    url: "{{route('ajax_listings')}}",
                    ifModified: true,
                    cache: false,
                    data: {property_type: property_type, rooms: rooms, location: location, _token: _token},
                    _token: _token,
                    success: function(response){
                        $.getScript("{{asset('js/listings.js')}}");
                        $('#listings_container').replaceWith(response);
                    }
                });
            }
            $("#property_type").on("change", search_property);
            $("#rooms").on("change", search_property);
            $("#location").on("change", search_property);

            $('#property_type').tokenfield({
                autocomplete: {
                    source: function (request, response) {
                        jQuery.get("{{route('ajax_filter_input_property_type')}}", {
                            rooms: request.term
                        }, function (data) {
                            data = JSON.parse(data);
                            console.log(data);
                            response(data);
                        });
                    },
                    delay: 100
                },
                showAutocompleteOnFocus: true
            });

            $('#rooms').tokenfield({
                autocomplete: {
                    source: function (request, response) {
                        jQuery.get("{{route('ajax_filter_input_rooms')}}", {
                            rooms: request.term
                        }, function (data) {
                            data = JSON.parse(data);
                            console.log(data);
                            response(data);
                        });
                    },
                    delay: 100
                },
                showAutocompleteOnFocus: true
            });
            $('#location').tokenfield({
                autocomplete: {
                    source: function (request, response) {
                        jQuery.get("{{route('ajax_filter_input_location')}}", {
                            rooms: request.term
                        }, function (data) {
                            data = JSON.parse(data);
                            console.log(data);
                            response(data);
                        });
                    },
                    delay: 100
                },
                showAutocompleteOnFocus: true
            });
            $("#parent_input").keypress(function (e) {
                $("#property_type").parent("#parent_input")
                    .on('keydown keypress', function (e) {
                        var key=e.keyCode || e.which;
                        if (key === 13) {
                            e.preventDefault();
                        }
                    });

                search_property_rooms();
            });

            $("#parent_input").keypress(function (e) {
                $("#rooms").parent("#parent_input")
                    .on('keydown keypress', function (e) {
                        var key=e.keyCode || e.which;
                        if (key === 13) {
                            e.preventDefault();
                        }
                    });

                search_property();
            });
            $("#parent_input").keypress(function (e) {
                $("#location").parent("#parent_input")
                    .on('keydown keypress', function (e) {
                        var key=e.keyCode || e.which;
                        if (key === 13) {
                            e.preventDefault();
                        }
                    });

                search_property_rooms();
            });

            $('#search_button').click(function(){
                search_property();
            });
            function close() {
                $('.close').on('click', function(){
                    search_property();
                });
                $(document).on('click', 'a.close', function(){
                    //alert('delete');
                    search_property();
                });
            }
            $('input').change(function() {
                close();
            })
        });
</script>
        @endsection

@section("content")

	<!-- Home -->

	<div class="home">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="{{asset('images/listings.jpg')}}" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="home_content text-center">
						<div class="home_title">@lang('menu.listings')</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- PropertyType -->

	<div class="search">

		<div class="container">
			<div class="row">
				<div class="col">
					<div class="search_container">
						<div class="search_form_container">
							<!-- <form action="#" class="search_form" id="search_form"> -->
                            <div class="search_form">
								<div class="d-flex flex-lg-row flex-column align-items-start justify-content-lg-between justify-content-start">
									<div id="parent_input" class="search_inputs d-flex flex-lg-row flex-column align-items-start justify-content-lg-between justify-content-start">
										<!-- <input type="text" name="property_type" class="search_input" placeholder="Property type" required="required"> -->
<!--
                                        <select name="property_type[]" id="property_type" class="search_input" multiple placeholder="Property type" >
                                            <option value="house">House</option>
                                            <option value="villa">Villa</option>
                                            <option value="apartment">Apartment</option>
                                        </select>
                                        -->

                                        <input type="text" name="property_type" id="property_type" class="search_input" placeholder="@lang('pages.property_type')" />

										<input type="text" name="rooms" id="rooms" class="search_input" placeholder="@lang('pages.no_rooms')">
<!--
                                        <select name="rooms" id="rooms" class="search_input" placeholder="No rooms" >
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                        </select>
-->
										<input type="text" name="location" id="location" class="search_input" placeholder="@lang('pages.location')">
<!--
                                        <select name="location" id="location" class="search_input" placeholder="Location" >
                                            <option value="Kyiv">Kyiv</option>
                                            <option value="London">London</option>
                                            <option value="New-York">New-York</option>
                                            <option value="Paris">Paris</option>
                                            <option value="Phuket">Phuket</option>
                                        </select>
-->
									</div>
                                    <button class="search_button" id="search_button">@lang('menu.submit_listing')</button>
								</div>
                            </div>
						<!--- </form> -->
						</div>
						<div class="extra_search_buttons d-flex flex-row align-items-start justify-content-start">
							<div class="extra_search_button search_button_1"><a href="#">Detailed Search</a></div>
							<div class="extra_search_button search_button_2"><a href="#">Show Map</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
                        <!-- Listings -->
	<div class="listings">
		<div class="container">
			<div class="row">
				<div class="col">

					<!-- Sorting -->
					<div class="sorting d-flex flex-md-row flex-column align-items-start justify-content-start">

						<!-- Tags -->
						<div class="listing_tags">
							<ul class="d-flex flex-row align-items-start justify-content-start flex-wrap">
								<li><a href="#">2 beds<span>x</span></a></li>
								<li><a href="#">2 baths<span>x</span></a></li>
								<li><a href="#">garage<span>x</span></a></li>
								<li><a href="#">swimming pool<span>x</span></a></li>
								<li><a href="#">patio<span>x</span></a></li>
								<li><a href="#">heated floors<span>x</span></a></li>
								<li><a href="#">garden<span>x</span></a></li>
							</ul>
						</div>

						<!-- Sort -->
						<div class="sorting_container">
							<div class="sort">
								<span>Sort By</span>
								<ul>
									<li class="sorting_button" data-isotope-option='{ "sortBy": "original-order" }'>Default</li>
									<li class="sorting_button" data-isotope-option='{ "sortBy": "price" }'>Price</li>
									<li class="sorting_button" data-isotope-option='{ "sortBy": "area" }'>Area</li>
								</ul>
							</div>
						</div>

					</div>
                    <!-- Listings Container -->
                    @include('layouts.ajax_listing')

					<div class="load_more">
						<div class="button ml-auto mr-auto"><a href="#">load more</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
