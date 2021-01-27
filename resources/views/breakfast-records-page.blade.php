<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Breakfast Records</title>
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
        <a class="nav-link" href="#">Breakfast Records</a>
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

<div class="row justify-content-center" style="margin-top: 20px; margin-bottom: 20px;">

  <div class="card text-white bg-success mb-3" style="max-width: 18rem; max-height: 140px; margin-right: 10px;">
    <div class="card-header">Completed Breakfast Requests</div>
    <div class="card-body" style="text-align: center;">
      <h1>{{$countCompleted}}</h1>
    </div>
  </div>

  <div class="card text-dark bg-warning mb-3" style="max-width: 18rem; max-height: 140px; margin-right: 10px;">
  <div class="card-header">Pending Breakfast Requests</div>
  <div class="card-body" style="text-align: center;">
    <h1>{{$countPending}}</h1>
  </div>
</div>

<div id="accordion" class="col-md-6">
  @foreach($room_numbers as $room_number)
  <div class="card" style="margin-bottom: 10px;">
    <div class="card-header">
      <a class="card-link" data-toggle="collapse" href="#{{$room_number->room_number}}">
        Room number: {{$room_number->room_number}} | Location: {{$room_number->breakfast_location === 1? "The Lounge" : ($room_number->breakfast_location === 2? "Room" : "Not available")}} </br>
        Date and Time: {{ date('d-M-y | h:i', strtotime($room_number->booking_date_time)) }}
      </a>
    </div>
    <div id="{{$room_number->room_number}}" class="collapse" data-parent="#accordion">
      <div class="card-body">
        <ul class="list-group list-group-flush">
          @foreach($breakfastSelections as $breakfastSelection)
          @if($breakfastSelection->room_number == $room_number->room_number)
          <li class="list-group-item">
          <h3 class="card-title">{{$breakfastSelection->customer_name}}</h3>
              @foreach(explode(',', $breakfastSelection->breakfast_selection_id) as $selection_id)
              @if($selection_id == '')
               [No selections made]
              @else
              @foreach($food as $foods)
              @if($foods->breakfast_selection_id == $selection_id)
               [{{$foods->item_name}}]
              @endif
              @endforeach
              @endif
              @endforeach
              <!--
          <div class="form-floating" style="margin-top: 10px;">
            <textarea class="form-control" placeholder="Leave a remark here" id="remark" style="height: 100px"></textarea>
          </div>
        -->
          </li>
          @endif
          @endforeach
          <li class="list-group-item">
            <form action="{{route('submit.breakfast.records', $room_number->room_number)}}" method="post">
              @csrf
            <button type="submit" class="btn btn-primary" style="width: 100%; background: #1E261D; border: none;">Confirm</button>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </div>
  @endforeach
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
