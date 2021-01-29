<!-- Styles -->
<style>
#chartdiv {
  width: 100%;
  height: 500px;
}
</style>

<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

<!-- Chart code -->
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end



var chart = am4core.create('chartdiv', am4charts.XYChart)
chart.colors.step = 2;

chart.legend = new am4charts.Legend()
chart.legend.position = 'top'
chart.legend.paddingBottom = 20
chart.legend.labels.template.maxWidth = 95

let title = chart.titles.create();
title.text = "Guest Feedbacks";
title.fontSize = 25;
title.marginBottom = 30;

var xAxis = chart.xAxes.push(new am4charts.CategoryAxis())
xAxis.dataFields.category = 'category'
xAxis.renderer.cellStartLocation = 0.1
xAxis.renderer.cellEndLocation = 0.9
xAxis.renderer.grid.template.location = 0;

var yAxis = chart.yAxes.push(new am4charts.ValueAxis());
yAxis.min = 0;

function createSeries(value, name) {
    var series = chart.series.push(new am4charts.ColumnSeries())
    series.dataFields.valueY = value
    series.dataFields.categoryX = 'category'
    series.name = name

    series.events.on("hidden", arrangeColumns);
    series.events.on("shown", arrangeColumns);

    var bullet = series.bullets.push(new am4charts.LabelBullet())
    bullet.interactionsEnabled = false
    bullet.dy = 30;
    bullet.label.text = '{valueY}'
    bullet.label.fill = am4core.color('#ffffff')

    return series;
}

var Q1 = {!! $Q1 !!};
var Q2 = {!! $Q2 !!};
var Q3 = {!! $Q3 !!};

var Q1arr = [];
var Q2arr = [];
var Q3arr = [];

for(var i = 0; i < Q1.length; i++) {
    var obj = Q1[i];

    Q1arr.push(obj.R1);
    Q1arr.push(obj.R2);
    Q1arr.push(obj.R3);
    Q1arr.push(obj.R4);
    Q1arr.push(obj.R5);
}

for(var i = 0; i < Q2.length; i++) {
    var obj = Q2[i];

    Q2arr.push(obj.R1);
    Q2arr.push(obj.R2);
    Q2arr.push(obj.R3);
    Q2arr.push(obj.R4);
    Q2arr.push(obj.R5);
}

for(var i = 0; i < Q3.length; i++) {
    var obj = Q3[i];

    Q3arr.push(obj.R1);
    Q3arr.push(obj.R2);
    Q3arr.push(obj.R3);
    Q3arr.push(obj.R4);
    Q3arr.push(obj.R5);
}


chart.data = [
  {
    category: 'Q1',
    R1: Q1arr[0],
    R2: Q1arr[1],
    R3: Q1arr[2],
    R4: Q1arr[3],
    R5: Q1arr[4]
  },
  {
      category: 'Q2',
      R1: Q2arr[0],
      R2: Q2arr[1],
      R3: Q2arr[2],
      R4: Q2arr[3],
      R5: Q2arr[4]
  },
  {
      category: 'Q3',
      R1: Q3arr[0],
      R2: Q3arr[1],
      R3: Q3arr[2],
      R4: Q3arr[3],
      R5: Q3arr[4]
  }
]

createSeries('R1', 'Very Poor');
createSeries('R2', 'Poor');
createSeries('R3', 'Fair');
createSeries('R4', 'Good');
createSeries('R5', 'Excellent');

function arrangeColumns() {

    var series = chart.series.getIndex(0);

    var w = 1 - xAxis.renderer.cellStartLocation - (1 - xAxis.renderer.cellEndLocation);
    if (series.dataItems.length > 1) {
        var x0 = xAxis.getX(series.dataItems.getIndex(0), "categoryX");
        var x1 = xAxis.getX(series.dataItems.getIndex(1), "categoryX");
        var delta = ((x1 - x0) / chart.series.length) * w;
        if (am4core.isNumber(delta)) {
            var middle = chart.series.length / 2;

            var newIndex = 0;
            chart.series.each(function(series) {
                if (!series.isHidden && !series.isHiding) {
                    series.dummyData = newIndex;
                    newIndex++;
                }
                else {
                    series.dummyData = chart.series.indexOf(series);
                }
            })
            var visibleCount = newIndex;
            var newMiddle = visibleCount / 2;

            chart.series.each(function(series) {
                var trueIndex = chart.series.indexOf(series);
                var newIndex = series.dummyData;

                var dx = (newIndex - trueIndex + middle - newMiddle) * delta

                series.animate({ property: "dx", to: dx }, series.interpolationDuration, series.interpolationEasing);
                series.bulletsContainer.animate({ property: "dx", to: dx }, series.interpolationDuration, series.interpolationEasing);
            })
        }
    }
}

}); // end am4core.ready()
</script>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
    <script src="https://kit.fontawesome.com/aee88f7c80.js" crossorigin="anonymous"></script>

    <title>Customer Feedback Chart</title>
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
      <!-- <li class="nav-item active">
        <a class="nav-link" href="#">Home<span class="sr-only">(current)</span></a>
      </li> -->
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
            <li class="nav-item active">
              <a class="nav-link" href="/chart">Customer Feedback</a>
            </li>
      <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Me
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <!-- <a class="dropdown-item" href="#">Info</a>
                <a class="dropdown-item" href="#">Account Settings</a> -->
                <a class="dropdown-item" href="/logoutstaff">Log Out</a>
              </div>
            </li>
    </ul>
  </div>
</nav>


<div class="row" style="margin-top: 20px; margin-bottom: 60px;height: 50px; max-height: 50px; margin-left: 5px; margin-right: 5px;">
<div style="margin-left: 5px; margin-right: 5px;">
    <input id="fromDate" class="date form-control " data-format="dd-mm-yyyy" type="text" placeholder="From" value="{{$tempFrom ?? ''}}" style="height: 50px; max-height: 50px;">
</div>

<div style="margin-left: 5px; margin-right: 5px;">
    <input id="toDate" class="date form-control " data-format="dd-mm-yyyy" type="text" placeholder="To" value="{{$tempTo ?? ''}}" style="height: 50px; max-height: 50px;">
</div>
<script type="text/javascript">
    $('.date').datepicker({
      format: "dd/mm/yyyy",
      todayHighlight: true
    });
</script>

<button id="searchButton" onclick="search()" type="submit" class="btn btn-primary fas fa-search px-5 py-3" style="background: #1E261D; border: none; margin-left: 10px; margin-right: 10px;"> Search</button>

</div>


<div id="chartdiv"></div>

<div style="margin-top: 20px; margin-left: 20px;">
  <h5>Q1: How was your overall breakfast experience?</h5>
  <h5>Q2: How was the speed of our breakfast service delivery?</h5>
  <h5>Q3: Were we able to meet your expectations to our Continental Breakfast offerings?</h5>
</div>

<div class="row" style="margin-top: 50px; margin-left: 20px; display:flex; justify-content: center;">

  <div class="card border-primary mb-3" style="max-width: 40rem; margin-right: 10px; margin-left: 10px;">
  <div class="card-header">What was your favourite breakfast item? (Q4)</div>
  @foreach($Q4 as $q4)
  <div class="card-body text-primary">
    <h5 class="card-title">Room No: {{$q4->room_number}}</h5>
    <p class="card-text">{{$q4->remarks}}</p>
  </div>
  <hr>
  @endforeach
</div>

  <div class="card border-success mb-3" style="max-width: 40rem; margin-right: 10px; margin-left: 10px;">
  <div class="card-header">What are the areas of improvement to enhance your breakfast experience? (Q5)</div>
  @foreach($Q5 as $q5)
  <div class="card-body text-primary">
    <h5 class="card-title">Room No: {{$q5->room_number}}</h5>
    <p class="card-text">{{$q5->remarks}}</p>
  </div>
  <hr>
  @endforeach
</div>

</div>

<script type="text/javascript">

  function search(){
    var fromDate = document.getElementById('fromDate').value;
    var toDate = document.getElementById('toDate').value;

    if(fromDate == '' || toDate == ''){
      alert("Please select a range of dates.");
    } else {
      window.location.href = "{{ URL::to('/chart/')}}" + "?fromDate="+fromDate + "&toDate="+toDate;
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
    <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/themes/material.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/lang/de_DE.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/geodata/germanyLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/fonts/notosans-sc.js"></script>
  </body>
</html>
