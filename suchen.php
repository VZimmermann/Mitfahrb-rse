<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>HFU Mitfahrgelegenheit - Fahrt suchen</title>
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
	
	<style type="text/css">
		#merken	{
			border:none;
			background-color:white;
		}
		#anfragen	{
			border:none;
			background-color:white;
		}

	</style>
	
  </head>
<body>

<div class="container">
	<!--Header-->
	<?php include 'header.php'?>

	<!--Hauptteil-->
	<div class="row">
		<div class="col-md-12">
			<?php
				//Variablen, die aus dem Formular von fahrt_suchen.php übernommen werden
				$start = $_POST['start']; 
				$ziel = $_POST['ziel'];
				$tag = $_POST['tag'];
				$monat = $_POST['monat'];
				$jahr = $_POST['jahr'];
				//$stunde = $_POST['stunde'];
				//$minute = $_POST['minute'];
				
  
				//Verbindung mit der Datenbank mitfahrboerse
				$db = mysqli_connect('localhost', 'root', "", 'mitfahrboerse')
				//Ausgabe wenn die Datenbankverbindung fehlgeschlagen ist
				or die('Fehler beim Verbinden mit MySQL-Server.');
				
				//Datenbankabfrage, die nach Einträgen sucht bei der die Startadresse, die Zieladresse und das Datum die sind, die man in die Suche eingibt
				//das Ergebnis wir an mysqli_fetch_array gesendet
				$sql = "SELECT * FROM fahrt WHERE Startadresse='$start' and Zieladresse = '$ziel' and Tag =$tag and Monat =$monat and Jahr = $jahr ;";
				//echo $sql;
				//Ausführung der Abfrage 
				$ergebnis = mysqli_query($db, $sql)
				//Ausgabe wenn es einen Fehler bei der Datenbankabfrage gibt
				or die('Fehler bei Datenbankabfrage.');

				//Ausgegeben der Daten in eine Tabelle, die durch mysqli_fetch_array zu einem Array zusammengefasst wurden
				echo "<table>";
				echo "<tr>";
				echo "<br>";
				echo "<th>Startadresse</th>";
				echo "<th>Zieladresse</th>";
				echo "<th>Datum</th>";
				echo "<th>&nbsp;</th>";
				echo "<th>&nbsp;</th>";
				echo "</tr>";
					//in $zeile wird das Array gespeichert mit den ausgelesenen Daten aus $sql
					while ($zeile = mysqli_fetch_array( $ergebnis, MYSQL_ASSOC)) {
				echo "<tr>";
					echo "<td>". $zeile['Startadresse'] . "&nbsp;&nbsp;&nbsp;</td>";//holt aus der Datenbank den Datensatz der Spalte "Startadresse"
					echo "<td>". $zeile['Zieladresse'] . "&nbsp;&nbsp;&nbsp;</td>";//holt aus der Datenbank den Datensatz der Spalte "Zieladresse"
					echo "<td>". $zeile['Tag']. ".". $zeile['Monat'] . "." .$zeile['Jahr'] ."&nbsp;&nbsp;&nbsp;</td>";//holt aus der Datenbank den Datensatz der Spalten "Tag" ,"Monat", "Jahr" und fügt sie im Format t.m.j zusammen
					//echo "<td>". $zeile['stunde'] .":" . $zeile['minute']. "</td>";//holt aus der Datenbank den Datensatz der Spalten "stunde" ,"minute" und fügt sie im Format h:m zusammen
					echo "<td><button id='merken' value='merken' > <span class='glyphicon glyphicon-pushpin' aria-hidden='true'>Merken</span></button>&nbsp;</td>";
					echo "<td ><button id='anfragen' value='anfragen' > <span class='glyphicon glyphicon-question-sign' aria-hidden='true'>Anfragen</span></button></td>";
				
				echo "</tr>";
				
				
   
			}
			echo "</table>";
		?>		
	</div><!--Ende col-->
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
