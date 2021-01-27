<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Add customer</title>
  </head>
  <body>

    <!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">
    <img src="images/logo@2x.jpg" alt="The Edison Georgetown" height="100px" width="max">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home<span class="sr-only">(current)</span></a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="#">Amenities Records</a>
      </li> -->
      <li class="nav-item">
        <a class="nav-link" href="/breakfastrecords">Breakfast Records</a>
      </li>
      <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Customer Records
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="/addcustomer">Add a Customer</a>
                <a class="dropdown-item" href="/showcustomer">View Records</a>
              </div>
            </li>
      <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Me
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#">Info</a>
                <a class="dropdown-item" href="#">Account Settings</a>
                <a class="dropdown-item" href="/logoutstaff">Log Out</a>
              </div>
            </li>
    </ul>
  </div>
</nav>

<h1 style="text-align: center; margin-top: 20px;">Add a customer</h1>

@if (session('success'))
    <div class="alert alert-success alert-dismissible col-md-8 " auto-close="5000" style="margin: 0 auto;">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
    </div>
@endif

@if (session('fail'))
    <div class="alert alert-warning alert-dismissible col-md-8 " auto-close="5000" style="margin: 0 auto;">
        {{ session('fail') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
    </div>
@endif

@if(!empty($draftEmail))
<div class="alert alert-info alert-dismissible col-md-8 " auto-close="5000" style="margin: 0 auto;">
  <h4 class="alert-heading">Please copy and send this to the guest!</h4>
  <hr>
    {!! $draftEmail ?? '' ?? '' !!}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
</div>
@endif

<div class="card p-0 col-md-8" style="margin: 0 auto; margin-top: 10px; margin-bottom: 20px;">
  <h5 class="card-header">Fill in all the details below</h5>
  <div class="card-body">
    <form action="{{route('add.customer')}}" method="post">
      @csrf
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input placeholder="{{$name ?? ''}}" type="text" class="form-control" id="name" name="name" aria-describedby="nameHelpInline">
          <span id="nameHelpInline" style="color: red; font-size: small;">
            *required
          </span>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input placeholder="{{$email ?? ''}}" type="email" class="form-control" id="email" name="email">
      </div>
      <div class="mb-3">
        <label for="contact_number" class="form-label">Contact Number</label>
        <input placeholder="{{$contact_number ?? ''}}" type="text" class="form-control" id="contact_number" name="contact_number">
    </div>
      <div class="mb-3">
        <label for="room_number" class="form-label">Room Number</label>
        <input placeholder="{{$room_number ?? ''}}" type="text" class="form-control" id="room_number" name="room_number" aria-describedby="roomHelpInline">
        <span id="roomHelpInline" style="color: red; font-size: small;">
          *required
        </span>
      </div>
      <div class="mb-3">
        <label for="booking_id" class="form-label">Booking ID</label>
        <input placeholder="{{$bookingID ?? ''}}" type="text" class="form-control" id="booking_id" name="booking_id" aria-describedby="bookingIDHelpInline">
        <span id="bookingIDHelpInline" style="color: red; font-size: small;">
          *required
        </span>
        </div>

        <div class="mb-3">
          <label for="staticPassword" class="form-label">Password (will be generated automatically)</label>
          <input type="text" readonly class="form-control-plaintext" id="staticPassword" value="{{$password ?? ''}}" name="password">
        </div>
        <div class="row" style="display: flex; justify-content: center;">
        <button type="submit" class="btn btn-primary" style="width: 70%; margin-right: 5px; margin-left: 5px; margin-top: 20px; background: #1E261D; border: none;">Add Customer</button>
        <button type="button" id="newButton" class="btn btn-primary" style="width: 25%; margin-right: 5px; margin-left: 5px; margin-top: 20px; background: #1E261D; border: none;"
          onclick="
          var confirm = window.confirm('Proceed only if you have emailed the customer.');

          if(confirm){
            window.location.reload(true);
          }
          "
        >New</button>
        </div>
      </form>

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
