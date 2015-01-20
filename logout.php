<?php
session_start();//startet die Session
session_destroy();//löscht alle Daten, die in einer Session aufgekommen sind -->in diesem Falle sind es Passwort und Benutzername
header("Location: http://localhost/Mitfahrgelegenheit/bootstrap-3.3.0-dist/dist/Startseite_unangemeldet.php"); //springt dann auf die Startseite der Webseite zurück

?>
