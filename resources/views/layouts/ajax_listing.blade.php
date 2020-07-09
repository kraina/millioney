
<div class="listings_container" id="listings_container">
@foreach($properties as $property)
    <!-- Listing -->
        <div class="listing_box house sale">
            <div class="listing">
                <div class="listing_image">
                    <div class="listing_image_container">
                        @if(!is_null($property->properties_photo_cover()))
                            <img src="{{asset('storage/properties_images/'.$property->properties_photo_cover()->name) }}" alt="">
                        @endif
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
</div>



