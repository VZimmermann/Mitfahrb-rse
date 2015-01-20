
<?php
	// mit Beginn einer Session ist es möglich, bestimmte Daten (in diesem Fall den username) während des Aufenthaltes des Benutzers beizubehalten und (ähnlich von Cookies)
	session_start();

	$username=$_POST['username'];
	$password=$_POST['password'];

	//Datenbankverbindung
	$connect=mysql_connect ("localhost","root","") or die (mysql_error());
	mysql_select_db ("mitfahrboerse") or die (mysql_error());

	//Datenbankabfrage starten in der nach dem Username der angemeldeten Person gesucht wird
	$logcheck = mysql_query (" 
		SELECT * from person where username='$username'
	");

	//gibt die Anzahl der vorhandenen Datensätze aus
	$nrow=mysql_num_rows ($logcheck);

	//wenn Datensätze vorhanden sind werden diese in ein Array übergeben 
	if ($nrow!=0)	{
		while($rows=mysql_fetch_assoc($logcheck))	{
			$dbusername = $rows['username'];
			$dbpassword = $rows['password'];
		}
		//wenn die eingegebenen Daten username und password mit den Daten in der Datenbank übereinstimmen kommt der Benutzer auf seine Seite
		if ($username == $dbusername && $password == $dbpassword)	{
			header ("Location: http://localhost/Mitfahrgelegenheit/bootstrap-3.3.0-dist/dist/Startseite_angemeldet.php");
			$_SESSION['username'] = $username;
		}
		//wenn sie nicht übereinstimmen wird er zur Anmeldung weitergeleitet und sieht keine persönlichen Elemente
		else	{
			header ("Location: http://localhost/Mitfahrgelegenheit/bootstrap-3.3.0-dist/dist/anmeldung.php");
		}
	}
	//wenn keine Datensätze vorhanden sind wird die Person auf die Startseite weitergeleitet und eine Nachricht wird ausgegeben, dass die Eingaben falsch waren
	else	{
		header ("Location: http://localhost/Mitfahrgelegenheit/bootstrap-3.3.0-dist/dist/anmeldung.php" );
	}  
?>
	
