@extends('layouts.steakhouse')

@section('content')

<!-- Home section -->
<section id="userSelect" class="parallax-section">
  <div class="gradient-overlay"></div>
    <div class="container">
      <div class="row">

          <div class="col-md-offset-2 col-md-8 col-sm-12">
              <h1 class="wow fadeInUp" data-wow-delay="0.6s">Hello!</h1>
              <p class="wow fadeInUp" data-wow-delay="1.0s">Are you a</p>
              <a href="{{route('user.select', 'customer')}}" class="wow fadeInUp btn btn-default hvr-bounce-to-top smoothScroll" data-wow-delay="1.3s">Customer</a></br>
              <a href="{{route('user.select', 'staff')}}" class="wow fadeInUp btn btn-default hvr-bounce-to-top smoothScroll" style="padding-right: 50px; padding-left: 50px;" data-wow-delay="1.3s">Staff</a>
          </div>

      </div>
    </div>
</section>

@endsection
