@include('header')
<!-- banner -->
<div class="inside-banner">
    <div class="container">
{{--        <span class="pull-right"><a href="{{route('index')}}">Home</a> / Buy</span>--}}
        <h2>Buy</h2>
    </div>
</div>
<!-- banner -->

<div class="container">
    <div class="properties-listing spacer">

        <div class="row">
            <div class="col-lg-3 col-sm-4 hidden-xs">

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
            <div class="col-lg-9 col-sm-8 ">
                {{--
 #################################################################
     "implode"                     => function display all element of array with & between
     "GetUnit"                     => its helper function i made to get the current unit that the user click on it
     " request()->getQueryString()"=> it gets the getQueryString that have the unit id that the user click on it
######################################################################
                --}}
                @php
                    $currentUnit = GetUnit(str_replace('=', '',request()->getQueryString()));
                    $active = "active";
                    $postedBy = GetUserWhoPost(str_replace('=', '',request()->getQueryString()));
                @endphp
                <h2>@if($currentUnit->is_available) Available @else Not Available @endif</h2>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="property-images">
                            <!-- Slider Starts -->
                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                <ol class="carousel-indicators hidden-xs">
                                    @for($i=0; $i<sizeof($currentUnit->imag); $i++)
                                         <li data-target="#myCarousel" data-slide-to="{{$i}}" class="@if($i == 1 ) {{$active}} @endif "></li>
                                    @endfor
                                </ol>
                                <div class="carousel-inner">
                                    <!-- Item 1 -->
                                      @for($i=0; $i<sizeof($currentUnit->imag); $i++)
                                        <div class="item @if($i == 1 ) {{$active}} @endif">
                                            <img src="{{$unit->imag[$i]}}" class="properties" alt="properties">
                                        </div>
                                      @endfor
                                    <!-- #Item 1 -->
                                </div>
                                <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                                <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
                            </div>
                            <!-- #Slider Ends -->

                        </div>

                        <div class="spacer"><h4><span class="glyphicon glyphicon-th-list"></span> Properties Detail</h4>
                            <p>{{$currentUnit->description}}</p>
                            <p>{{$currentUnit->type . " ".implode(' & ', $currentUnit->components). " for " .$currentUnit->for_what . " posted in : " . $currentUnit->date_of_posting}}</p>
                        </div>
{{--################################################################################
#### still the location
#### still the report btn
#### still the request btn
####################################################################################
--}}
                        <div><h4><span class="glyphicon glyphicon-map-marker"></span> Location</h4>
                            <div class="well">
                                <iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Pulchowk,+Patan,+Central+Region,+Nepal&amp;aq=0&amp;oq=pulch&amp;sll=37.0625,-95.677068&amp;sspn=39.371738,86.572266&amp;ie=UTF8&amp;hq=&amp;hnear=Pulchowk,+Patan+Dhoka,+Patan,+Bagmati,+Central+Region,+Nepal&amp;ll=27.678236,85.316853&amp;spn=0.001347,0.002642&amp;t=m&amp;z=14&amp;output=embed"></iframe>
                            </div>
                        </div>
                       <center><a class="btn btn-danger" href="#" role="button">Report</a></center>
                    </div>
                    <div class="col-lg-4">
                        <div class="col-lg-12  col-sm-6">
                            <div class="property-info">
                                <p class="price">$ {{$currentUnit->price}}</p>
                                <p class="area"><span class="glyphicon glyphicon-map-marker"></span> {{$currentUnit->address}}</p>
                                <div class="profile">
                                    <span class="glyphicon glyphicon-user"></span> Posted By
                                    <p>{{$postedBy->name}}<br>{{$postedBy->number}}</p>
                                </div>
                            </div>

                            <h6><span class="glyphicon glyphicon-home"></span> Availabilty</h6>
                            <div class="listing-detail"><span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room">{{ substr($currentUnit->components[0], 0, 1)}}</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room">{{substr($currentUnit->components[1], 0, 1) }}</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Bathroom">{{substr($currentUnit->components[2], 0, 1) }}</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen">{{substr($currentUnit->components[3], 0, 1) }}</span> </div>
                        </div>
                        <div class="col-lg-12 col-sm-6 ">
                            <div class="enquiry ">
                                <a class="btn btn-success" href="#" role="button">Request</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('footer')
