Enter file contents here<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>HFU Mitfahrgelegenheit - Neue Nachricht schreiben</title>
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
<?php include 'header.php'?><br>


<?php
	//session_start();
	//fügt Links hinzu; diese müssen in den Unterseiten compose, inbox, outbox, read sein und nicht unter nachrichten.php stehen, da sonst das css verworfen wird
	$welcome =" <a href='messages.php?id=compose'>Neue Nachricht schreiben</a> | <a href='messages.php?id=inbox'>Posteingang</a> | <a href='messages.php?id=outbox'>Postausgang</a><br/><br />";
	echo $welcome;
?>

<?php

error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING ^ E_DEPRECATED);//falls es Fehlermeldungen geben sollte, werden die nicht auf der Seite angezeigt

//werden benötigt, wenn man eine Antwort schreiben möchte
//es werden dann der Betreff und an wen es geht automatisch eingefügt
$subject1 = $_REQUEST ['betreff'];/*enthält den Inhalt von $_POST['betreff']*/
$to_user1 = $_REQUEST ['to'];//holt sich den Inhalt aus der URL

$user = $_SESSION['username'];


/*Verbindung mit der Datenbank*/
$connect = mysql_connect ("localhost","root","") or die(mysql_error());
mysql_select_db("mitfahrboerse") or die (mysql_error());

$submit = $_POST['submit'];
$to_user = $_POST['to_user'];
$subject = $_POST['betreff'];
$message = $_POST['nachricht'];
$date = date("d.m.Y");

$to_user = mysql_real_escape_string($to_user);//Zeichen werden maskiert, damit sie in der Abfrage korrekt verwendet werden können
$subject = mysql_real_escape_string($subject);
$message = mysql_real_escape_string($message);

//wenn man den Submitbutton gedrückt hat wird überprüft ob alle Eingaben getätigt wurden
if ($submit)	{
	//fehlt der Empfänger wird eine Fehlermeldung ausgegeben
	if (!$to_user)	{
		echo "Bitte geben Sie einen Empfänger ein";
		echo "<br>";
	}
	//fehlt der Betreff wird eine Fehlermeldung ausgegeben
	if (!$subject)	{
		echo "Bitte geben Sie einen Betreff an";
		echo "<br>";
	}
	//fehlt die Nachricht wird eine Fehlermeldung ausgegeben
	if (!$message)	{
		echo "Bitte geben Sie eine Nachricht ein";
		echo "<br>";
	}
	
	/*wenn alle Daten im Formular ausgefüllt sind werden die Daten mittels $query in die Datenbank eingefügt*/
	if ($to_user && $subject && $message)	{
		$query	 = mysql_query("
			INSERT INTO private_messages VALUES('','$user','$to_user','$subject','$message','$date','0') 
		");//die Message id ist auto increment, deshalb ist das erste Feld in der Datenabfrage leer
	
		echo "<b>Ihre Nachricht wurde erfolgreich gesendet</b>"; //sofern alle Felder ausgefüllt wurden wird ausgegeben, dass die Nachricht erfolgreich gesendet wurde
	}
}


/*Eingabeformular für die Nachricht*/
echo "
<form action='' method='POST'> 
<table >
	<tr>
		<td>An:</td>
		<td><input type='text' name='to_user' value='$to_user1'>&nbsp;</td>		<!-- falls man eine Nachricht schreiben möchte muss man hier den Empfänger eingeben; falls man auf eine erhaltene Nachricht antworten möchte, wird der Wert der in $to_user1 steht automatisch eingetragen -->
	</tr>
	<tr>
		<td>Betreff:</td>
		<td><input type='text' name='betreff' value='$subject1' ></td>			<!-- falls man eine Nachricht schreiben möchte muss man hier den betreff eingeben; falls man auf eine erhaltene Nachricht antworten möchte wird automatisch der Betreff aus der URL gezogen und ein RE: vorne angestellt -->
	</tr>
	<tr>
		<td>Nachricht:</td>
		<td><textarea name='nachricht' cols='50' rows='10'></textarea></td>		<!-- Eingabe der Nachricht in ein Textfeld mit 50 Spalten und 10 Zeilen -->
	</tr>
	<tr>
		<td colspan='2'><input type='submit' id='submit_compose'  class='btn btn-lg btn-primary' style='background-color:#83B81A;border:none'  value='Absenden' /></td> <!-- würde man das Styleelement in ein Skript in head machen würde die Seite nicht mehr angezeigt werden (hängt mit der Verknüpfung zu message.php zusammen)--> 
	</tr>
</table>
</form>
";

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
