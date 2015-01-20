<!DOCTYPE html>

<html lang="en">
  <head>
	
	 
    <meta charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>HFU Mitfahrboerse</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="expires" content="0">
	<meta http-equiv="pragma" content="no-cache">
	<meta http-equiv="cache-control" content="no-cache">
    <meta name="author" content="Julia Klimesch, Lisa Wojtynek,Vanessa Zimmermann" />
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9" />
	<meta name="keywords" content="HFU, Hochschule Furtwangen, Mitfahrgelegenheit, Furtwangen, Hochschule">
	<meta name="description" content="Auf dieser Seite finden Sie die HFU Mitfahrgelegenheit. Konzipiert nur f&uuml;r Studenten und Angestellte der Hochschule Furtwangen.">

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="mitfahrgelegenheit.css" />
	<link href="carousel.css" rel="stylesheet">
 
 <!--Stylesheet f??ie Buttons im Slider-->
	<style rel="stylesheet">
	
	.img-responsive  {
		max-width: 100%;
		height: auto;
	}
	
		.miniminibutton {
			background-color:#83B81A;
			color:#FFFFFF;
			border:none; 
			margin:0px;
			font-size:12px;
			padding:5px;
			border-radius:15px 15px 15px 15px;
		}
		
		.miniminibutton:hover {
			color:#FFFFFF;
			background-color:#789e2c;
			text-decoration:none;
		}
		
		.minibutton {
			background-color:#83B81A;
			color:#FFFFFF;
			border:none; 
			margin:0px;
			font-size:18px;
			padding:10px;
			border-radius:15px 15px 15px 15px;
			margin:10px;
		}
		
		.minibutton:hover {
			color:#FFFFFF;
			background-color:#789e2c;
			text-decoration:none;
		}
		.mediumbutton {
			background-color:#83B81A;
			color:#FFFFFF;
			border:none; 
			margin:0px;
			font-size:25px;
			padding:15px;
			border-radius:25px 25px 25px 25px;
			margin:25px;
		}
		
		.medibutton:hover {
			color:#FFFFFF;
			background-color:#789e2c;
			text-decoration:none;
		}
		
		.largebutton {
			background-color:#83B81A;
			color:#FFFFFF;
			border:none; 
			margin:0px;
			font-size:30px;
			padding:20px;
			border-radius:25px 25px 25px 25px;
			margin:35px;
		}
		
		.largebutton:hover {
			color:#FFFFFF;
			background-color:#789e2c;
			text-decoration:none;
		}
		
	</style>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	

  </head>
<body>

<div class="container">
	<?php  include 'header.php'; ?>

	<!--
		unter dem Header ist ein Slider eingebaut, der zwischen drei Bildern wechselt
		Programmcode von Bootstrap vordefiniert unter http://getbootstrap.com/2.3.2/examples/carousel.html
	-->

	<div class="row">
		<div id="myCarousel" class="carousel slide" data-ride="carousel" >
		 <!-- ol listet die Anzahl der durchlaufenden Bilder auf und beschreibt, welches das erste ist (class=active)-->
		<ol class="carousel-indicators" >
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li> 
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
		</ol>
		
		<!--das, was zu den Bildern als Text hinzugef??werden soll-->
		<div class="carousel-inner" role="listbox">
		<!--erstes Bild im Slider-->
			<div class="item active">
				<img src="Home_Bild1.png" alt="First slide">
				<!--<div class="container">-->
				<div class="carousel-caption">
					<!--<p class="hidden-xs">-->
					
					<!--f??ede Gr??des Endger?s gibt es eine andere Gr??der Buttons, die im CSS oben in den Stylesheets beschrieben sind-->
					<!--da es die Startseite ist f??icht angemeldete Besucher wird auch auf keine weitere Seite verlinkt-->
					<p class="visible-lg hidden-md">
						<a href="fahrt_anbieten.php" class="largebutton">Fahrt anbieten</a>
						<a href="fahrt_suchen.php" class="largebutton">Fahrt suchen</a>				
					</p>
					
					<p class="visible-md hidden-lg hidden-sm hidden-xs">
						<a href="fahrt_anbieten.php" class="mediumbutton">Fahrt anbieten</a>
						<a href="fahrt_suchen.php" class="mediumbutton">Fahrt suchen</a>
					</p>
					
					<p class="visible-sm hidden-xs hidden-lg hidden-md">
						<a href="fahrt_anbieten.php" class="minibutton">Fahrt anbieten</a>
						<a href="fahrt_suchen.php" class="minibutton">Fahrt suchen</a>
					</p>
					
					<p class="visible-xs hidden-lg hidden-md hidden-sm">
						<a href="fahrt_anbieten.php" class="miniminibutton">Fahrt anbieten</a>
						<a href="fahrt_suchen.php" class="miniminibutton">Fahrt suchen</a>
					</p>
				</div><!--Ende .carousel-caption-->
			<!--</div>-->
        </div><!--Ende .item active-->
		
		<!--zweites Bild im Slider-->
        <div class="item">
			<img src="Home_Bild2.png"  alt="Second slide">
			<div class="container">
				<div class="carousel-caption">
					
					<!--f??ede Gr??des Endger?s gibt es eine andere Gr??der Buttons, die im CSS oben in den Stylesheets beschrieben sind-->
					<!--da es die Startseite ist f??icht angemeldete Besucher wird auch auf keine weitere Seite verlinkt-->
					<p class="visible-lg hidden-md">
						<a href="fahrt_anbieten.php" class="largebutton">Fahrt anbieten</a>
						<a href="fahrt_suchen.php" class="largebutton">Fahrt suchen</a>
					</p>
					
					<p class="visible-md hidden-lg hidden-sm hidden-xs">
						<a href="fahrt_anbieten.php" class="mediumbutton">Fahrt anbieten</a>
						<a href="fahrt_suchen.php" class="mediumbutton">Fahrt suchen</a>
					</p>
					
					<p class="visible-sm hidden-xs hidden-lg hidden-md">
						<a href="fahrt_anbieten.php" class="minibutton">Fahrt anbieten</a>
						<a href="fahrt_suchen.php" class="minibutton">Fahrt suchen</a>
					</p>
					
					<p class="visible-xs hidden-lg hidden-md hidden-sm">
						<a href="fahrt_anbieten.php" class="miniminibutton">Fahrt anbieten</a>
						<a href="fahrt_suchen.php" class="miniminibutton">Fahrt suchen</a>
					</p>					
				</div><!-- Ende .carousel-caption -->
			</div><!-- Ende .container-->
		</div><!-- Ende .item-->
		
		<!--drittes Bild im Slider-->
		<div class="item">
			<img src="Home_Bild3.png"  alt="Third slide">
				<div class="container">
					<div class="carousel-caption">
				
						<!--f??ede Gr??des Endger?s gibt es eine andere Gr??der Buttons, die im CSS oben in den Stylesheets beschrieben sind-->
						<!--da es die Startseite ist f??icht angemeldete Besucher wird auch auf keine weitere Seite verlinkt-->
						<p class="visible-lg hidden-md">
							<a href="fahrt_anbieten.php" class="largebutton">Fahrt anbieten</a>
							<a href="fahrt_suchen.php" class="largebutton">Fahrt suchen</a>
						</p>
					
						<p class="visible-md hidden-lg">
							<a href="fahrt_anbieten.php" class="mediumbutton">Fahrt anbieten</a>
							<a href="fahrt_suchen.php" class="mediumbutton">Fahrt suchen</a>
						</p>
								
						<p class="visible-sm hidden-xs hidden-lg hidden-md">
							<a href="fahrt_anbieten.php" class="minibutton">Fahrt anbieten</a>
							<a href="fahrt_suchen.php" class="minibutton">Fahrt suchen</a>
						</p>
					
						<p class="visible-xs hidden-lg hidden-md hidden-sm">
							<a href="fahrt_anbieten.php" class="miniminibutton">Fahrt anbieten</a>
							<a href="fahrt_suchen.php" class="miniminibutton">Fahrt suchen</a>
						</p>
				</div><!--Ende .carousel-caption-->
			</div><!--Ende .container-->
        </div><!--Ende .item-->
        
      </div><!--Ende .carousel-inner-->
	  
			<!--Weiter-Pfeile auf der rechten und linken Seite der Slider-->
			<!--Bootstrap stellt eigene kleine Icons zur Verf??g, die man verwenden kann (Glyphicons), zu finden unter ttp://getbootstrap.com/components/-->
			<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div><!-- /.carousel -->
	</div><!--Ende row-->

	<!--Hauptteil-->
	<div class="row">
		<!--Programmcode aus dem Quellcode der Startseite von Bootstrap unter http://getbootstrap.com/-->
		<!--weitere Informationen zum Gridsystem unter http://getbootstrap.com/css/#grid-->
		<div class="container marketing">

			<!-- Drei Spalten unterhalb des Karussels -->
			<div class="row">
				<div class="col-md-4" >
					<h2><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> So gehts</h2>
					<p><img src="so_gehts.png" class="img-responsive"  border="0" alt="So gehts"></p>
				</div><!-- Ende col-md-4 -->
				<div class="col-md-4" >
					<h2><span class="glyphicon glyphicon-euro" aria-hidden="true"></span> Preis</h2>
					<p><img src="preis.png" class="img-responsive"  border="0" alt="Preis"></p>
				</div><!-- Endecol-md-4 -->
				<div class="col-md-4" >
					<h2><span class="glyphicon glyphicon-lock" aria-hidden="true"></span> Sichere Sache</h2>
					<p><img src="sichere_Sache.png" class="img-responsive"  border="0" alt="Sicherheit"></p>
				</div><!-- Ende col-md-4 -->
			</div><!-- Ende row -->

		</div>	<!--Ende .container arketing-->
	</div><!--Ende .row-->

	<?php include 'footer.php'; ?>

</div><!--Ende .container -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
