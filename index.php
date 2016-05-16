<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<meta content="IE=edge" http-equiv="X-UA-Compatible">
<meta content="width=device-width, initial-scale=1" name="viewport">
<meta content="" name="description">
<meta content="" name="author">
<title>Trajectory finder</title>
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
                    zoom: 10,
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
                  
                /*
                  var marker = new google.maps.Marker({
                    position: latlng, 
                    map: map, 
                    title:"my hometown, Malim Nawar!"
                  }); 
                      */
                  
                }
                
            </script>
<link rel="icon" type="image/x-icon" href="favicon.ico" />
</head>
<body onload="loadMap()">
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">Trajectory Finder</a>
			</div>
	
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-sm-8">
				<div id="map_container"></div>
			</div>
			<div class="col-sm-4">
				<div id="info">
					<div id="marker"></div>
					<div id="trajectory"></div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<button type="button" id="search" class="btn btn-default">Load more</button>
				<p id="points"></p>
			</div>
		</div>
	</div>
	<hr>
	<div class="container">
		<footer>
			<p class="pull-right">
				<a href="#">Back to top</a>
			</p>
			<p>&copy; 2016 Project, RMIT.</p>
		</footer>
	</div>
</body>
</html>