<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>HFU Mitfahrgelegenheit - Fahrt anbieten</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="expires" content="0">
	<meta http-equiv="pragma" content="no-cache">
	<meta http-equiv="cache-control" content="no-cache">
    <meta name="author" content="Julia Klimesch, Lisa Wojtynek,Vanessa Zimmermann" />
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
	<meta name="keywords" content="HFU, Hochschule Furtwangen, Mitfahrgelegenheit, Furtwangen, Hochschule">
	<meta name="description" content="Auf dieser Seite finden Sie die HFU Mitfahrgelegenheit. Konzipiert nur f&uuml;r Studenten und Angestellte der Hochschule Furtwangen.">
	  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="mitfahrgelegenheit.css" />

  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<style>
	.falsch{
		color:red;
		font-size:1.5em;
	}
	
	.richtig	{
		color:green;
		font-size:1.5em;
	}
	
	#zurueck{
		background-color:#83B81A;
		border:none;
	}
	
	</style>
  </head>
<body>

<div class="container">
 <?php include 'header.php'?>
	
	<!--Header-->
<div class="row">
	<div class="col-md-12">
<?php
	//Variablen, die aus dem Formular fahrt_anbieten.php übertragen werden
  $start = $_POST['start']; 
  $zwischenziel1 = $_POST['zwischenziel1'];
  $zwischenziel2 = $_POST['zwischenziel2'];
  $zwischenziel3 = $_POST['zwischenziel3'];
  $ziel = $_POST['ziel'];
  $monat = $_POST['monat'];
  $jahr = $_POST['jahr'];
  $tag = $_POST['tag'];
  $minute=$_POST['minute'];
  $stunde=$_POST['stunde'];
  $preis = $_POST['preis'];
	$kennzeichen = $_POST['kennzeichen'];
	$person_id = $_POST['person_id'];
	$fahrt_id = $_POST['fahrt_id'];


 
	//Verbindung mit der Datenbank
  $db = mysqli_connect('localhost', 'root', "", 'mitfahrboerse') 
  	//Ausgabe wenn die Datenbankverbindung fehlgeschlagen ist
  or die('Fehler beim Verbinden mit MySQL-Server.');
 
  mysqli_set_charset($db, "utf8");//setzt den Standardzeichensatz

  // Fahrt wird in die Datenbank eingetragen mit oben definierten Variablen
  $sql = "INSERT INTO fahrt " .
    "VALUES ('$fahrt_id', '$person_id','$start', '$ziel', '$kennzeichen',".
	"'$zwischenziel1', '$zwischenziel2', '$zwischenziel3',".
	"'$preis', '$tag', '$monat','$jahr','$stunde' ,'$minute');";
  //echo $sql;
  echo "<br>";

  //wenn im Eingabefeld für Startadresse nichts drin steht wird dem Benutzer angezeigt, dass er noch eine Startadresse eingeben muss
  if ($start==null)	{
	 echo "<p class='falsch' >Bitte geben Sie eine Startadresse ein</p>";
	 echo "<button onclick='history.back()' id='zurueck' name='zurueck' class='btn btn-lg btn-primary' >&auml;ndern</button>";
  }
  //wenn im Eingabefeld für Zieladresse nichts drin steht wird dem Benutzer angezeigt, dass er noch eine Zieladresse eingeben muss
  if($ziel==null) {
	echo "<p class='falsch'>Bitte geben Sie eine Zieladresse ein</p>";
	//Button zur Seite zurück
	echo "<button onclick='history.back()' id='zurueck' name='zurueck' class='btn btn-lg btn-primary' >&auml;ndern</button>";
  }
  //wenn alles angegeben wurde wird die Abfrage gesendet und in der Datenbank gespeichert
 if($ziel!=null && $start!=null && $tag!=null && $monat!=null && $jahr!=null){
   
  $ergebnis = mysqli_query($db, $sql)//sendet die Abfrage
  or die('Fehler bei Datenbankabfrage.');//wenn ein Fehler bei der Datenbankabfrage gebe eine Meldung aus
	
	//wenn die Abfrage erfolgreich gespeichert wurde gib eine Meldung und einen zurück-Button aus
  if ($ergebnis!=null){
	echo "<p class='richtig'>Daten wurden erfolgreich gespeichert</p>";
	echo "<button onclick='history.back()' id='zurueck' name='zurueck' class='btn btn-lg btn-primary'>zur&uuml;ck</button>";
  }
}


?>		
  		
	</div><!--Ende .col-md-12-->
</div><!--Ende row-->

	<!--Footer-->
	<?php include 'footer.php'?>

</div><!--Ende .container -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
