Enter file con<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>HFU Mitfahrgelegenheit - Meine Nachrichten</title>
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
  </head>
<body>

<div class="container">

<!-- Header -->
<?php include 'header.php'?>
<br>
<?php
	//session_start();
	//fügt Links hinzu; diese müssen in den Unterseiten compose, inbox, outbox, read sein und nicht unter nachrichten.php stehen, da sonst das css verworfen wird
	$welcome =" <a href='messages.php?id=compose'>Neue Nachricht schreiben</a> | <a href='messages.php?id=inbox'>Posteingang</a> | <a href='messages.php?id=outbox'>Postausgang</a><br/><br />";
	echo $welcome;
?>

<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING ^ E_DEPRECATED);//alle Fehlermeldungen die auftreten werden nicht auf der Webseite angezeigt, der Benutzer soll sie ja nicht sehen

//Datenbankverbindung
$connect = mysql_connect ("localhost","root","") or die(mysql_error());
mysql_select_db("mitfahrboerse") or die (mysql_error());

$user= $_SESSION['username'];

//Datenbankabfrage
$view_msg = mysql_query ("Select * from private_messages where to_user='vanessa'");//!!!!statt Vanessa steht hier '$user'!!!!

//Anzahl der Datensätze der Datenabrage $view_msg
$row = mysql_num_rows($view_msg);


//wenn Datensätze vorhanden sind füge die Daten in eine Tabelle ein
if ($row != 0)	{
	echo "
		<table >
		<tr>
	";
	while($rows = mysql_fetch_assoc ($view_msg))	{ //fügt die vorhandenen Datensätze als Array aneinander
		$id = $rows['id'];
		$to_user = $rows['to_user'];
		
		echo "<td><b>Von:</b></td>";
		echo "<td>";
		echo "".$from_user = $rows['from_user'].""; //fügt den Inhalt der Tabellenspalte 'from_user' in $from_user ein
		echo "</td>";
		echo "</tr>";
		echo "<tr>";		
		echo "<td><b>Betreff:</b></td>";
		echo "<td>";
		echo "".$subject = $rows['betreff'].""; //fügt den Inhalt der Tabellenspalte 'betreff' in $subject ein
		echo "</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td><b>Nachricht:</b></td>";
		echo "<td>";
		echo "".$message = $rows['nachricht']."";//fügt den Inhalt der Tabellenspalte 'nachricht' in $message ein
		echo "</td>";
		echo "</tr>";
	}
	echo "<tr>";
	echo "<td colspan='2'><a href='messages.php?id=compose&messageid=$id&betreff=RE:$subject&to=$from_user' class='btn btn-primary' style='background-color:#83B81A;border:none'>Antworten</a></td>";
	echo "</tr>";
	echo "</table>";
	
	//wenn der Name der angemeldeten Person dem Name in der Datenbank entspricht, dann wird die Spalte read in der DB auf 1 gesetzt für die entsprechende Nachricht (id)
	if ($to_user == $user)	{
		$up = mysql_query ("
			UPDATE private_messages SET read='1' where id='$id'
		");
	}
} 
// Wenn es keine Datensätze gibt
else	{
	echo  "Keine Konversation vorhanden!";
}

?>

<!-- Footer -->
<?php include 'footer.php'?>
	</div><!--Ende .container -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>tents here
