<!DOCTYPE html>
<html  lang="en">
  <head>
    <meta charset=utf-8>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>HFU Mitfahrbörse - Fahrt suchen</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="expires" content="0">
	<meta http-equiv="pragma" content="no-cache">
	<meta http-equiv="cache-control" content="no-cache">
    <meta name="author" content="Julia Klimesch, Lisa Wojtynek,Vanessa Zimmermann" />
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
	<meta name="keywords" content="HFU, Hochschule Furtwangen, Mitfahrgelegenheit, Furtwangen, Hochschule">
	<meta name="description" content="Auf dieser Seite finden Sie die HFU Mitfahrgelegenheit. Konzipiert nur f&uuml;r Studenten und Angestellte der Hochschule Furtwangen.">

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="mitfahrgelegenheit.css" />


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	 <style>
  <!--     #map-canvas {
        height: 95%;
        width: 95%;
		margin: 10px;
		padding: 20px
      } -->
   <!--   .controls {
        margin-top: 16px;
        border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 32px;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
      } -->

  <!--    #pac-input {
        background-color: #fff;
        padding: 0 11px 0 13px;
        width: 400px;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        text-overflow: ellipsis;
      }

      #pac-input:focus {
        border-color: #4d90fe;
        margin-left: -1px;
        padding-left: 14px;  /* Regular padding-left + 1. */
        width: 401px;
      }

      .pac-container {
        font-family: Roboto;
      } -->

  <!--    #type-selector {
        color: #fff;
        background-color: #4d90fe;
        padding: 5px 11px 0px 11px;
      } -->

    <!--  #type-selector label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      } -->
}

    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>

<script>
	
	
function initialize() {
	var startloc = null;
	var endloc = null;

  var mapOptions = {
    center: new google.maps.LatLng(48.045742, 8.183558),
    zoom: 13
  };
  // DIV zu einem Mapobjekt machen
  var map = new google.maps.Map(document.getElementById('map-canvas'),
    mapOptions);

  var input1 = document.getElementById('pac-input1');
  var input2 = document.getElementById('pac-input2');

  var types = document.getElementById('type-selector');
 // map.controls[google.maps.ControlPosition.TOP_LEFT].push(input1);
 // map.controls[google.maps.ControlPosition.TOP_LEFT].push(input2);
 // map.controls[google.maps.ControlPosition.TOP_LEFT].push(types);

  var autocomplete1 = new google.maps.places.Autocomplete(input1);
  autocomplete1.bindTo('bounds', map);

  var infowindow = new google.maps.InfoWindow();
  var marker1 = new google.maps.Marker({
    map: map,
    anchorPoint: new google.maps.Point(0, -29)
  });

  google.maps.event.addListener(autocomplete1, 'place_changed', function() {
	infowindow.close();
    marker1.setVisible(false);
    var place = autocomplete1.getPlace();
    if (!place.geometry) {
      return;
    }

	// Draw route onto map
	startloc = place.geometry.location;
	if (endloc!=null) {
		getRoute(startloc, endloc, map);
	}
	
    // If the place has a geometry, then present it on a map.
    if (place.geometry.viewport) {
      map.fitBounds(place.geometry.viewport);
    } else {
      map.setCenter(place.geometry.location);
      map.setZoom(17);  // Why 17? Because it looks good.
    }
    marker1.setIcon(/** @type {google.maps.Icon} */({
      url: place.icon,
      size: new google.maps.Size(71, 71),
      origin: new google.maps.Point(0, 0),
      anchor: new google.maps.Point(17, 34),
      scaledSize: new google.maps.Size(35, 35)
    }));
    marker1.setPosition(place.geometry.location);
    marker1.setVisible(true);

    var address = '';
    if (place.address_components) {
      address = [
        (place.address_components[0] && place.address_components[0].short_name || ''),
        (place.address_components[1] && place.address_components[1].short_name || ''),
        (place.address_components[2] && place.address_components[2].short_name || '')
      ].join(' ');
    }

    infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
    infowindow.open(map, marker1);
  });

  var autocomplete2 = new google.maps.places.Autocomplete(input2);
  autocomplete2.bindTo('bounds', map);

  var marker2 = new google.maps.Marker({
    map: map,
    anchorPoint: new google.maps.Point(0, -29)
  });

  google.maps.event.addListener(autocomplete2, 'place_changed', function() {
	
    infowindow.close();
    marker2.setVisible(false);
    var place = autocomplete2.getPlace();
    if (!place.geometry) {
      return;
    }

	
	endloc = place.geometry.location;
	//alert(startloc + ", " + endloc);
	if (startloc!=null) {
		getRoute(startloc, endloc, map);
	}
	
    // If the place has a geometry, then present it on a map.
    if (place.geometry.viewport) {
      map.fitBounds(place.geometry.viewport);
    } else {
      map.setCenter(place.geometry.location);
      map.setZoom(17);  // Why 17? Because it looks good.
    }
    marker2.setIcon(/** @type {google.maps.Icon} */({
      url: place.icon,
      size: new google.maps.Size(71, 71),
      origin: new google.maps.Point(0, 0),
      anchor: new google.maps.Point(17, 34),
      scaledSize: new google.maps.Size(35, 35)
    }));
    marker2.setPosition(place.geometry.location);
    marker2.setVisible(true);

    var address = '';
    if (place.address_components) {
      address = [
        (place.address_components[0] && place.address_components[0].short_name || ''),
        (place.address_components[1] && place.address_components[1].short_name || ''),
        (place.address_components[2] && place.address_components[2].short_name || '')
      ].join(' ');
    }

    infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
    infowindow.open(map, marker2);
  });
  
  // Sets a listener on a radio button to change the filter type on Places
  // Autocomplete.
  function setupClickListener(id, types) {
    var radioButton = document.getElementById(id);
    google.maps.event.addDomListener(radioButton, 'click', function() {
      autocomplete2.setTypes(types);
    });
  }

  setupClickListener('changetype-all', []);
  setupClickListener('changetype-address', ['address']);
  setupClickListener('changetype-establishment', ['establishment']);
  setupClickListener('changetype-geocode', ['geocode']);
}

google.maps.event.addDomListener(window, 'load', initialize);

//Ab hier wird die Route gezeichnet

    </script>
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script>
		var glob_route = null;
		function getRoute(startpos, endpos, map) {
			if (glob_route!=null) {
				glob_route.setMap(null);
			}
			new google.maps.DirectionsService().route(
				{
					origin: startpos,
					destination: endpos,
					travelMode: google.maps.TravelMode.DRIVING
				},
				function(a, b) {
					/*var route = new google.maps.Polyline(
						{
							path: a.legs
						}
					);*/
					var paths = new Array();
					for (var i=0;i<a.routes[0].legs[0].steps.length;i++) {
						for (var q=0;q<a.routes[0].legs[0].steps[i].path.length;q++) {
							paths.push(a.routes[0].legs[0].steps[i].path[q]);
							//alert(typeof a.routes[0].legs[0].steps[i].path[q]);
						}
					}
					//alert(paths.length);
					route = new google.maps.Polyline({
						path: paths,
						strokeColor: "#FF0000",
						strokeOpacity: 1.0,
						strokeWeight: 2
					});
					glob_route = route;
					route.setMap(map);
					//alert(0);
				}
			);
		}
	</script>
	
	<style>
		p	{
			font-size:0.8em;
		}
		
		#submit_suchen	{
			background-color:#83B81A;
			border:none;
		}
		
		.col-md-7	{
			left:0;
			top:80px;
			height:400px;
		}
	</style>
	
  </head>
<body>

<div class="container">
	<!--Header-->
	<?php include 'header.php'?>

	<!-- Hauptteil -->
	<div class="row">
		<div class="col-md-5">
			<h1>Fahrt suchen</h1><br>
			<p>Mit *gekennzeichnete Felder sind Pflichtfelder</p>
			<!-- Formular zum Suchen einer schon angelagten Fahrt, das Formular wird mit suchen.php verarbeitet -->
			<form action="suchen.php" method="post">
				<!-- Eingabefeld für die Startadresse -->
				<label for="start">von*:</label>
				<input type="text" class="form-control" id="pac-input1" name="start" placeholder="Start eingeben"  /><br>
				<!-- Eingabefeld für die Zieladresse -->
				<label for="ziel">nach*:</label>
				<input type="text" class="form-control" id="pac-input2" name="ziel" placeholder="Ziel eingeben"  />
				<br>
			
			
					
			
				<!-- Auswahlfeld für das Datum unterteilt in Tag, Monat und Jahr-->
				<label for="ziel">Datum*:</label></br>
				<!-- Auswahlfeld für den Tag -->
				<select size="1" name="tag" id="tag" >
					<option value="01" selected>01</option>
					<option value="02">02</option>
					<option value="03">03</option>
					<option value="04">04</option>
					<option value="05">05</option>
					<option value="06">06</option>
					<option value="07">07</option>
					<option value="08">08</option>
					<option value="09">09</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					<option value="13">13</option>
					<option value="14">14</option>
					<option value="15">15</option>
					<option value="16">16</option>
					<option value="17">17</option>
					<option value="18">18</option>
					<option value="19">19</option>
					<option value="20">20</option>
					<option value="21">21</option>
					<option value="22">22</option>
					<option value="23">23</option>
					<option value="24">24</option>
					<option value="25">25</option>
					<option value="26">26</option>
					<option value="27">27</option>
					<option value="28">28</option>
					<option value="29">29</option>
					<option value="30">30</option>
					<option value="31">31</option>
				</select>

				<!-- Auswahlfeld für den Monat -->
				<select size="1" name="monat" id="monat">
					<option value="01" selected>Januar</option>
					<option value="02">Februar</option>
					<option value="03">M&auml;rz</option>
					<option value="04">April</option>
					<option value="05">Mai</option>
					<option value="06">Juni</option>
					<option value="07">Juli</option>
					<option value="08">August</option>
					<option value="09">September</option>
					<option value="10">Oktober</option>
					<option value="11">November</option>
					<option value="12">Dezember</option>
				</select>
				
				<!-- Auswahlfeld für das Jahr -->
				<!-- das Jahr muss manuell ergänzt werden falls es über 2022 hinausgeht-->
			<select size="1" name="jahr" id="jahr">
					<option value="2014"selected>2014</option>
					<option value="2015"selected>2015</option>
					<option value="2016" >2016</option>
					<option value="2017">2017</option>
					<option value="2018">2018</option>
					<option value="2019">2019</option>
					<option value="2020">2020</option>
					<option value="2021">2021</option>
					<option value="2022">2022</option>
				</select> 

 
 	<?php date_default_timezone-set("Europe/Berlin");
		echo date("j.n.Y");
		echo "\n";
		?>

	 
				<br><br>
		
				<!--label for="uhrzeit">Uhrzeit*:</label>
				<br-->
				<!-- Auswahlfeld für die Stundenanzahl -->
				<!--select size="1" name="stunde" id="stunde" >
					<option value="x" selected>Stunde</option>
					<option value="00">00</option> 
					<option value="01">01</option>
					<option value="02">02</option>
					<option value="03">03</option>
					<option value="04">04</option>
					<option value="05">05</option>
					<option value="06">06</option>
					<option value="07">07</option>
					<option value="08">08</option>
					<option value="09">09</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					<option value="13">13</option>
					<option value="14">14</option>
					<option value="15">15</option>
					<option value="16">16</option>
					<option value="17">17</option>
					<option value="18">18</option>
					<option value="19">19</option>
					<option value="20">20</option>
					<option value="21">21</option>
					<option value="22">22</option>
					<option value="23">23</option>              
				</select-->
				
				<!-- Auswahlfeld für die Minutenanzahl -->
				<!--select size="1" name="minute" id="minute">
					<option value="xx" selected>Minute</option>
					<option value="00">00</option>
					<option value="15">15</option>
					<option value="30">30</option>
					<option value="45">45</option>
				</select-->
				
				</br></br>
				<!-- Button zum absenden -->
				<input type="submit" value="Fahrt suchen" id="submit_suchen" class="btn btn-lg btn-primary" />
				
				<br>
			
			</form>
		</div> <!-- Ende .col-md-5 -->
		
		<!-- fügt eine Googlemapskarte auf der Seite ein, die auf Responsive Design (class=img-responsive) eingestellt ist-->	
		<!--Programmcode wurde von Google übermittelt bei der Freischaltung der API -->
		<div class="col-md-7" class="img-responsive" >
			<!--macht einen blauen Balken mit Radio Buttons, die aber nicht gebraucht werden -->
			<!--<div id="type-selector" class="controls">
				<input type="radio" name="type" id="changetype-all" checked="checked">
				<label for="changetype-all">All</label>
	
				<input type="radio" name="type" id="changetype-establishment">
				<label for="changetype-establishment">Establishments</label>

				<input type="radio" name="type" id="changetype-address">
				<label for="changetype-address">Addresses</label>
	
				<input type="radio" name="type" id="changetype-geocode">
				<label for="changetype-geocode">Geocodes</label>
			</div> -->
	
			<div id="map-canvas"></div><!--Karte-->
		</div><!-- Ende .col-md-7 -->
	</div><!--Ende .row-->


	<!--Footer-->
	<?php include 'footer.php'?>
	
</div><!--Ende container-->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	
  </body>
</html>
