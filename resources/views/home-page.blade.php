<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>

<!-- navbar -->
    <nav class="navbar navbar-expand-lg"
      style="	background-image: url('/images/menu-bar-logo@2x.jpg');
	       background-size: cover;
	       background-repeat: no-repeat;
	       background-position: center top;
	       display: block;
	       min-width: 100%;
	       height: 150px;">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</nav>

<div class="row align-items-center justify-content-center" style="margin-top: 40px;">

<!-- caorusel -->
<div id="carouselExampleIndicators" class="carousel slide col-md-6" data-ride="carousel" style="margin-top: 20px; margin-right: 15px; margin-left: 15px;">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="images/edison-entrance-2@2x.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/slide-img2.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/slide-img3.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<!-- user select -->
<div class="card p-0 col-md-4" style="margin-top: 20px; height: 100%; margin-right: 30px; margin-left: 30px;">
  <h3 class="card-header"  style="text-align: center;">Welcome!</h3>
  <div class="card-body">
    <h5 class="card-title" style="text-align: center;">Are you a </h5>
    <a href="{{route('user.select', 'guest')}}" class="btn btn-primary" style="width: 100%; margin-top: 20px; background: #1E261D; border: none;">Guest</a><br>
    <a href="{{route('user.select', 'staff')}}" class="btn btn-primary" style="width: 100%; margin-top: 20px; background: #1E261D; border: none;">Staff</a>
  </div>
</div>

</div>

<!-- footer -->
<footer class="bg-light text-center text-lg-start" style="margin-top: 60px;">
  <!-- Grid container -->
  <div class="container p-4">
    <!--Grid row-->
    <div class="row">
      <!--Grid column-->
      <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
          <img src="images/logo@2x.jpg" alt="The Edison Georgetown" height="200px" width="max">
      </div>
      <!--Grid column-->
      <!--Grid column-->

    <div class="col-lg-6 col-md-6 mb-4 mb-md-0" style="margin-top: 40px; text-align: right;">

      <ul class="list-unstyled mb-0">
        <li>
          <h5>+604 262 2990</h5>
        </li>
        <li>
          <h5>15 Lebuh Leith,</h5>
        </li>
        <li>
          <h5>George Town,</h5>
        </li>
        <li>
          <h5>10200 Penang, Malaysia.</h5>
        </li>
      </ul>
    </div>
    <!--Grid column-->
    <!--Grid column-->
    </div>
    <!--Grid row-->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
    © 2020 Copyright: The Edison Georgetown
  </div>
  <!-- Copyright -->
</footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
