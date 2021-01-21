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
<form style="margin-top: 20px;" action="{{route('login.guest')}}" method="post">
  @csrf
  <div class="form-group">
    <label for="feedback-question1">How was your overall breakfast experience?</label>
    <br/>
    {{-- <input type="text" class="form-control" id="feedback-question1" name="feedback-question1" aria-describedby="emailHelp" placeholder="Enter Booking ID"> --}}
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
      <label class="form-check-label" for="inlineRadio1">Option one</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
      <label class="form-check-label" for="inlineRadio2">Option Two</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
      <label class="form-check-label" for="inlineRadio3">Option tree</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="option4">
      <label class="form-check-label" for="inlineRadio4">Option four</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio5" value="option5">
      <label class="form-check-label" for="inlineRadio5">Option five</label>
    </div>
  </div>

  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
    <a class="form-text text-muted small" href="{{ route('password.request') }}">
    {{ __('Forgot Your Password?') }}
    </a>
  </div>
  <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: 20px; background: #1E261D; border: none;">Log In</button>
</form>
</div>


<!-- footer -->
<footer class="bg-light text-center text-lg-start" style="margin-top: 60px;">
  <!-- Grid container -->
  <div class="container p-4">
    <!--Grid row-->
    <div class="row">
      <!--Grid column-->
      <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
          <img src="{{asset('images/logo@2x.jpg')}}" alt="The Edison Georgetown" height="200px" width="max">
      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-6 col-md-12 mb-4 mb-md-0" style="text-align: right; margin-top: 40px;">
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec urna sapien, fermentum at volutpat non, blandit ut felis.
            Donec laoreet iaculis lacus, sed dignissim tellus fermentum a. Maecenas id elementum leo. Nunc tincidunt tempor laoreet.
            Donec eu pulvinar lectus. Vestibulum massa justo, ultrices eu mollis sit amet, aliquam vitae nisl
        </p>
      </div>
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
