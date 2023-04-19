@include('header')

<div>
      <div id="slider" class="sl-slider-wrapper">

        <div class="sl-slider">
              @php $count = 0; @endphp
              @foreach($units as $unit)
                  @if($count >= 4 )
                    @break
                  @endif
                      <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
                          <div class="sl-slide-inner">
                              <div class="bg-img bg-img-1"></div>
                              <h2><a href="{{route('propertydetail', $unit->id)}}">{{ $unit->components[0] . " " . $unit->components[1] . " " . $unit->components[2] . " " . $unit->components[3]  }}</a></h2>
                              <blockquote>
                                  <p class="location"><span class="glyphicon glyphicon-map-marker"></span> {{$unit->address}}</p>
                                  <p>{{$unit->date_of_posting}}</p>
                                  <cite>$ {{$unit->price}} </cite>
                              </blockquote>
                          </div>
                      </div>
                  @php $count++; @endphp
              @endforeach
        </div><!-- /sl-slider -->

        <nav id="nav-dots" class="nav-dots">
              <span class="nav-dot-current"></span>
              <span></span>
              <span></span>
              <span></span>
              <span></span>
        </nav>

      </div><!-- /slider-wrapper -->
</div>

<div class="banner-search">
  <div class="container">
    <!-- banner -->
    <h3>Buy, Sale & Rent</h3>
    <div class="searchbar">
         <form method="Get" action="{{route('search')}}">
             @csrf
             <div class="row">
                 <div class="col-lg-6 col-sm-6">
                     <div class="row">
                         <div class="col-lg-3 col-sm-3 ">
                             <select id="for" name="for" class="form-control">
                                 <option>for what</option>
                                 <option value="sale" >Buy</option>
                                 <option value="rent">Rent</option>
                             </select>
                         </div>
                         <div class="col-lg-3 col-sm-3">
                             <select id="price" name="price" class="form-control">
                                 <option>Price</option>
                                 <option value="100000"> less than $50,000</option>
                                 <option value="50000">less than $30,000</option>
                                 <option value="30000">less than $15,000</option>
                                 <option value="15000">less than $5000</option>
                             </select>
                         </div>
                         <div class="col-lg-3 col-sm-3">
                             <select id="type" name="type" class="form-control">
                                 <option>type</option>
                                 <option value="appartment">Apartment</option>
                                 <option value="sallon" >Office Space</option>
                             </select>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-lg-9 col-sm-9 ">
                             <input name="address" type="text" class="form-control" placeholder="Address">
                         </div>
                         <div class="  col-lg-3 col-sm-3 ">
                             <button class=" btn btn-success"  onclick="window.location.href='{{route('search')}}'">Find Now</button>
                         </div>
                     </div>
                 </div>
             </div>
         </form>
    </div>
  </div>
</div>


<!-- banner -->
<div class="container">
  <div class="properties-listing spacer"> <a href="{{route('buysalerent')}}" class="pull-right viewall">View All Listing</a>
    <h2>Featured Properties</h2>
    <div id="owl-example" class="owl-carousel">
        @php $count = 0; @endphp
        @foreach($units as $unit)
            @if ($count >= 15)
                @break
            @endif
            <div class="properties">
                <div class="image-holder"><img src="{{ $unit->imag[1] }}" class="img-responsive" alt="properties"/>
                    @if ($unit->is_available)
                      <div class="status sold">Available</div>
                    @else
                      <div class="status new">Sold</div>
                    @endif
                </div>
                <h4><a href="{{route('propertydetail' , $unit->id)}}">{{$unit->type}}</a></h4>
                <p class="price">Price: ${{$unit->price}}</p>
                <div class="listing-detail"><span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room">{{ substr($unit->components[0], 0, 1)}}</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room">{{substr($unit->components[1], 0, 1) }}</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Bathroom">{{substr($unit->components[2], 0, 1) }}</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen">{{substr($unit->components[3], 0, 1) }}</span> </div>
                <a class="btn btn-primary"  href="{{route('propertydetail', $unit->id)}}" >View Details</a>
            </div>
            @php $count++; @endphp
        @endforeach
    </div>
  </div>
  <div class="spacer">
    <div class="row">
      <div class="col-lg-6 col-sm-9 recent-view">
        <h3>About Us</h3>
        <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.<br><a href="{{route('about')}}">Learn More</a></p>
      </div>
    </div>
  </div>
</div>
@include('footer')
