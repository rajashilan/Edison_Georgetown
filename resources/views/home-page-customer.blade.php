@extends('layouts.steakhouse')
@section('content')

<!-- Navigation section -->
<div class="navbar navbar-default navbar-static-top" role="navigation">
  <div class="container">

    <div class="navbar-header">
      <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon icon-bar"></span>
        <span class="icon icon-bar"></span>
        <span class="icon icon-bar"></span>
      </button>
      <a href="#" class="navbar-brand">Edison</a>
    </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#top" class="smoothScroll">Home</a></li>
        <li><a href="/amenitiescustomer" class="smoothScroll">Amenities</a></li>
        <li><a href="/breakfastcustomer" class="smoothScroll">Breakfast Selection</a></li>
      </ul>
    </div>

  </div>
</div>

<!-- customerhome section -->
<section id="customerhome" class="parallax-section">
	<div class="container">
		<div class="row">

      <div class="col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10">
          <div class="wow fadeInUp section-title" data-wow-delay="0.3s">
            <h2>Hello,</h2>
            <h4>Welcome to your one stop convenience</h4>
          </div>
      </div>

      <div class="clearfix"></div>

      <div class="wow fadeInUp col-md col-sm-5" data-wow-delay="0.3s" style="margin-bottom: 30px;">
        <img src="images/about-img.jpg" class="img-responsive" alt="Amenities">
        <h3>Choose from a variety of amenities.</h3>
        <a type="button" class="wow fadeInUp btn  hvr-bounce-to-top smoothScroll" name="btn btn-default">View Amenities</a>
      </div>

      <div class="wow fadeInUp col-md col-sm-7" data-wow-delay="0.5s">

        <!-- flexslider -->
        <div class="flexslider" style="margin-bottom: 40px;">
          <ul class="slides">

            <li>
              <img src="images/slide-img1.jpg" alt="Flexslider">
            </li>
            <li>
              <img src="images/slide-img2.jpg" alt="Flexslider">
            </li>
            <li>
              <img src="images/slide-img3.jpg" alt="Flexslider">
            </li>

          </ul>
        </div>

         <h3>Choose from an amazing selection of menus for your breakfast.</h3>
         <a href="/breakfastcustomer" class="wow fadeInUp btn hvr-bounce-to-top smoothScroll">View Breakfast Menu</a>
      </div>

		</div>
	</div>
</section>


<!-- Footer section -->
<footer>
	<div class="container">
		<div class="row">

              <div class="wow fadeInUp col-md-4 col-sm-4" data-wow-delay="1.3s">
                <h3>About the house</h3>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                	tincidunt ut laoreet. Dolore magna aliquam erat volutpat ipsum.</p>
              </div>

              <div class="wow fadeInUp col-md-4 col-sm-4" data-wow-delay="1.6s">
                <h3>Contact Detail</h3>
                <p>123 Delicious Street, San Francisco, CA 10110</p>
                <p>010-020-0780</p>
                <p>hello@company.com</p>
              </div>

              <div class="wow fadeInUp col-md-4 col-sm-4" data-wow-delay="1.9s">
                <h3>Opening Hours</h3>
                <strong>Monday - Firday</strong>
                <p>11:00 AM - 10:00 PM</p>
                <strong>Saturday - Sunday</strong>
                <p>10:00 AM - 09:00 PM</p>
              </div>

		</div>
	</div>
</footer>

@endsection
