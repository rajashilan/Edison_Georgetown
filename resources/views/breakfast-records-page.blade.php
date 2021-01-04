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
      <li class="nav-item">
        <a class="nav-link" href="#">Amenities Records</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Breakfast Records</a>
      </li>
      <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Customer Records
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="/addcustomer">Add a Customer</a>
                <a class="dropdown-item" href="#">View Records</a>
              </div>
            </li>
      <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Me
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#">Info</a>
                <a class="dropdown-item" href="#">Account Settings</a>
                <a class="dropdown-item" href="#">Log Out</a>
              </div>
            </li>
    </ul>
  </div>
</nav>

<div class="row justify-content-center" style="margin-top: 20px; margin-bottom: 20px;">
<div id="accordion">
  <div class="card">
    <div class="card-header">
      <a class="card-link" data-toggle="collapse" href="#21">
        Room Number 21
      </a>
    </div>
    <div id="21" class="collapse show" data-parent="#accordion">
      <div class="card-body">
        <ul class="list-group list-group-flush">
          <li class="list-group-item">
          <h5 class="card-title">Jack (Booking ID: 12345)</h5>
          <p class="card-text">muesli, latte, croissants, americano, pineapple, scrambled</p>
          </li>
          <li class="list-group-item">
          <h5 class="card-title">Mark (Booking ID: 23421)</h5>
          <p class="card-text">americano, pineapple, scrambled</p>
          </li>
          <li class="list-group-item">
          <h5 class="card-title">John (Booking ID: 98765)</h5>
          <p class="card-text">soft boiled, fruit loops, croissants</p>
          </li>
          <li class="list-group-item">
            <button type="submit" class="btn btn-primary" style="width: 100%; background: #1E261D; border: none;">Confirm</button>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <a class="card-link" data-toggle="collapse" href="#203">
        Room Number 203
      </a>
    </div>
    <div id="203" class="collapse" data-parent="#accordion">
      <div class="card-body">
        <ul class="list-group list-group-flush">
          <li class="list-group-item">
          <h5 class="card-title">Jack (Booking ID: 12345)</h5>
          <p class="card-text">muesli, latte, croissants</p>
          </li>
          <li class="list-group-item">
          <h5 class="card-title">Mark (Booking ID: 23421)</h5>
          <p class="card-text">americano, pineapple, scrambled</p>
          </li>
          <li class="list-group-item">
          <h5 class="card-title">John (Booking ID: 98765)</h5>
          <p class="card-text">soft boiled, fruit loops, croissants</p>
          </li>
          <li class="list-group-item">
            <button type="submit" class="btn btn-primary" style="width: 100%; background: #1E261D; border: none;">Confirm</button>
          </li>
        </ul>
      </div>
    </div>
  </div>



  <div class="card">
    <div class="card-header">
      <a class="card-link" data-toggle="collapse" href="#312">
        Room Number 312
      </a>
    </div>
    <div id="312" class="collapse" data-parent="#accordion">
      <div class="card-body">
        <ul class="list-group list-group-flush">
          <li class="list-group-item">
          <h5 class="card-title">Jack (Booking ID: 12345)</h5>
          <p class="card-text">muesli, latte, croissants</p>
          </li>
          <li class="list-group-item">
          <h5 class="card-title">Mark (Booking ID: 23421)</h5>
          <p class="card-text">americano, pineapple, scrambled</p>
          </li>
          <li class="list-group-item">
          <h5 class="card-title">John (Booking ID: 98765)</h5>
          <p class="card-text">soft boiled, fruit loops, croissants</p>
          </li>
          <li class="list-group-item">
            <button type="submit" class="btn btn-primary" style="width: 100%; background: #1E261D; border: none;">Confirm</button>
          </li>
        </ul>
      </div>
    </div>
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
