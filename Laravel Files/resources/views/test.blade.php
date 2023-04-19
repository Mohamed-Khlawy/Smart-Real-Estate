<?php

@php $count = 0; @endphp
@foreach($Result as $unit)
    @if ($count >= 15)
        @break
    @endif
    <div class="col-lg-4 col-sm-6">
    <div class="properties">
        <div class="image-holder"><img src="{{ $unit->imag[1] }}" class="img-responsive" alt="properties"/>
            @if ($unit->is_available)
                <div class="status sold">Available</div>
            @else
                <div class="status new">Sold</div>
            @endif
        </div>
        <h4><a href="{{route('propertydetail')}}">{{$unit->type}}</a></h4>
        <p class="price">Price: ${{$unit->price}}</p>
        <div class="listing-detail"><span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room">{{ substr($unit->components[0], 0, 1)}}</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room">{{substr($unit->components[1], 0, 1) }}</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Bathroom">{{substr($unit->components[2], 0, 1) }}</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen">{{substr($unit->components[3], 0, 1) }}</span> </div>
        <a class="btn btn-primary"  href="{{route('propertydetail', $unit->id)}}" >View Details</a>
    </div>
    </div>
    @php $count++; @endphp
@endforeach



<div class="properties">--}}
{{--                            <div class="image-holder"><img src="{{ asset('images/properties/3.jpg') }}"--}}
{{--                                                           class="img-responsive" alt="properties">--}}
{{--                                <div class="status sold">Sold</div>--}}
{{--                            </div>--}}
{{--                            <h4><a href="{{route('propertydetail')}}">Royal Inn</a></h4>--}}
{{--                            <p class="price">Price: $234,900</p>--}}
{{--                            <div class="listing-detail"><span data-toggle="tooltip" data-placement="bottom"--}}
{{--                                                              data-original-title="Bed Room">5</span> <span--}}
{{--                                    data-toggle="tooltip" data-placement="bottom"--}}
{{--                                    data-original-title="Living Room">2</span> <span data-toggle="tooltip"--}}
{{--                                                                                     data-placement="bottom"--}}
{{--                                                                                     data-original-title="Parking">2</span>--}}
{{--                                <span data-toggle="tooltip" data-placement="bottom"--}}
{{--                                      data-original-title="Kitchen">1</span></div>--}}
{{--                            <a class="btn btn-primary" href="{{route('propertydetail')}}">View Details</a>--}}
{{--                        </div>--}}




    public function searchableAs(): string
    {
    return 'units';
    }

    public function getSearchResult(): SearchResult
    {
    $title = "{$this->type} {$this->for_what} - {$this->address} - {$this->price}";
    $url = route('search', $this->id);

    return new SearchResult(
    $this,
    $title,
    $url
    );
    }

    public function searchableFields(): array
    {
    return [
    'type',
    'price',
    'for_what',
    'address'
    ];
    }
