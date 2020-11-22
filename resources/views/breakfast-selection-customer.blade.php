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
        <li><a href="/homecustomer" class="smoothScroll">Home</a></li>
        <li><a href="/amenitiescustomer" class="smoothScroll">Amenities</a></li>
        <li><a href="/breakfastcustomer" class="smoothScroll">Breakfast Selection</a></li>
      </ul>
    </div>

  </div>
</div>


<!-- Menu section -->
<section id="customermenu" class="parallax-section">
  <div class="container">
    <div class="row">

      <div class="col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10">
         <div class="wow fadeInUp section-title" data-wow-delay="0.3s">
            <h2>Breakfast Menu</h2>
            <h4>Make your breakfast menu selection here.</h4>
        </div>
      </div>

      <div class="col-md-6 col-sm-12">
        <div class="media wow fadeInUp" data-wow-delay="0.6s">
          <div class="media-object pull-left">
            <img src="images/gallery-img1.jpg" class="img-responsive" alt="Food Menu">
            <span class="menu-price">Set A</span>
          </div>
          <div class="media-body">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elitquisque tempus ac eget diam et.</p>
            <h3 class="media-heading wow fadeInUp btn hvr-bounce-to-top smoothScroll">Select</h3>
          </div>
        </div>

        <div class="media wow fadeInUp" data-wow-delay="0.9s">
          <div class="media-object pull-left">
            <img src="images/gallery-img2.jpg" class="img-responsive" alt="Food Menu">
            <span class="menu-price">Set B</span>
          </div>
          <div class="media-body">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elitquisque tempus ac eget diam et.</p>
            <h3 class="media-heading wow fadeInUp btn hvr-bounce-to-top smoothScroll">Select</h3>
          </div>
        </div>

        <div class="media wow fadeInUp" data-wow-delay="1.2s">
          <div class="media-object pull-left">
            <img src="images/gallery-img3.jpg" class="img-responsive" alt="Food Menu">
            <span class="menu-price">Set C</span>
          </div>
          <div class="media-body">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elitquisque tempus ac eget diam et.</p>
            <h3 class="media-heading wow fadeInUp btn hvr-bounce-to-top smoothScroll">Select</h3>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-sm-12">
        <div class="media wow fadeInUp" data-wow-delay="1s">
          <div class="media-object pull-left">
            <img src="images/gallery-img4.jpg" class="img-responsive" alt="Food Menu">
            <span class="menu-price">Set D</span>
          </div>
          <div class="media-body">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elitquisque tempus ac eget diam et.</p>
            <h3 class="media-heading wow fadeInUp btn hvr-bounce-to-top smoothScroll">Select</h3>
          </div>
        </div>

        <div class="media wow fadeInUp" data-wow-delay="1.3s">
          <div class="media-object pull-left">
            <img src="images/gallery-img5.jpg" class="img-responsive" alt="Food Menu">
            <span class="menu-price">Set E</span>
          </div>
          <div class="media-body">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elitquisque tempus ac eget diam et.</p>
            <h3 class="media-heading wow fadeInUp btn hvr-bounce-to-top smoothScroll">Select</h3>
          </div>
        </div>

        <div class="media wow fadeInUp" data-wow-delay="1.6s">
          <div class="media-object pull-left">
            <img src="images/gallery-img6.jpg" class="img-responsive" alt="Food Menu">
            <span class="menu-price">Set F</span>
          </div>
          <div class="media-body">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elitquisque tempus ac eget diam et.</p>
            <h3 class="media-heading wow fadeInUp btn hvr-bounce-to-top smoothScroll">Select</h3>
          </div>
        </div>
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
