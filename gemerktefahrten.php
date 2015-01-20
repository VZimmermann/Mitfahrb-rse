<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>HFU Mitfahrgelegenheit - meine gemerkte Fahrten</title>
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
	<!--im Hauptteil das Profilbild-->

	<!-- im Hauptteil werden hier die Personendaten eingefügt -->
	#datenabfrage_gemerkt	{
		top:45px;
		left:20px;
	}
	
	</style>
	
  </head>
<body>

<div class="container">
	<!-- Header -->
	<?php include 'header.php'?>
	
	<!--Hauptteil-->
	<div class="row">
		<div  class="col-md-5" >
			<!--<form action="input_file.htm" method="post" enctype="multipart/form-data">
				<input name="Datei" type="file" size="50" maxlength="100000" accept="text/*">
			</form><img src="profil.png"  class="img-responsive" alt="Responsive image"> -->
		
			<form method="POST" enctype="multipart/form-data" action="upload.php">
				<p>
					<input type="file" name="file" size="40">
					<input type="submit" value="Hochladen" name="Hochladen">
				</p>
			</form>
		
		</div>
		<div id ="datenabfrage_gemerkt" class="col-md-7" >
			<hr>
			<button class="bearbeiten" > <span class='glyphicon glyphicon-pencil' aria-hidden='true'>Bearbeiten</span></button>
			<!--obere Teil mit den persönlichen Daten und Daten zum Auto-->
			<?php
				error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING ^ E_DEPRECATED);//falls es Fehlermeldungen geben sollte, werden die nicht auf der Seite angezeigt
			
				//Datenbankverbindung herstellen
				$connect=mysql_connect ("localhost","root","") or die (mysql_error());
				mysql_select_db ("mitfahrboerse") or die (mysql_error());
				$username = $_POST['username'];//mit dieser Variablen soll ausgelesen werden, wer gerade angemeldet ist
				
				//in der Variablen wird der Name der Person gespeichert, die angemeldet ist   
				$sqlname = mysql_query("SELECT Name, Vorname from person where username='vanessa';");//hier muss irgendwie noch die Variable $username rein
				// in der Variablen wird eine Datenbankabfrage gespeichert, die die Daten des Autos ausliest, das der angemeldeten Person gehört
				$sqlfahrzeug = mysql_query("SELECT Automodell, Autofarbe, Kennzeichen from fahrzeug where PersonID= (SELECT PersonID from person where username='vanessa');"); //hier muss irgendwie noch die Variable $username rein
				//speichert die Anzahl der Datensätze in einer Variablen
				$rowname = mysql_num_rows($sqlname);
				$rowfahrzeug = mysql_num_rows($sqlfahrzeug);
				
				//wenn Datensätze vorhanden sind werden diese in eine Tabelle eingefügt
				if ($rowname!=0 && $rowfahrzeug!=0)	{
					//Tabelle für den Namen
					echo "<table>";
					echo "<tr>";
					echo "<td>&nbsp;</td>";
					echo "</tr>";
					// in $rows wird das Ergebnis der Datenabfrage zur Person als Array gespeichert
					while ($rows = mysql_fetch_assoc($sqlname))	{
						$vorname = $rows['Vorname'];//holt den Vornamen aus der Datenbank und speichert ihn in einer Variablen
						$nachname = $rows['Name'];//holt den Namen aus der Datenbank und speichert ihn in einer Variablen
						echo "<tr>";
						echo "<td><b>".$vorname=$rows['Vorname']." ".$nachname=$rows['Name']."</b></td>";	//fügt den Inhalt der Spalten Vorname und Nachname zusammen
						echo "</tr>";
					} 
					echo "</table>";
				
					//Tabelle für die Fahrzeugdaten
					echo "<table>";
					echo "<tr>";
					echo "<td></td>"."<br>";
					echo "<td>Modell:"."&nbsp;"."</td>";
					echo "</tr>";
					echo "</table>";
					echo "<table>";
					echo "<tr>";
					echo "<td>Farbe:"."&nbsp;"."</td>";
					echo "</tr>";
					echo "</table>";
					echo "<table>";
					echo "<tr>";
					echo "<td>Kennzeichen:"."&nbsp;"."</td>";
					echo "</tr>";
					echo "</table>";
					
					//in $rows wird das Ergebnis der Datenabfrage zum Fahrzeug als Array gespeichert
					while ($rows = mysql_fetch_assoc($sqlfahrzeug))	{
						$automodell = $rows['Automodell']; //speichert in $automodell den Inhalt der Datenbankspalte Automodell
						$autofarbe = $rows['Autofarbe'];//speichert in $autofarbe den Inhalt der Datenbankspalte Autofarbe
						$kennzeichen = $rows['Kennzeichen'];//speichert in $kennzeichen den Inhalt der Datenbankspalte Kennzeichen
						echo "<table>";
						echo "<tr>";
						echo "<td></td>";
						echo "<td>".$automodell=$rows['Automodell']."&nbsp;"."</td>";//fügt den Inhalt der Spalte Automodell in die Tabelle ein
						echo "</tr>";
						echo "</table>";
						echo "<table>";
						echo "<tr>";
						echo "<td>".$autofarbe=$rows['Autofarbe']."&nbsp;"."</td>";//fügt den Inhalt der Spalte Autofarbe in die Tabelle ein
						echo "</tr>";
						echo "</table>";
						echo "<table>";
						echo "<tr>";
						echo "<td>".$kennzeichen=$rows['Kennzeichen']."&nbsp;"."</td>";//fügt den Inhalt der Spalte Kennzeichen in die Tabelle ein
						echo "</tr>";
						echo "</table>";
					}	//Ende while Bedingung
				}//Ende if-Bedingung
			?>
			
			<hr>
		</div>
	</div>
	
	<div class="row">	<br><br><br>
		
		<?php 
		//Links zu Unterseiten
			$welcome =" &nbsp;&nbsp;&nbsp;<a href='profil.php?id=meineangebote'>Anbebote</a> | <a href='profil.php?id=meineanfragen'>Anfragen</a> | <a href='profil.php?id=gemerktefahrten'>gemerkte Fahrten</a><br/><br />";
			echo $welcome;
		?>
		
	
	</div><!--Ende row-->


	<!--Footer-->
	<?php include 'footer.php'?>

</div><!--Ende Container div-->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
