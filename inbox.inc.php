Enter file contents here<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>HFU Mitfahrgelegenheit - Nachrichten Posteingang</title>
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
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING ^ E_DEPRECATED); //alle Fehlermeldungen die auftreten werden nicht auf der Webseite angezeigt, der Benutzer soll sie ja nicht sehen
$user = $_SESSION['username'];

/*Verbindung mit der Datenbank*/
$connect = mysql_connect ("localhost","root","") or die (mysql_error());
mysql_select_db("mitfahrboerse") or die (mysql_error());

//Datenbankabfrage; es sollen die Nachrichten angezeigt werden, deren Empfängername der des angemeldeten ist 
$view_msg = mysql_query("Select * from private_messages where to_user='lisa'");//statt Vanessa sollte hier $user stehen, das erkennt es aber noch nicht

$row = mysql_num_rows($view_msg);//zählt die Anzahl der Reihen in der Tabelle private_messages

//wenn Datensätze vorhanden sind
if ($row!=0)	{
	//fügt die vorhandenen Datensätze in eine Tabelle
	echo "<table>";
	echo "<tr>";
	echo "<td>Von:</td><t>";
	echo "<td>Betreff:</td><t>";
	echo "<td>Datum:</td><t>";
	echo "</tr>";
	while ($rows = mysql_fetch_assoc($view_msg))	{ //fügt die Datensätze, die über $view_msg ausgelesen wurden als Array aneinander
		$id = $rows['id'];
		echo "<tr>";
		echo "<td>".$from_user=$rows['from_user']."</td>";//fügt den Inhalt der Tabellenspalte 'from_user' in $from_user ein
		echo "<td><a href='messages.php?id=read&messageid=$id'>".$subject=$rows['betreff']."</a></td>";//fügt den Inhalt der Tabellenspalte 'betreff' in $subject ein
		echo "<td>".$date=$rows['datum']."</td>";//fügt den Inhalt der Tabellenspalte 'datum' in $date ein
		echo "</tr>";
	}

}
//falls es keine neuen Nachrichten gibt wird eine entsprechende Ausgabe generiert
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
			<th colspan='4'>Sie haben keine neue Nachricht</th>
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
