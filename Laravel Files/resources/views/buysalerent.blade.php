@include('header')
@php
//this badge going to be used for the result of searching and to view all units search and view all
@endphp
<!-- banner -->
<div class="inside-banner">
    <div class="container">
        <span class="pull-right"><a href="{{route('index')}}">Home</a> / Buy, Rent</span>
        <h2>Buy, Rent</h2>
    </div>
</div>
<!-- banner -->


<div class="container">
    <div class="properties-listing spacer">

        <div class="row">
            <div class="col-lg-3 col-sm-4 ">

                <div class="search-form"><h4><span class="glyphicon glyphicon-search"></span> Search for</h4>
                   <form action="" method="POST">
                       @csrf
                       <input type="text" class="form-control" placeholder="Search of Properties">
                       <div class="row">

                           <div class="col-lg-5">
                               <select class="form-control">
                                   <option>Buy</option>
                                   <option>Rent</option>
                               </select>
                           </div>

                           <div class="col-lg-7">
                               <select class="form-control">
                                   <option>Price</option>
                                   <option>$150,000 - $200,000</option>
                                   <option>$200,000 - $250,000</option>
                                   <option>$250,000 - $300,000</option>
                                   <option>$300,000 - above</option>
                               </select>
                           </div>

                       </div>

                       <div class="row">
                           <div class="col-lg-12">
                               <select class="form-control">
                                   <option>Property Type</option>
                                   <option>Apartment</option>
                                   <option>Office Space</option>
                               </select>
                           </div>
                       </div>
                       <button class="btn btn-primary">Find Now</button>
                   </form>
                </div>

                <div class="hot-properties hidden-xs">
                    <h4>Hot Properties</h4> {{-- the cheapest apartments --}}
                    @foreach($units as $unit )
                        <div class="row">
                            <div class="col-lg-4 col-sm-5">
                                <img src="{{$unit->imag[0]}}" class="img-responsive img-circle" alt="properties"/>
                            </div>
                            <div class="col-lg-8 col-sm-7">
                                <h5><a href="{{route('propertydetail', $unit->id)}}">{{$unit->address}}</a></h5>
                                <p class="price">${{$unit->price}}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>

            <div class="col-lg-9 col-sm-8">
                <div class="sortby clearfix">
                    <div class="pull-left result">Showing: {{count($AllUnits)}} </div>
                    <form method="GET" action="{{route('sortData')}}" class="pull-right">
                        <label>
                            <input type="radio" name="sort" value="asc"  {{ isset($by) && $by =='asc'  ? 'checked' : '' }}>
                            Price: Low to High
                        </label><br>
                        <label>
                            <input type="radio" name="sort" value="desc" {{  isset($by) && $by == 'desc' ? 'checked' : '' }}>
                            Price: High to Low
                        </label><br>
                        <button type="submit" class="btn btn-primary">Sort</button>
                    </form>

                </div>
                <div class="row">

                    <!-- properties -->

                    @php
                        $count = 0;
                    @endphp
                    @if(is_array($Result) || is_object($Result))
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
                    @endif

                    <!-- properties -->

                    <div class="center">
                        @if ($Result)
                            {{ $Result->links() }}
                        @else
                            No results found.
                        @endif

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@include('footer')
