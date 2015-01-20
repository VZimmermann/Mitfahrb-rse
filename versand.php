<html>
	<head> 
		<title> Kotakt </title>
	</head>
	<body>
	
	<?php
		if($_POST["anrede"]!="" and if($_POST["vorname"]!="" and if($_POST["nachname"]!="" and if($_POST["mail"]!="" and if($_POST["betreff"]!="" and if($_POST["nachricht"]!="" {
	
		$empf = "julia.klimesch@gmail.com";
		$betreff = "$_POST['betreff'];
		
		
		$from = "From: ";
		$from .= $_POST ['anrede' + 'vorname' + 'nachname'];
		$from .= " <";
		$from .= $_POST['mail']; 
		$from .= ">\n";
		
		$from = "Reply-To: ";
		$from .= "$_POST['mail'];
		$from .= "\n";
		$from .= "Content-Type: text/html\n";
		$text = $_POST['nachricht'];
		
		
		mail($empf, $betreff, $text, $from);
		echo 'Vielen Dank für deine Nachricht!';
		} else {
		echo 'Bitte fülle das Formular vollständig aus!';
		}


	?>
	</body>
</html>
