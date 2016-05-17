<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<meta content="IE=edge" http-equiv="X-UA-Compatible">
<meta content="width=device-width, initial-scale=1" name="viewport">
<meta content="" name="description">
<meta content="" name="author">
<title>TraFinder@RMIT</title>
<link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="css/main.css" rel="stylesheet" />
<link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet" />
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript"
	src="http://maps.googleapis.com/maps/api/js?v=3&sensor=false"></script>
<script src="js/main.js"></script>
<script src="js/ie-emulation-modes-warning.js"></script>
<script src="js/ie10-viewport-bug-workaround.js"></script>
<script type="text/javascript">
                var map = null;
                var data = [];
                var gmarkers = [];
                var tmarkers = [];
                var trajectory = null;
                function loadMap() {
                  var latlng = new google.maps.LatLng(33.77229828866843 , -118.37871551513672);

                  var myOptions = {
                    zoom: 11,
                    center: latlng,
                    mapTypeId: google.maps.MapTypeId.Terrian
                  };

                  map = new google.maps.Map(document.getElementById("map_container"),myOptions);
                  google.maps.event.addListener(map, 'click', function( event ){
                    //alert( "Latitude: "+event.latLng.lat()+" "+", longitude: "+event.latLng.lng() );
                    data.push(event.latLng);
                    marker = new google.maps.Marker({
                            position: new google.maps.LatLng(event.latLng.lat(), event.latLng.lng()),
                            map: map
                    });
                    tmarkers.push(marker);
                    if(data.length > 1){
                        if(trajectory != null){
                            trajectory.setMap(null);
                        }
                        trajectory = new google.maps.Polyline({
                            path: data,
                            strokeColor: '#FF0000',
                            strokeOpacity: 1.0,
                            strokeWeight: 2,
                            editable: false
                        });
                        trajectory.setMap(map);
                    }
                    $("#trajectory").append('<div class="bs-callout bs-callout-danger"><h6>Lat: '+event.latLng.lat()+' Lng: '+event.latLng.lng()+' <span id="remove" class="glyphicon glyphicon-remove pull-right"> </span></h6><input type="text" class="form-control input-sm" placeholder="Activity"> </div>')
                  });
                }
                
            </script>
<link rel="icon" type="image/x-icon" href="favicon.ico" />
</head>
<body onload="loadMap()">
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
		<!-- 	<image src = "images/rmit.jpg" width="60px" height="20px"> -->
				<a class="navbar-brand" href="#">TraFinder@RMIT</a>
			</div>
	
	</nav>
	<div class="div_column1">
	top-result<img src="images/2.jpg" width="20px" height="200px"><img src="images/3.jpg" width="50px" height="200px">
	<img src="images/4.jpg" width="50px" height="200px"><img src="images/5.jpg" width="50px" height="200px">
	<img src="images/6.jpg" width="50px" height="200px">
	</div>
	<div class="div_column2">
		<div class="container">

			<div class="row">
				<div class="col-sm-8">
					<div id="map_container"></div>
				</div>				
			</div>
			<div class="row2">
<marquee scrollamount="1" scrolldelay="10" direction= "right" width="1370" height="200">
	<img src="images/2.jpg" width="200" height="200" />
       <img src="images/3.jpg" width="200" height="200" />
       <img src="images/4.jpg" width="200" height="200" />
      <img src="images/5.jpg" width="200" height="200" />
      <img src="images/6.jpg" width="200" height="200" />
    </marquee>
			</div>
			<div class="row">
				<div class="col-sm-12">
				<!--  <button type="button" id="search" class="btn btn-default">Load more</button>-->	
					<p id="points"></p>
				</div>
			</div>
			

		</div>
	</div>
	<div class="div_column3">
		<div class = "row">
		<img src="images/1.jpg">
		</div>
		<div id="marker"></div>
		<form action="algorithm.php" method="get">
		<div class="row1">
				Select Algorithm:
				<label><input name="algorithm" type="radio" value="" />BF </label>
				<label><input name="algorithm" type="radio" value="" />ETQ </label>
				<label><input name="algorithm" type="radio" value="" checked/>ETQ-O </label>
				</p>Set the number of result returned: <select>
					<option value="1">10</option>
					<option value="2">20</option>
					<option value="3">30</option>
					<option value="4">40</option>
					<option value="5">50</option>
				</select>
				<div id="info">
				<div id="trajectory"></div>
			</div>
		</div>
		<input type="submit" value="Search">
			</form>
	</div>
	<hr>
</body>
</html>