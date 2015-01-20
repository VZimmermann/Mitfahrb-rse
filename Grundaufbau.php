<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>HFU Mitfahrgelegenheit</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="expires" content="0">
	<meta http-equiv="pragma" content="no-cache">
	<meta http-equiv="cache-control" content="no-cache">
    <meta name="author" content="Julia Klimesch, Lisa Wojtynek, Vanessa Zimmermann" />
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
  </head>
<body>

<!--
1.Bootstrap hat ein Spaltensystem, damit sich die Seite auf kleineren Endgeräten anpasst. Eine Seite setzt sich in der Breite aus 12 Spalten zusammen
2.um den Aufbau der Seite richtig zu halten steht im body ein <div class="container">
3.in dieser class stehen dann nur noch <div class="row">
4.und in dieser class stehen dann die einzelnen Spalten z. B. <div class="col-md-4" >
Dieser Aufbau ist notwendig um zu gewährleisten, dass beim kleiner machen der Seite sich die Spalten richtig verschieben
!!!!!!!!Weitere Beschreibungen sind auf http://getbootstrap.com/css/#grid !!!!!!!!
-->

<div class="container">
	<!--Header-->
	<?php include 'header.php'?>

	<!--Hauptteil-->
	<div class="row">
		<!--hier steht dann der Text drin-->
	</div>

	<!--Footer-->
	<?php include 'footer.php'?>

</div><!--Ende Container div-->

<!--
der folgende Teil ist notwendig und ist Teil des Basic Templates von bootstrap 
http://getbootstrap.com/getting-started/#template
-->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
