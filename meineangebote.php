<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>HFU Mitfahrgelegenheit - meine Angebote</title>
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
	.col-md-4	{
		top:50px;
		left:30px;
		width:30%";
	}
	
	.col-md-8	{
		top:45px;
		left:20px;
	}
	
	</style>
	
  </head>
<body>

<div class="container">
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
		
		<div class="col-md-7" >
			
			<hr>
			<button class="bearbeiten"> <span class='glyphicon glyphicon-pencil' aria-hidden='true'>Bearbeiten</span></button>
				<!--oberer Teil zu den persönlichen Daten und zu Daten des Autos-->
				<?php
				error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING ^ E_DEPRECATED);//falls es Fehlermeldungen geben sollte, werden die nicht auf der Seite angezeigt
				
				$connect=mysql_connect ("localhost","root","") or die (mysql_error());
				mysql_select_db ("mitfahrboerse") or die (mysql_error());
				$username = $_POST['username'];//mit dieser Variablen soll ausgelesen werden, wer gerade angemeldet ist
				
				$sqlname = mysql_query("SELECT Name, Vorname from person where username='vanessa';");//hier muss irgendwie noch die Variable $username rein
				$sqlfahrzeug = mysql_query("SELECT Automodell, Autofarbe, Kennzeichen from fahrzeug where PersonID= (SELECT PersonID from person where username='vanessa');");//hier muss irgendwie noch die Variable $username rein
				$rowname = mysql_num_rows($sqlname);
				$rowfahrzeug = mysql_num_rows($sqlfahrzeug);
				if ($rowname!=0 && $rowfahrzeug!=0)	{
					//Tabelle für den Namen
					echo "<table>";
						echo "<tr>";
							echo "<td>&nbsp;</td>";
						echo "</tr>";
					while ($rows = mysql_fetch_assoc($sqlname))	{
						$vorname = $rows['Vorname'];
						$nachname = $rows['Name'];
						echo "<tr>";
							echo "<td><b>".$vorname=$rows['Vorname']." ".$nachname=$rows['Name']."</b></td>";	
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
						
					while ($rows = mysql_fetch_assoc($sqlfahrzeug))	{
						$automodell = $rows['Automodell'];
						$autofarbe = $rows['Autofarbe'];
						$kennzeichen = $rows['Kennzeichen'];
						echo "<table>";
							echo "<tr>";
								echo "<td></td>";
								echo "<td>".$automodell=$rows['Automodell']."&nbsp;"."</td>";
							echo "</tr>";
						echo "</table>";
						echo "<table>";
							echo "<tr>";
								echo "<td>".$autofarbe=$rows['Autofarbe']."&nbsp;"."</td>";
							echo "</tr>";
						echo "</table>";
						echo "<table>";
							echo "<tr>";
								echo "<td>".$kennzeichen=$rows['Kennzeichen']."&nbsp;"."</td>";
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
	<br>
		<div class="col-md-12">
			<?php
				$connect=mysql_connect ("localhost","root","") or die (mysql_error());
				mysql_select_db ("mitfahrboerse") or die (mysql_error());
				
				$sqlangebot = mysql_query ("SELECT * from fahrt where PersonID=(Select PersonID from person where username='vanessa');");
				
				$row = mysql_num_rows($sqlname);
				
				if ($row!=0)	{
					echo "<table>";
						echo "<tr>";
							echo "<th>Startadresse: "."&nbsp;"."&nbsp;"."&nbsp;"."</th>";
							echo "<th>Zwischenziel 1: "."&nbsp;"."&nbsp;"."&nbsp;"."</th>";
							echo "<th>Zwischenziel 2: "."&nbsp;"."&nbsp;"."&nbsp;"."</th>";
							echo "<th>Zwischenziel 3:"."&nbsp;"."&nbsp;"."&nbsp;"."</th>";
							echo "<th>Zieladresse: "."&nbsp;"."&nbsp;"."&nbsp;"."</th>";
							echo "<th>Datum: "."&nbsp;"."&nbsp;"."&nbsp;"."</th>";
							echo "<th>Uhrzeit: "."&nbsp;"."&nbsp;"."&nbsp;"."</th>";
						echo "</tr>";
					while ($rows = mysql_fetch_assoc($sqlangebot))	{
						$startadresse = $rows['Startadresse'];
						$zieladresse = $rows['Zieladresse'];
						$zwischenziel1 = $rows['Zwischenziel1'];
						$zwischenziel2 = $rows['Zwischenziel2'];
						$zwischenziel3 = $rows['Zwischenziel3'];
						$tag = $rows['Tag'];
						$monat = $rows['Monat'];
						$jahr = $rows['Jahr'];
						$stunde = $rows['Stunde'];
						$minute = $rows['Minute'];
						//wenn kein Zwischenziel angegeben ist
						if ($zwischenziel1 == null && $zwischenziel2== null && $zwischenziel3==null )	{
							echo "<tr>";
								echo "<td>".$startadresse=$rows['Startadresse']."</td>";
								echo "<td>".$zieladresse = $rows['Zieladresse']."</td>";	
								echo "<td>".$zwischenziel1 = "-"."</td>";
								echo "<td>".$zwischenziel2 = "-"."</td>";
								echo "<td>".$zwischenziel3 = "-"."</td>";
								echo "<td>".$tag = $rows['Tag'].".".$monat = $rows['Monat'].".".$jahr = $rows['Jahr']."</td>";
								echo "<td>".$stunde = $rows['Stunde'].":".$minute = $rows['Minute']."</td>";
							echo "</tr>";
						}
						
						/*
						//wenn ein Zwischenziel angegeben ist-->drei Möglichkeiten
						if ($zwischenziel1 != null && $zwischenziel2== null && $zwischenziel3==null )	{
							echo "<tr>";
								echo "<td>".$startadresse=$rows['Startadresse']."</td>";
								echo "<td>".$zieladresse = $rows['Zieladresse']."</td>";	
								echo "<td>".$zwischenziel1 = $rows['Zwischenziel1']."</td>";
								echo "<td>".$zwischenziel2 = "-"."</td>";
								echo "<td>".$zwischenziel3 = "-"."</td>";
								echo "<td>".$tag = $rows['Tag'].".".$monat = $rows['Monat'].".".$jahr = $rows['Jahr']."</td>";
								echo "<td>".$stunde = $rows['Stunde'].":".$minute = $rows['Minute']."</td>";
							echo "</tr>";
						}
						if ($zwischenziel1 == null && $zwischenziel2 != null && $zwischenziel3 ==null )	{
							echo "<tr>";
								echo "<td>".$startadresse=$rows['Startadresse']."</td>";
								echo "<td>".$zieladresse = $rows['Zieladresse']."</td>";	
								echo "<td>".$zwischenziel1 = "-"."</td>";
								echo "<td>".$zwischenziel2 = $rows['Zwischenziel1']."</td>";
								echo "<td>".$zwischenziel3 = "-"."</td>";
								echo "<td>".$tag = $rows['Tag'].".".$monat = $rows['Monat'].".".$jahr = $rows['Jahr']."</td>";
								echo "<td>".$stunde = $rows['Stunde'].":".$minute = $rows['Minute']."</td>";
							echo "</tr>";
						}
						if ($zwischenziel1 == null && $zwischenziel2 == null && $zwischenziel3 !=null )	{
							echo "<tr>";
								echo "<td>".$startadresse=$rows['Startadresse']."</td>";
								echo "<td>".$zieladresse = $rows['Zieladresse']."</td>";	
								echo "<td>".$zwischenziel1 = "-"."</td>";
								echo "<td>".$zwischenziel2 = "-"."</td>";
								echo "<td>".$zwischenziel3 = $rows['Zwischenziel1']."</td>";
								echo "<td>".$tag = $rows['Tag'].".".$monat = $rows['Monat'].".".$jahr = $rows['Jahr']."</td>";
								echo "<td>".$stunde = $rows['Stunde'].":".$minute = $rows['Minute']."</td>";
							echo "</tr>";
						}
						
						//wenn zwei Zwischenziele angegeben sind
						if ($zwischenziel1 != null && $zwischenziel2 != null && $zwischenziel3 ==null )	{
							echo "<tr>";
								echo "<td>".$startadresse=$rows['Startadresse']."</td>";
								echo "<td>".$zieladresse = $rows['Zieladresse']."</td>";	
								echo "<td>".$zwischenziel1 = "-"."</td>";
								echo "<td>".$zwischenziel2 = "-"."</td>";
								echo "<td>".$zwischenziel3 = $rows['Zwischenziel1']."</td>";
								echo "<td>".$tag = $rows['Tag']
						if ($zwischenziel1 == null && $zwischenziel2 != null && $zwischenziel3 !=null )	{
							echo "<tr>";
								echo "<td>".$startadresse=$rows['Startadresse']."</td>";
								echo "<td>".$zieladresse = $rows['Zieladresse']."</td>";	
								echo "<td>".$zwischenziel1 = "-"."</td>";
								echo "<td>".$zwischenziel2 = "-"."</td>";
								echo "<td>".$zwischenziel3 = $rows['Zwischenziel1']."</td>";
								echo "<td>".$tag = $rows['Tag'].".".$monat = $rows['Monat'].".".$jahr = $rows['Jahr']."</td>";
								echo "<td>".$stunde = $rows['Stunde'].":".$minute = $rows['Minute']."</td>";
							echo "</tr>";
						}
						*/
						
						//wenn es drei Zwischenziele gibt
						else	{
							echo "<tr>";
							echo "<td>".$startadresse=$rows['Startadresse']."</td>";
							echo "<td>".$zieladresse = $rows['Zieladresse']."</td>";	
							echo "<td>".$zwischenziel1 = $rows['Zwischenziel1']."</td>";
							echo "<td>".$zwischenziel2 = $rows['Zwischenziel2']."</td>";
							echo "<td>".$zwischenziel3 = $rows['Zwischenziel3']."</td>";
							echo "<td>".$tag = $rows['Tag'].".".$monat = $rows['Monat'].".".$jahr = $rows['Jahr']."</td>";
							echo "<td>".$stunde = $rows['Stunde'].":".$minute = $rows['Minute']."</td>";
						echo "</tr>";
						}
					}//Ende while
					echo "</table>";
				} //Ende if
				else	{
					echo "Kein Datensatz vorhanden";
				}
			?>
		</div>
	
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
