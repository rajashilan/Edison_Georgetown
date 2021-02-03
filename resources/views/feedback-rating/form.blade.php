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
<form style="margin-top: 20px;" action="{{route('feedback.store')}}" method="post">
  @csrf

  @foreach ($questions as $question)
    @if($question->type === 1)
      <div class="form-group">
        <label for="feedback-question1">{{$question->question}}</label>
        <br/>
        <div class="form-check form-check-inline">
          <input id='Q{{$question->f_q_id}}_R1' type="radio" name="Q{{$question->f_q_id}}" value="1">
          <label>Very Poor</label>
        </div>
        <div class="form-check form-check-inline">
          <input id='Q{{$question->f_q_id}}_R2' type="radio" name="Q{{$question->f_q_id}}" value="2">
          <label>Poor</label>
        </div>
        <div class="form-check form-check-inline">
          <input id='Q{{$question->f_q_id}}_R3' type="radio" name="Q{{$question->f_q_id}}" value="3">
          <label>Fair</label>
        </div>
        <div class="form-check form-check-inline">
          <input id='Q{{$question->f_q_id}}_R4' type="radio" name="Q{{$question->f_q_id}}" value="4">
          <label>Good</label>
        </div>
        <div class="form-check form-check-inline">
          <input id='Q{{$question->f_q_id}}_R5' type="radio" name="Q{{$question->f_q_id}}" value="5">
          <label>Excellent</label>
        </div>
      </div>
    @endif
    @if($question->type === 2)
      <div class="form-group">
        <label>{{$question->question}}</label><br/>
        <textarea name="{{$question->f_q_id}}" rows="3"></textarea><br/><br/>
      </div>
    @endif
   @endforeach

  <small id="emailHelp" class="form-text text-muted text-center">Thank you for your feedback and visit. ^^</small>
  <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: 20px; background: #1E261D; border: none;">Submit</button>
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
