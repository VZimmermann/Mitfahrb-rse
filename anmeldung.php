<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>HFU Mitfahrgelegenheit - Login</title>
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
	
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<style>
	#container	{
		font-size:100%;
		color:#737373;
	}
	#formularanmeldung	{
		position: absolute;
		padding:30px;
		
	}
	
	</style>

  </head>

<body>

<div id="container">

	<div class="row">
<!--das Formular ist die Eingabe für den User zur Bestätigung seiner Daten, das auf Startseite_angemeldet.php zurückgreift-->
<!--ruft die Datei login-check.php auf-->
		<form action="login-check.php" id="formularanmeldung" method ="POST">
			<table style=>
				<h1>Login</h1>
				<tr>
					<td>Username &nbsp;</td>
					<td><input type="text" name="username"/></td><!-- Eingabefeld für den Usernamen -->
				</tr>
				<tr>
					<td>Passwort &nbsp;</td>
					<td><input type="password" name="password"/></td><!-- Eingabefeld für das Passwort -->
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="submit" value="Login"/></td><!-- Absende Button -->		
				</tr>
			</table>
		</form>
	</div><!--Ende .row-->
</div> <!--Ende .container -->

</body>
</html>
