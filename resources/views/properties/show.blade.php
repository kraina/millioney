@extends('layouts.default')
@section('title', 'Single Listing')

@section('style')
<link href="{{asset('plugins/colorbox/colorbox.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{asset('styles/single.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('styles/single_responsive.css')}}">
@endsection

@section('script')
<script src="{{asset('plugins/colorbox/jquery.colorbox-min.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
<script src="{{asset('js/single.js')}}"></script>
@endsection

@section("content")
	<!-- Home -->

	<div class="home">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="{{asset('images/listings.jpg')}}" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="home_content text-center">
						<div class="home_title">Listings</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Search -->

	<div class="search">
        <div style="margin-top: -4%; margin-left: 50%;"><h1>{{ $property->title }}</h1></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="search_container">
						<div class="search_form_container">
							<form action="#" class="search_form" id="search_form">
								<div class="d-flex flex-lg-row flex-column align-items-start justify-content-lg-between justify-content-start">
									<div class="search_inputs d-flex flex-lg-row flex-column align-items-start justify-content-lg-between justify-content-start">
										<input type="text" class="search_input" placeholder="Property type" required="required">
										<input type="text" class="search_input" placeholder="No rooms" required="required">
										<input type="text" class="search_input" placeholder="Location" required="required">
									</div>
									<button class="search_button">submit listing</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Listing -->

	<div class="listing_container">
		<div class="container">
			<div class="row">
				<div class="col">

					<!-- Image -->
					<div class="listing_image">
                        @if(!is_null($property->properties_photo_cover()))
                        <img src="{{ asset('storage/properties_images/'.$property->properties_photo_cover()->name) }}" alt="">
                        <!--
                        @\foreach($property->properties_photo()->get() as $propertyPhoto )
                        <img src="{\{ asset('images/'.$propertyPhoto->name) }}" alt="">
                        @\endforeach
                        -->
                        @endif
                    </div>

					<!-- Tabs -->
					<div class="listing_tabs d-flex flex-row align-items-start justify-content-between flex-wrap">

						<!-- Tab -->
						<div class="tab">
							<input type="radio" id="tab_1" name="listing_tabs" checked>
							<label for="tab_1"></label>
							<div class="tab_content d-flex flex-xl-row flex-column align-items-center justify-content-center">
								<div class="tab_icon"><img src="{{asset('images/house.svg')}}" class="svg" alt=""></div>
								<span>open house</span>
							</div>
						</div>

						<!-- Tab -->
						<div class="tab">
							<input type="radio" id="tab_2" name="listing_tabs">
							<label for="tab_2"></label>
							<div class="tab_content d-flex flex-xl-row flex-column align-items-center justify-content-center">
								<div class="tab_icon"><img src="{{asset('images/houses.svg')}}" class="svg" alt=""></div>
								<span>features</span>
							</div>
						</div>

						<!-- Tab -->
						<div class="tab">
							<input type="radio" id="tab_3" name="listing_tabs">
							<label for="tab_3"></label>
							<div class="tab_content d-flex flex-xl-row flex-column align-items-center justify-content-center">
								<div class="tab_icon"><img src="{{asset('images/house2.svg')}}" class="svg" alt=""></div>
								<span>photos</span>
							</div>
						</div>

						<!-- Tab -->
						<div class="tab">
							<input type="radio" id="tab_4" name="listing_tabs">
							<label for="tab_4"></label>
							<div class="tab_content d-flex flex-xl-row flex-column align-items-center justify-content-center">
								<div class="tab_icon"><img src="{{asset('images/camera.svg')}}" class="svg" alt=""></div>
								<span>video</span>
							</div>
						</div>

						<!-- Tab -->
						<div class="tab">
							<input type="radio" id="tab_5" name="listing_tabs">
							<label for="tab_5"></label>
							<div class="tab_content d-flex flex-xl-row flex-column align-items-center justify-content-center">
								<div class="tab_icon"><img src="{{asset('images/directions.svg')}}" class="svg" alt=""></div>
								<span>nearby amenities</span>
							</div>
						</div>

						<!-- Tab -->
						<div class="tab">
							<input type="radio" id="tab_6" name="listing_tabs">
							<label for="tab_6"></label>
							<div class="tab_content d-flex flex-xl-row flex-column align-items-center justify-content-center">
								<div class="tab_icon"><img src="{{asset('images/location.svg')}}" class="svg" alt=""></div>
								<span>location</span>
							</div>
						</div>

						<!-- Tab -->
						<div class="tab">
							<input type="radio" id="tab_7" name="listing_tabs">
							<label for="tab_7"></label>
							<div class="tab_content d-flex flex-xl-row flex-column align-items-center justify-content-center">
								<div class="tab_icon"><img src="{{asset('images/contract.svg')}}" class="svg" alt=""></div>
								<span>contact</span>
							</div>
						</div>

					</div>

					<!-- About -->
					<div class="about">
						<div class="row">
							<div class="col-lg-6">
								<div class="property_info">
									<div class="tag_price listing_price">$ 562 346</div>
									<div class="listing_name"><h1>Villa for sale</h1></div>
									<div class="listing_location d-flex flex-row align-items-start justify-content-start">
										<img src="{{asset('images/icon_1.png')}}" alt="">
										<span>{{ $property->address }}</span>
									</div>
									<div class="listing_list">
										<ul>
											<li>Property ID: </li>
											<li>Posted on: {{ date_format($property->created_at, "F d, Y") }}</li>
											<li>{{ $property->constructionStage }}</li>
										</ul>
									</div>
									<div class="prop_agent d-flex flex-row align-items-center justify-content-start">
										<div class="prop_agent_image"><img src="{{asset('images/agent_1.jpg')}}" alt=""></div>
										<div class="prop_agent_name"><a href="#">Maria Smith,</a> Agent</div>
									</div>
									<div class="prop_info">
										<ul class="d-flex flex-row align-items-center justify-content-start flex-wrap">
											<li class="d-flex flex-row align-items-center justify-content-start">
												<img src="{{asset('images/icon_2_large.png')}}" alt="">
												<div>
													<div>{{ $property->indoorSquare }}</div>
													<div> m<sup>2</sup></div>
												</div>
											</li>
											<li class="d-flex flex-row align-items-center justify-content-start">
												<img src="{{asset('images/icon_3_large.png')}}" alt="">
												<div>
													<div>{{ $property->baths }}</div>
													<div>baths</div>
												</div>
											</li>
											<li class="d-flex flex-row align-items-center justify-content-start">
												<img src="{{asset('images/icon_4_large.png')}}" alt="">
												<div>
													<div>{{ $property->beds }}</div>
													<div>beds</div>
												</div>
											</li>
											<li class="d-flex flex-row align-items-center justify-content-start">
												<img src="{{asset('images/icon_5_large.png')}}" alt="">
												<div>
													<div>{{ $property->garages }}</div>
													<div>garages</div>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="about_text">
									<p>
                                        {{ $property->description }}
                                    </p>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="listing_features">
									<div class="listing_title"><h3>Features</h3></div>
									<div class="row">
										<div class="col-lg-6">
											<ul>
												<li>2 car garages</li>
												<li>3 bedrooms</li>
												<li>heated floors</li>
												<li>contemporary architecture</li>
												<li>swimming pool</li>
												<li>exercise room</li>
												<li>formal entry</li>
											</ul>
										</div>
										<div class="col-lg-6">
											<ul>
												<li>patio</li>
												<li>close to stores</li>
												<li>ocean view</li>
												<li>spa</li>
												<li>sprinklers</li>
												<li>garden</li>
												<li>alley</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="listing_video">
									<div class="listing_title"><h3>Video</h3></div>
									<div class="video_container d-flex flex-column align-items-center justify-content-center">
										<img src="{{asset('images/video.jpg')}}" alt="">
										<div class="video_button"><a class="youtube" href="https://www.youtube.com/embed/IV3ueyrp5M4?autoplay=1"><i class="fa fa-play" aria-hidden="true"></i></a></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="google_map_container">
						<div class="map">
							<div id="google_map" class="google_map">
								<div class="map_container">
									<div id="map"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
