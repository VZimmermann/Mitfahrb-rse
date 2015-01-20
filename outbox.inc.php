Enter fil<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>HFU Mitfahrgelegenheit - Nachrichten Postausgang</title>
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
$user = $_SESSION['username'];

//Verbindung mit der Datenbank
$connect = mysql_connect ("localhost","root","") or die (mysql_error());
mysql_select_db("mitfahrboerse") or die (mysql_error());

//Datenbankabfrage für alle Nachrichten deren Absender der Name des Angemeldeten ist
$view_msg = mysql_query("Select * from private_messages where from_user='vanessa'");//statt Vanessa sollte hier $user stehen, das erkennt es aber noch nicht


// Anzahl der vorhandenen Datensätze der Abfrage
$row = mysql_num_rows($view_msg);

//wenn Datensätze vorhanden sind, dann in eine Tabelle eintragen
if ($row!=0)	{

	echo "<table width='200'>";
	echo "<tr>";
	echo "<td>&nbsp;</td>";
	echo "<td>Von:</td>";
	echo "<td>An:</td>";
	echo "<td>Betreff:	&nbsp;</td>";
	echo "<td>Datum:</td>";
	echo "</tr>";
	while ($rows = mysql_fetch_assoc($view_msg))	{ //fügt die vorhandenen Datensätze als Array aneinander
		$id = $rows['id'];
		echo "<tr>";
		echo "<td>&nbsp;</td>";
		echo "<td>".$from_user=$rows['from_user']."&nbsp;&nbsp;</td>"; //fügt den Inhalt der Tabellenspalte 'from_user' in $from_user ein
		echo "<td>".$to_user=$rows['to_user']."&nbsp;&nbsp;</td>";//fügt den Inhalt der Tabellenspalte 'to_user' in $to_user ein
		echo "<td><a href='messages.php?id=read&messageid=$id'>".$subject=$rows['betreff']."</a>&nbsp;&nbsp;</td>";
		echo "<td>".$date=$rows['datum']."</td>";
		echo "</tr>";
	}

}
//falls kein Datensatz vorhanden ist
else	{
	echo "
	<table>
		<tr align='left'>
			<td>&nbsp;</td>
			<td>Von:</td>
			<td>Betreff:</td>
			<td>Datum:</td>
		</tr>
		<tr>
			<th colspan='4'>Sie haben keine Nachricht versendet</th>
		</tr>
	</table>
	";

}
	echo "</table>";
?>

<!-- Footer -->
<?php include 'footer.php'?>
</div><!--Ende .container -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
e contents here
