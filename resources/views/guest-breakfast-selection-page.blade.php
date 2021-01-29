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

    <title>Breakfast Selection</title>
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
      <!-- <li class="nav-item">
        <a class="nav-link" href="/guesthome">Home</a>
      </li> -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="/amenities">Amenities</a>
      </li> -->
      <li class="nav-item active">
        <a class="nav-link" href="/breakfast">Breakfast Selection<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/feedback-form">Feedback</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Me
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <!-- <a class="dropdown-item" href="#">Info</a> -->
        <!-- <a class="dropdown-item" href="#">Account Settings</a> -->
        <a class="dropdown-item" href="/logoutguest">Log Out</a>
        </div>
      </li>
    </ul>
  </div>
</nav>

@if (session('success'))
    <div class="alert alert-success alert-dismissible" auto-close="5000" style="margin-right: 10px; margin-left: 10px; margin-bottom: 10px; auto; width: 100%;">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
    </div>
@endif

@if (session('fail'))
    <div class="alert alert-warning alert-dismissible" auto-close="5000" style="margin-right: 10px; margin-left: 10px; margin-bottom: 10px; auto; width: 100%;">
        {{ session('fail') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
    </div>
@endif

<div class="row justify-content-center">
<div style="margin-top: 20px;">
  Location:

  <div class="custom-control custom-radio custom-control-inline" style="margin-left: 10px;">
  <input type="radio" id="locationLounge" name="locationCheck" class="custom-control-input" checked>
  <label class="custom-control-label" for="locationLounge">THE LOUNGE</label>
</div>

<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" id="locationRoom" name="locationCheck" class="custom-control-input">
  <label class="custom-control-label" for="locationRoom">Room</label>
</div>
</div>
</div>

<div class="row justify-content-center" style="margin-top: 10px;">
<div class="card" style="margin-top: 10px; margin-left: 5px; margin-right: 5px; height: 50px; max-height: 50px">
  <div class="card-body" style="display: flex; align-items: center">
    Room Number:
    @foreach($room_mates as $room_mate)
    {{$room_mate->room_number}}
    @break
    @endforeach
  </div>
</div>

<div class="card" style="margin-top: 10px; margin-left: 5px; margin-right: 5px; max-height: 50px;">
  <div class="card-body" style="display: flex; align-items: center;">
    Date:
    <?php
    date_default_timezone_set("Singapore");
    echo date('d-m-Y');
     ?>
  </div>
</div>

<div class="card" style="margin-top: 10px; margin-left: 5px; margin-right: 5px; max-height: 50px;">
  <div class="card-body" style="display: flex; align-items: center;">
    Time:
    <?php
    date_default_timezone_set("Singapore");
    echo date("h:ia");
     ?>
  </div>
</div>

<div id="orderDate" style="margin-top: 10px; height: 50px; max-height: 50px; margin-left: 5px; margin-right: 5px;">
    <input class="date form-control " data-format="dd-mm-yyyy" type="text" placeholder="Order Date" style="height: 50px; max-height: 50px;">
</div>
<script type="text/javascript">
    $('.date').datepicker({
      format: "dd/mm/yyyy",
      startDate: new Date(),
      todayHighlight: true
    });
</script>

<div id="orderTime" style="margin-top: 10px; height: 50px; max-height: 50px; margin-left: 5px; margin-right: 5px;">
    <input class="timepicker form-control" data-format="hh:mm" type="text" placeholder='Order Time' style="height: 50px; max-height: 50px;">
</div>
<script type="text/javascript">
    $('.timepicker').datetimepicker({
        stepping: 5,
        maxDate: moment({h:10, m:30}),
        format: 'HH:mm'
    });
</script>
</div>

<div class="row justify-content-center" style="margin-left: 10px; margin-right: 10px;">
<table id="nameTable" class="table table-bordered col-md-8" style="margin-top: 20px;">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Breakfast Selection</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($room_mates as $room_mate)
    <tr class="bookingIDUpload" id="{{$room_mate->booking_id}}">
      <th scope="row">{{$room_mate->customer_name}}</th>
      <td class ="breakfastUpload" id="td-{{$room_mate->booking_id}}" style="max-width: 200px;">No selections made</td>
      <td>
        <div id="breakfastSelection" class="row justify-content-center">
        <a href="" class="btn btn-primary fas fa-plus" name="{{$room_mate->booking_id}}" style="margin-left: 5px; margin-right: 5px; margin-top: 10px; background: #1E261D; border: none;"
          onclick="event.preventDefault();
            $('input[type=checkbox]').prop('checked',false);
            document.getElementById('rd1').checked=true;
            selectingFor.innerText = 'Selecting for {{$room_mate->customer_name}}';
            customer_id.innerText = this.name;
            "
        ></a>
        <button type="submit" class="btn btn-primary fas fa-pencil-alt" name="{{$room_mate->booking_id}}" style="margin-left: 5px; margin-right: 5px; margin-top: 10px; background: #1E261D; border: none;"
          onclick="
          selectingFor.innerText = 'Editing for {{$room_mate->customer_name}}';
          customer_id.innerText = this.name;
          editSelection(this.name);
          "
        ></button>
        <button onclick="clearSelection(this.name)" type="submit" class="btn btn-primary fas fa-trash-alt" name="{{$room_mate->booking_id}}" style="margin-left: 5px; margin-right: 5px; margin-top: 10px; background: #1E261D; border: none;"></button>
        </div>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>

<div class="row justify-content-center">
  <button id="saveCheckBox" onclick="saveCheckBox()" type="submit" class="btn btn-primary fas fa-save px-5 py-3" style="background: #1E261D; border: none; margin-right: 10px;"> Save</button>

  <button onclick="uploadSelection()" type="submit" class="btn btn-primary px-5 py-3" style="margin-left: 10px; background: #1E261D; border: none;">Confirm Selection</button>

</div>


<div id="breakfastSelection">
<div class="row" style="justify-content: center; margin-top: 30px; margin-bottom: 30px; margin-left: 20px; margin-right: 20px;">
  <div class="col-md-12 col-xs-9">
    <h3 id ="selectingFor" style="text-align: center;">Make your breakfast selection: </h3>
    <p style="display: none; text-align: center;" id="customer_id"></p>
    <div class="tabs">
      @foreach($groupID as $groupid)
      <div class="tab">
        <input type="radio" id="rd{{$loop->index+1}}" name="rd">
        <label class="tab-label" for="rd{{$loop->index+1}}">{{$groupid->group_name}}</label>
        <div class="tab-content">
          @foreach($breakfastSelection as $breakfastselection)
            @if($breakfastselection->group_id == $groupid->breakfast_group_id)
          <label class="container">
            <input value="{{$breakfastselection->item_name}}" type="checkbox" id="{{$breakfastselection->breakfast_selection_id}}" onclick="checkBox(this.id)">
              {{$breakfastselection->item_name}}
            </input>
            <span class="checkmark"></span>
          </label>
          @endif
          @endforeach
        </div>
      </div>
      @endforeach
    </div>
  </div>
  </div>
  </div>

  <script type="text/javascript">
    var customerID;

    function saveCheckBox(){

      //get all the checkbox inputs that are checked and insert it into an array
      var checkedSelection = document.querySelectorAll('#breakfastSelection input[type="checkbox"]:checked');
      var food = [];
      for (var i = 0; i < checkedSelection.length; i++) food.push(checkedSelection[i].value);

      //get the customer id from the hidden element
      customerID = document.getElementById('customer_id').innerText;
      //save the selection to the row that has the selected customer's ID
      document.getElementById('td-' + customerID).innerHTML = food;
      alert("Saved");

      //set the array back to 0 for the next user to use
      food.length = 0;
      //scroll to top
      window.scrollTo({top: 0, behavior: 'smooth'});

    }

    function clearSelection(id){

      //get confirmation from user before deleting their selection
      var confirm = window.confirm("Do you want to delete your selection?");

      if(confirm == true){
        document.getElementById('td-' + id).innerHTML = "No selections made";
      }

    }

    function editSelection(id){

      //uncheck all previously checked checkboxes
      $('input[type=checkbox]').prop('checked',false);
      //show the first selection row
      document.getElementById('rd1').checked=true;
      //get the food selection from the particular customer's row and remove the commmas
      //insert it into an array
      var food = document.getElementById('td-' + id).innerHTML;
      var foodArray = food.split(',');

      //run a for each loop for the array and check every checkbox that has the same values as the array elements
      foodArray.forEach(loopFunction);

      function loopFunction(index){
        //document.getElementById(index).checked = true;
        var checkedSelection = document.querySelectorAll('#breakfastSelection input[type="checkbox"]');
        for (var i = 0; i < checkedSelection.length; i++){
          if(checkedSelection[i].value == index){
            checkedSelection[i].checked = true;
          }
        }
      }

    }


    function uploadSelection(){
      //get order date and order time input
      var orderDate = $('input.date').val();
      var orderTime = $('input.timepicker').val();
      var location = 0;

      if(orderDate == '' || orderTime == ''){
        alert('Please choose your order date and order time.');
      } else {

      var confirm = window.confirm("Do you want to send your request?");

          if(confirm){

          //get the rows of the guest table
          //initiate some values
          var table = document.getElementById('nameTable');
          var rows = table.rows.length;
          var bookingID = [];
          var id;
          var selection = {};
          var currentSelectionID = [];
          var getFoodID = document.querySelectorAll('#breakfastSelection input[type="checkbox"]');

          //get the booking id from the rows
          //push booking id into an array
          for(var i = 1; i<rows; i++){
            bookingID.push(table.rows[i].id);
          }

          //loop through booking id array
          //get the particular booking id
          //assign the particular booking id with the particular selection value
          for (var j = 0; j<bookingID.length; j++) {

            //particular id
            id = bookingID[j];

            //particular id's food selection
            var food = document.getElementById('td-' + id).innerHTML;

            var foodArray = food.split(',');
            foodArray.forEach(loopFunction);

            //for each customer
            //get the food from table
            //choose the checkboxes that has the same value as the food
            //get the checkbox id and save it to an array
            //save the id key and array value to selection array

            function loopFunction(index){
              for(var i = 0; i < getFoodID.length; i++){
                if(getFoodID[i].value == index){
                  currentSelectionID.push(getFoodID[i].id);
                }
              }
            }

            selection[id] = currentSelectionID;
            currentSelectionID = [];
          }

          var sendSelection = encodeURIComponent(JSON.stringify(selection));

          if(document.getElementById('locationLounge').checked){
            location = 1;
          } else if (document.getElementById('locationRoom').checked){
            location = 2;
          } else {
            location = 0;
          }

          window.location.href = "{{ URL::to('/breakfast/submit/')}}" + "?selection="+sendSelection + "&orderDate="+orderDate + "&orderTime="+orderTime + "&location="+location;


        }

      }


    }
  </script>


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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </body>
</html>
