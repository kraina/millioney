@extends('layouts.default')
@section('title', 'Listings')

@section('style')
<link rel="stylesheet" type="text/css" href="{{asset('plugins/OwlCarousel2-2.3.4/owl.carousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('plugins/OwlCarousel2-2.3.4/owl.theme.default.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('plugins/OwlCarousel2-2.3.4/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('styles/listings.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('styles/listings_responsive.css')}}">
@endsection

@section('script')
<script src="{{asset('plugins/OwlCarousel2-2.3.4/owl.carousel.js')}}"></script>
<script src="{{asset('plugins/Isotope/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('js/listings.js')}}"></script>
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
					<div class="listings_container">
                    @foreach($properties as $property)

                        <!-- Listing -->
                            <div class="listing_box house sale">
                                <div class="listing">
                                    <div class="listing_image">
                                        <div class="listing_image_container">
                                           <!-- <img src="{\{asset('images/property'.$\property->id.'_1.jpg')\}}" alt=""> -->
                                           <!-- @\foreach($property->properties_photo()->get() as $propertyPhoto ) -->
                                            <!-- <img src="\{\{\ asset('images/'.$propertyPhoto->first()->name) \}\}" alt=""> -->
                                           <!-- @\break -->
                                          <!--   @\endforeach -->
                                            @if(!is_null($property->properties_photo_cover()))
                                            <img src="{{asset('images/'.$property->properties_photo_cover()->name) }}" alt="">
                                            @endif
                                        <img src="{{asset('images/'.$property->name)}}" alt="">
                                        </div>
                                        <div class="tags d-flex flex-row align-items-start justify-content-start flex-wrap">
                                            <div class="tag tag_house"><a href="{{route('listings')}}">house</a></div>
                                            <div class="tag tag_sale"><a href="{{route('listings')}}">for sale</a></div>
                                        </div>
                                        <div class="tag_price listing_price">$ {{ number_format($property->price, 0, ',', ' ') }}</div>
                                    </div>
                                    <div class="listing_content">
                                        <div class="prop_location listing_location d-flex flex-row align-items-start justify-content-start">
                                            <img src="{{asset('images/icon_1.png')}}" alt="">
                                            <a href="{{route('property', $property->id)}}">{{ $property->address }}</a>
                                        </div>
                                        <div class="listing_info">
                                            <ul class="d-flex flex-row align-items-center justify-content-start flex-wrap">
                                                <li class="property_area d-flex flex-row align-items-center justify-content-start">
                                                    <img src="{{asset('images/icon_2.png')}}" alt="">
                                                    <span>{{ $property->indoorSquare }} m<sup>2</sup></span>
                                                </li>
                                                <li class="d-flex flex-row align-items-center justify-content-start">
                                                    <img src="{{asset('images/icon_3.png')}}" alt="">
                                                    <span>{{ $property->baths }}</span>
                                                </li>
                                                <li class="d-flex flex-row align-items-center justify-content-start">
                                                    <img src="{{asset('images/icon_4.png')}}" alt="">
                                                    <span>{{ $property->beds }}</span>
                                                </li>
                                                <li class="d-flex flex-row align-items-center justify-content-start">
                                                    <img src="{{asset('images/icon_5.png')}}" alt="">
                                                    <span>{{ $property->garages }}</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    @endforeach




						<!-- Listing -->
						<div class="listing_box house sale">
							<div class="listing">
								<div class="listing_image">
									<div class="listing_image_container">
										<img src="{{asset('images/listing_1.jpg')}}" alt="">
									</div>
									<div class="tags d-flex flex-row align-items-start justify-content-start flex-wrap">
										<div class="tag tag_house"><a href="{{route('listings')}}">house</a></div>
										<div class="tag tag_sale"><a href="{{route('listings')}}">for sale</a></div>
									</div>
									<div class="tag_price listing_price">$ 217 346</div>
								</div>
								<div class="listing_content">
									<div class="prop_location listing_location d-flex flex-row align-items-start justify-content-start">
										<img src="{{asset('images/icon_1.png')}}" alt="">
										<a href="{{route('single')}}">280 Doe Meadow Drive Landover, MD 20785</a>
									</div>
									<div class="listing_info">
										<ul class="d-flex flex-row align-items-center justify-content-start flex-wrap">
											<li class="property_area d-flex flex-row align-items-center justify-content-start">
												<img src="{{asset('images/icon_2.png')}}" alt="">
												<span>2500 sq ft</span>
											</li>
											<li class="d-flex flex-row align-items-center justify-content-start">
												<img src="{{asset('images/icon_3.png')}}" alt="">
												<span>2</span>
											</li>
											<li class="d-flex flex-row align-items-center justify-content-start">
												<img src="{{asset('images/icon_4.png')}}" alt="">
												<span>5</span>
											</li>
											<li class="d-flex flex-row align-items-center justify-content-start">
												<img src="{{asset('images/icon_5.png')}}" alt="">
												<span>2</span>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>

						<!-- Listing -->
						<div class="listing_box house sale">
							<div class="listing">
								<div class="listing_image">
									<div class="listing_image_container">
										<img src="{{asset('images/listing_2.jpg')}}" alt="">
									</div>
									<div class="tags d-flex flex-row align-items-start justify-content-start flex-wrap">
										<div class="tag tag_house"><a href="{{route('listings')}}">house</a></div>
										<div class="tag tag_rent"><a href="{{route('listings')}}">for rent</a></div>
									</div>
									<div class="tag_price listing_price">$ 515 957</div>
								</div>
								<div class="listing_content">
									<div class="prop_location listing_location d-flex flex-row align-items-start justify-content-start">
										<img src="{{asset('images/icon_1.png')}}" alt="">
										<a href="{{route('single')}}">4812 Haul Road Saint Paul, MN 55102</a>
									</div>
									<div class="listing_info">
										<ul class="d-flex flex-row align-items-center justify-content-start flex-wrap">
											<li class="property_area d-flex flex-row align-items-center justify-content-start">
												<img src="{{asset('images/icon_2.png')}}" alt="">
												<span>1234 sq ft</span>
											</li>
											<li class="d-flex flex-row align-items-center justify-content-start">
												<img src="{{asset('images/icon_3.png')}}" alt="">
												<span>2</span>
											</li>
											<li class="d-flex flex-row align-items-center justify-content-start">
												<img src="{{asset('images/icon_4.png')}}" alt="">
												<span>5</span>
											</li>
											<li class="d-flex flex-row align-items-center justify-content-start">
												<img src="{{asset('images/icon_5.png')}}" alt="">
												<span>2</span>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>

						<!-- Listing -->
						<div class="listing_box house sale">
							<div class="listing">
								<div class="listing_image">
									<div class="listing_image_container">
										<img src="{{asset('images/listing_3.jpg')}}" alt="">
									</div>
									<div class="tags d-flex flex-row align-items-start justify-content-start flex-wrap">
										<div class="tag tag_house"><a href="{{route('listings')}}">house</a></div>
										<div class="tag tag_sale"><a href="{{route('listings')}}">for sale</a></div>
									</div>
									<div class="tag_price listing_price">$ 375 255</div>
								</div>
								<div class="listing_content">
									<div class="prop_location listing_location d-flex flex-row align-items-start justify-content-start">
										<img src="{{asset('images/icon_1.png')}}" alt="">
										<a href="{{route('single')}}">4067 Wolf Pen Road Mountain View, CA 94041</a>
									</div>
									<div class="listing_info">
										<ul class="d-flex flex-row align-items-center justify-content-start flex-wrap">
											<li class="property_area d-flex flex-row align-items-center justify-content-start">
												<img src="{{asset('images/icon_2.png')}}" alt="">
												<span>2000 sq ft</span>
											</li>
											<li class="d-flex flex-row align-items-center justify-content-start">
												<img src="{{asset('images/icon_3.png')}}" alt="">
												<span>2</span>
											</li>
											<li class="d-flex flex-row align-items-center justify-content-start">
												<img src="{{asset('images/icon_4.png')}}" alt="">
												<span>5</span>
											</li>
											<li class="d-flex flex-row align-items-center justify-content-start">
												<img src="{{asset('images/icon_5.png')}}" alt="">
												<span>2</span>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>

						<!-- Listing -->
						<div class="listing_box house sale">
							<div class="listing">
								<div class="listing_image">
									<div class="listing_image_container">
										<img src="{{asset('images/listing_4.jpg')}}" alt="">
									</div>
									<div class="tags d-flex flex-row align-items-start justify-content-start flex-wrap">
										<div class="tag tag_house"><a href="{{route('listings')}}">house</a></div>
										<div class="tag tag_rent"><a href="{{route('listings')}}">for rent</a></div>
									</div>
									<div class="tag_price listing_price">$ 122 350</div>
								</div>
								<div class="listing_content">
									<div class="prop_location listing_location d-flex flex-row align-items-start justify-content-start">
										<img src="{{asset('images/icon_1.png')}}" alt="">
										<a href="{{route('single')}}">280 Doe Meadow Drive Landover, MD 20785</a>
									</div>
									<div class="listing_info">
										<ul class="d-flex flex-row align-items-center justify-content-start flex-wrap">
											<li class="property_area d-flex flex-row align-items-center justify-content-start">
												<img src="{{asset('images/icon_2.png')}}" alt="">
												<span>1750 sq ft</span>
											</li>
											<li class="d-flex flex-row align-items-center justify-content-start">
												<img src="{{asset('images/icon_3.png')}}" alt="">
												<span>2</span>
											</li>
											<li class="d-flex flex-row align-items-center justify-content-start">
												<img src="{{asset('images/icon_4.png')}}" alt="">
												<span>5</span>
											</li>
											<li class="d-flex flex-row align-items-center justify-content-start">
												<img src="{{asset('images/icon_5.png')}}" alt="">
												<span>2</span>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>

						<!-- Listing -->
						<div class="listing_box house sale">
							<div class="listing">
								<div class="listing_image">
									<div class="listing_image_container">
										<img src="{{asset('images/listing_5.jpg')}}" alt="">
									</div>
									<div class="tags d-flex flex-row align-items-start justify-content-start flex-wrap">
										<div class="tag tag_house"><a href="{{route('listings')}}">house</a></div>
										<div class="tag tag_rent"><a href="{{route('listings')}}">for rent</a></div>
									</div>
									<div class="tag_price listing_price">$ 59 251</div>
								</div>
								<div class="listing_content">
									<div class="prop_location listing_location d-flex flex-row align-items-start justify-content-start">
										<img src="{{asset('images/icon_1.png')}}" alt="">
										<a href="{{route('single')}}">280 Doe Meadow Drive Landover, MD 20785</a>
									</div>
									<div class="listing_info">
										<ul class="d-flex flex-row align-items-center justify-content-start flex-wrap">
											<li class="property_area d-flex flex-row align-items-center justify-content-start">
												<img src="{{asset('images/icon_2.png')}}" alt="">
												<span>750 sq ft</span>
											</li>
											<li class="d-flex flex-row align-items-center justify-content-start">
												<img src="{{asset('images/icon_3.png')}}" alt="">
												<span>2</span>
											</li>
											<li class="d-flex flex-row align-items-center justify-content-start">
												<img src="{{asset('images/icon_4.png')}}" alt="">
												<span>5</span>
											</li>
											<li class="d-flex flex-row align-items-center justify-content-start">
												<img src="{{asset('images/icon_5.png')}}" alt="">
												<span>2</span>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>

						<!-- Listing -->
						<div class="listing_box house sale">
							<div class="listing">
								<div class="listing_image">
									<div class="listing_image_container">
										<img src="{{asset('images/listing_6.jpg')}}" alt="">
									</div>
									<div class="tags d-flex flex-row align-items-start justify-content-start flex-wrap">
										<div class="tag tag_house"><a href="{{route('listings')}}">house</a></div>
										<div class="tag tag_sale"><a href="{{route('listings')}}">for sale</a></div>
									</div>
									<div class="tag_price listing_price">$ 715 114</div>
								</div>
								<div class="listing_content">
									<div class="prop_location listing_location d-flex flex-row align-items-start justify-content-start">
										<img src="{{asset('images/icon_1.png')}}" alt="">
										<a href="{{route('single')}}">280 Doe Meadow Drive Landover, MD 20785</a>
									</div>
									<div class="listing_info">
										<ul class="d-flex flex-row align-items-center justify-content-start flex-wrap">
											<li class="property_area d-flex flex-row align-items-center justify-content-start">
												<img src="{{asset('images/icon_2.png')}}" alt="">
												<span>2780 sq ft</span>
											</li>
											<li class="d-flex flex-row align-items-center justify-content-start">
												<img src="{{asset('images/icon_3.png')}}" alt="">
												<span>2</span>
											</li>
											<li class="d-flex flex-row align-items-center justify-content-start">
												<img src="{{asset('images/icon_4.png')}}" alt="">
												<span>5</span>
											</li>
											<li class="d-flex flex-row align-items-center justify-content-start">
												<img src="{{asset('images/icon_5.png')}}" alt="">
												<span>2</span>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>

						<!-- Listing -->
						<div class="listing_box house sale">
							<div class="listing">
								<div class="listing_image">
									<div class="listing_image_container">
										<img src="{{asset('images/listing_7.jpg')}}" alt="">
									</div>
									<div class="tags d-flex flex-row align-items-start justify-content-start flex-wrap">
										<div class="tag tag_house"><a href="{{route('listings')}}">house</a></div>
										<div class="tag tag_sale"><a href="{{route('listings')}}">for sale</a></div>
									</div>
									<div class="tag_price listing_price">$ 325 520</div>
								</div>
								<div class="listing_content">
									<div class="prop_location listing_location d-flex flex-row align-items-start justify-content-start">
										<img src="{{asset('images/icon_1.png')}}" alt="">
										<a href="{{route('single')}}">280 Doe Meadow Drive Landover, MD 20785</a>
									</div>
									<div class="listing_info">
										<ul class="d-flex flex-row align-items-center justify-content-start flex-wrap">
											<li class="property_area d-flex flex-row align-items-center justify-content-start">
												<img src="{{asset('images/icon_2.png')}}" alt="">
												<span>1325 sq ft</span>
											</li>
											<li class="d-flex flex-row align-items-center justify-content-start">
												<img src="{{asset('images/icon_3.png')}}" alt="">
												<span>2</span>
											</li>
											<li class="d-flex flex-row align-items-center justify-content-start">
												<img src="{{asset('images/icon_4.png')}}" alt="">
												<span>5</span>
											</li>
											<li class="d-flex flex-row align-items-center justify-content-start">
												<img src="{{asset('images/icon_5.png')}}" alt="">
												<span>2</span>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>

						<!-- Listing -->
						<div class="listing_box house sale">
							<div class="listing">
								<div class="listing_image">
									<div class="listing_image_container">
										<img src="{{asset('images/listing_8.jpg')}}" alt="">
									</div>
									<div class="tags d-flex flex-row align-items-start justify-content-start flex-wrap">
										<div class="tag tag_house"><a href="{{route('listings')}}">house</a></div>
										<div class="tag tag_sale"><a href="{{route('listings')}}">for sale</a></div>
									</div>
									<div class="tag_price listing_price">$ 154 487</div>
								</div>
								<div class="listing_content">
									<div class="prop_location listing_location d-flex flex-row align-items-start justify-content-start">
										<img src="{{asset('images/icon_1.png')}}" alt="">
										<a href="{{route('single')}}">280 Doe Meadow Drive Landover, MD 20785</a>
									</div>
									<div class="listing_info">
										<ul class="d-flex flex-row align-items-center justify-content-start flex-wrap">
											<li class="property_area d-flex flex-row align-items-center justify-content-start">
												<img src="{{asset('images/icon_2.png')}}" alt="">
												<span>950 sq ft</span>
											</li>
											<li class="d-flex flex-row align-items-center justify-content-start">
												<img src="{{asset('images/icon_3.png')}}" alt="">
												<span>2</span>
											</li>
											<li class="d-flex flex-row align-items-center justify-content-start">
												<img src="{{asset('images/icon_4.png')}}" alt="">
												<span>5</span>
											</li>
											<li class="d-flex flex-row align-items-center justify-content-start">
												<img src="{{asset('images/icon_5.png')}}" alt="">
												<span>2</span>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>

						<!-- Listing -->
						<div class="listing_box house sale">
							<div class="listing">
								<div class="listing_image">
									<div class="listing_image_container">
										<img src="{{asset('images/listing_9.jpg')}}" alt="">
									</div>
									<div class="tags d-flex flex-row align-items-start justify-content-start flex-wrap">
										<div class="tag tag_house"><a href="{{route('listings')}}">house</a></div>
										<div class="tag tag_rent"><a href="{{route('listings')}}">for rent</a></div>
									</div>
									<div class="tag_price listing_price">$ 95 085</div>
								</div>
								<div class="listing_content">
									<div class="prop_location listing_location d-flex flex-row align-items-start justify-content-start">
										<img src="{{asset('images/icon_1.png')}}" alt="">
										<a href="{{route('single')}}">280 Doe Meadow Drive Landover, MD 20785</a>
									</div>
									<div class="listing_info">
										<ul class="d-flex flex-row align-items-center justify-content-start flex-wrap">
											<li class="property_area d-flex flex-row align-items-center justify-content-start">
												<img src="{{asset('images/icon_2.png')}}" alt="">
												<span>690 sq ft</span>
											</li>
											<li class="d-flex flex-row align-items-center justify-content-start">
												<img src="{{asset('images/icon_3.png')}}" alt="">
												<span>2</span>
											</li>
											<li class="d-flex flex-row align-items-center justify-content-start">
												<img src="{{asset('images/icon_4.png')}}" alt="">
												<span>5</span>
											</li>
											<li class="d-flex flex-row align-items-center justify-content-start">
												<img src="{{asset('images/icon_5.png')}}" alt="">
												<span>2</span>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>

					</div>
					<div class="load_more">
						<div class="button ml-auto mr-auto"><a href="#">load more</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
