@extends('layouts.steakhouse')

@section('content')

<!-- Contact section -->
<section id="contact" class="parallax-section">
  <div class="overlay"></div>
	<div class="container">
		<div class="row">

			<div class="col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10">
        @if($user == 'customer')
            <div class="wow fadeInUp section-title" data-wow-delay="0.3s">
                <h4>Please log in using your booking ID and password</h4>
            </div>
            <div class="contact-form wow fadeInUp" style="margin-top: 50px;" data-wow-delay="0.7s">
              <form id="contact-form" method="post" action="{{route('customer.login')}}">
                @csrf
                <input name="bookingID" type="text" class="form-control" placeholder="Booking ID" required>
                <input type="password" name="password" class="form-control" placeholder="Password">
                <input type="submit" class="form-control submit" value="Sign In">
              </form>
            </div>
            @elseif($user == 'staff')
            <div class="wow fadeInUp section-title" data-wow-delay="0.3s">
                <h4>Please log in using your staff ID and password</h4>
            </div>
            <div class="contact-form wow fadeInUp" style="margin-top: 50px;" data-wow-delay="0.7s">
              <form id="contact-form" method="post" action="#">
                <input name="email" type="email" class="form-control" placeholder="Staff ID" required>
                <input type="password" name="password" class="form-control" placeholder="Password">
                <input type="submit" class="form-control submit" value="Sign In">
              </form>
            </div>
            @endif
			</div>

		</div>
	</div>
</section>

@endsection
