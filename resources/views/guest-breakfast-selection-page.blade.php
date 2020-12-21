<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
    <script src="https://kit.fontawesome.com/aee88f7c80.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

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
      <li class="nav-item">
        <a class="nav-link" href="/guesthome">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/amenities">Amenities</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/breakfast">Breakfast Selection<span class="sr-only">(current)</span></a>
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

<!-- date -->
<div class="row justify-content-center" style="margin-top:20px;">
<div class="card col-md-2" style="margin-left: 25px;">
  <div class="card-body">
    Date:
    <?php
    date_default_timezone_set("Singapore");
    echo date('d-m-Y');
     ?>
  </div>
</div>

<div class="card col-md-2" style="margin-left: 10px;">
  <div class="card-body">
    Time:
    <?php
    date_default_timezone_set("Singapore");
    echo date("h:ia");
     ?>
  </div>
</div>

<div class="card col-md-2" style="margin-left: 10px;">
  <div class="card-body">
    <input class="date form-control" type="text" placeholder="Order Date">
  </div>
</div>
<script type="text/javascript">
    $('.date').datepicker({
       format: 'mm-dd-yyyy'
     });
</script>

<div class="card col-md-2" style="margin-left: 10px;">
  <div class="card-body">
    <input class="timepicker form-control" type="text" placeholder='Order Time'>
    <?php

     ?>
  </div>
</div>
<script type="text/javascript">
    $('.timepicker').datetimepicker({
        format: 'HH:mm'
    });
</script>
</div>

<div class="row justify-content-center">
<div class="col-md-3" style="margin-top: 20px;">
  Location:
  <div class="custom-control custom-radio custom-control-inline" style="margin-left: 10px;">
  <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
  <label class="custom-control-label" for="customRadioInline1">THE LOUNGE</label>
</div>
<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
  <label class="custom-control-label" for="customRadioInline2">Room</label>
</div>
</div>
</div>

<div class="row justify-content-center">
<div class="card col-md-6" style="margin-top: 20px; margin-left: 10px;">
  <div class="card-body">
    Guest Room Number:
  </div>
</div>
</div>

<div class="row justify-content-center">
<table class="table table-bordered col-md-10" style="margin-top: 20px; margin-left: 10px">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Breakfast Selection</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>No selections made</td>
      <td>
        <div class="row">
        <button type="submit" class="btn btn-primary" style="width: 30%; margin-left: 10px; background: #1E261D; border: none;">Add</button>
        <button type="submit" class="btn btn-primary" style="width: 30%; margin-left: 10px; background: #1E261D; border: none;">Update</button>
        <button type="submit" class="btn btn-primary" style="width: 30%; margin-left: 10px; background: #1E261D; border: none;">Remove</button>
        </div>
      </td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>No selections made</td>
      <td>
        <div class="row">
        <button type="submit" class="btn btn-primary" style="width: 30%; margin-left: 10px; background: #1E261D; border: none;">Add</button>
        <button type="submit" class="btn btn-primary" style="width: 30%; margin-left: 10px; background: #1E261D; border: none;">Update</button>
        <button type="submit" class="btn btn-primary" style="width: 30%; margin-left: 10px; background: #1E261D; border: none;">Remove</button>
        </div>
      </td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>John</td>
      <td>No selections made</td>
      <td>
        <div class="row">
        <button type="submit" class="btn btn-primary" style="width: 30%; margin-left: 10px; background: #1E261D; border: none;">Add</button>
        <button type="submit" class="btn btn-primary" style="width: 30%; margin-left: 10px; background: #1E261D; border: none;">Update</button>
        <button type="submit" class="btn btn-primary" style="width: 30%; margin-left: 10px; background: #1E261D; border: none;">Remove</button>
        </div>
      </td>
    </tr>
  </tbody>
</table>
</div>

<div id="breakfastSelection">
<div class="row" style="justify-content: center; margin-top: 30px; margin-bottom: 30px; margin-left: 20px; margin-right: 20px;">
  <div class="col-md-12 col-xs-9">
    <h5>Make your breakfast selection: </h5>
    <div class="tabs">
      <div class="tab">
        <input type="radio" id="rd1" name="rd">
        <label class="tab-label" for="rd1">Local & Artisanal Bread</label>
        <div class="tab-content">
          <label class="container">Croissant
            <input type="checkbox">
            <span class="checkmark"></span>
          </label>
          <label class="container">Muesli
            <input type="checkbox">
            <span class="checkmark"></span>
          </label>
          <label class="container">Farmers
            <input type="checkbox">
            <span class="checkmark"></span>
          </label>
          <label class="container">Village Seed
            <input type="checkbox">
            <span class="checkmark"></span>
          </label>
          <label class="container">Butterscotch Muffin
            <input type="checkbox">
            <span class="checkmark"></span>
          </label>
        </div>
      </div>
      <div class="tab">
        <input type="radio" id="rd2" name="rd">
        <label class="tab-label" for="rd2">Artisanal Jam & Spread</label>
        <div class="tab-content">
          <label class="container">Grapefruit Marmalade
            <input type="checkbox">
            <span class="checkmark"></span>
          </label>
          <label class="container">Pineapple & Cinnamon
            <input type="checkbox">
            <span class="checkmark"></span>
          </label>
          <label class="container">Papaya & Nutmeg
            <input type="checkbox">
            <span class="checkmark"></span>
          </label>
          <label class="container">Kaya (Coconut Jam)
            <input type="checkbox">
            <span class="checkmark"></span>
          </label>
        </div>
      </div>
      <div class="tab">
        <input type="radio" id="rd4" name="rd">
        <label class="tab-label" for="rd4">Cheese</label>
        <div class="tab-content">
          <label class="container">Cheddar
            <input type="checkbox">
            <span class="checkmark"></span>
          </label>
          <label class="container">Spreadable Cheese
            <input type="checkbox">
            <span class="checkmark"></span>
          </label>
        </div>
      </div>
      <div class="tab">
        <input type="radio" id="rd5" name="rd">
        <label class="tab-label" for="rd5">Fresh Seasonal Fruit</label>
        <div class="tab-content">
          <label class="container">Papaya
            <input type="checkbox">
            <span class="checkmark"></span>
          </label>
          <label class="container">Watermelon
            <input type="checkbox">
            <span class="checkmark"></span>
          </label>
          <label class="container">Dragonfruit
            <input type="checkbox">
            <span class="checkmark"></span>
          </label>
        </div>
      </div>
      <div class="tab">
        <input type="radio" id="rd6" name="rd">
        <label class="tab-label" for="rd6">Cereal</label>
        <div class="tab-content">
          <label class="container">Cornflakes
            <input type="checkbox">
            <span class="checkmark"></span>
          </label>
          <label class="container">Frosties
            <input type="checkbox">
            <span class="checkmark"></span>
          </label>
          <label class="container">Coco Pops
            <input type="checkbox">
            <span class="checkmark"></span>
          </label>
          <label class="container">Fruit Loops
            <input type="checkbox">
            <span class="checkmark"></span>
          </label>
        </div>
      </div>
      <div class="tab">
        <input type="radio" id="rd7" name="rd">
        <label class="tab-label" for="rd7">Eggs (2 Per Serving)</label>
        <div class="tab-content">
          <label class="container">Sunny Side Up
            <input type="checkbox">
            <span class="checkmark"></span>
          </label>
          <label class="container">Omelette
            <input type="checkbox">
            <span class="checkmark"></span>
          </label>
          <label class="container">Over Easy
            <input type="checkbox">
            <span class="checkmark"></span>
          </label>
          <label class="container">Hard Boiled
            <input type="checkbox">
            <span class="checkmark"></span>
          </label>
          <label class="container">Half Boiled
            <input type="checkbox">
            <span class="checkmark"></span>
          </label>
          <label class="container">Scrambled
            <input type="checkbox">
            <span class="checkmark"></span>
          </label>
          <label class="container">Soft Boiled
            <input type="checkbox">
            <span class="checkmark"></span>
          </label>
        </div>
      </div>
      <div class="tab">
        <input type="radio" id="rd8" name="rd">
        <label class="tab-label" for="rd8">Juices & Milk</label>
        <div class="tab-content">
          <label class="container">Orange
            <input type="checkbox">
            <span class="checkmark"></span>
          </label>
          <label class="container">Pineapple
            <input type="checkbox">
            <span class="checkmark"></span>
          </label>
          <label class="container">Pure Fresh Milk - Cold
            <input type="checkbox">
            <span class="checkmark"></span>
          </label>
          <label class="container">Full Cream Milk - Hot
            <input type="checkbox">
            <span class="checkmark"></span>
          </label>
        </div>
      </div>
      <div class="tab">
        <input type="radio" id="rd9" name="rd">
        <label class="tab-label" for="rd9">Gourmet Coffee</label>
        <div class="tab-content">
          <label class="container">Americano
            <input type="checkbox">
            <span class="checkmark"></span>
          </label>
          <label class="container">Cappuccino
            <input type="checkbox">
            <span class="checkmark"></span>
          </label>
          <label class="container">Espresso (Single/Double)
            <input type="checkbox">
            <span class="checkmark"></span>
          </label>
          <label class="container">Latte
            <input type="checkbox">
            <span class="checkmark"></span>
          </label>
        </div>
      </div>
      <div class="tab">
        <input type="radio" id="rd10" name="rd">
        <label class="tab-label" for="rd10">Artisanal Tea</label>
        <div class="tab-content">
          <label class="container">English Breakfast
            <input type="checkbox">
            <span class="checkmark"></span>
          </label>
          <label class="container">Lemongrass & Ginger
            <input type="checkbox">
            <span class="checkmark"></span>
          </label>
          <label class="container">Earl Grey
            <input type="checkbox">
            <span class="checkmark"></span>
          </label>
          <label class="container">Red Berry
            <input type="checkbox">
            <span class="checkmark"></span>
          </label>
          <label class="container">Green
            <input type="checkbox">
            <span class="checkmark"></span>
          </label>
          <label class="container">Chamomile
            <input type="checkbox">
            <span class="checkmark"></span>
          </label>
        </div>
      </div>
      <div class="tab">
        <input type="radio" id="rd3" name="rd">
        <label for="rd3" class="tab-close">Close All Tabs &times;</label>
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
