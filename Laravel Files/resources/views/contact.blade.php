@include('header')
<!-- banner -->
<div class="inside-banner">
  <div class="container">
    <span class="pull-right"><a href="{{route('index')}}">Home</a> / Contact Us</span>
    <h2>Contact Us</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="spacer">
<div class="row contact">
  <div class="col-lg-6 col-sm-6 ">
      <input type="text" class="form-control" placeholder="Full Name">
      <input type="text" class="form-control" placeholder="Email Address">
      <input type="text" class="form-control" placeholder="Contact Number">
      <textarea rows="6" class="form-control" placeholder="Message"></textarea>
      <button type="submit" class="btn btn-success" name="Submit">Send Message</button>
  </div>
</div>
</div>
</div>

@include('footer')
