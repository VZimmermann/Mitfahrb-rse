
	
	<?php
	$pages_dir = 'profil'; //Name des Ordners unter htdocs/Mitfahrgelegenheit/bootstrap... unter dem die Unterseiten compose, inbox, outbox und read hinterlegt sind

	//id wird aus der URL gezogen
	//auf den Unterseiten wird hinten an die URL immer noch etwas dran gehängt, z. B. id=meineanfragen, 
	//meineanfrage ruft die Seite meineanfragen auf
	//meineangebote ruft die Seite mit dem meineangebote auf
	//gemerktefahrten ruft die Seite mit den gemerktenfahrten auf
	if (!empty($_GET['id']))	{
		$pages = scandir($pages_dir, 0);//scandir listet Verzeichnisse und Listen innerhalb eines Pfades auf
		unset ($pages[0], $pages[1]); //unset löscht die zwei  Variablen in der Klammer
	
		$id = $_GET['id']; //id kann entweder meineanfragen, meineangebote oder gemerktefahrten sein, die aus der URL ausgelesen werden
	
		if (in_array($id.'.php',$pages))	{
			include($pages_dir.'/'.$id.'.php');//fügt Seiten ein, die in der Ordnerstruktur z. B. profil/meineanfragen.php 
		}
		else	{
			echo "Seite nicht gefunden"; //wenn es die id nicht gibt zeigt es an, dass die Seite nicht gefunden wurde
		}
	}
	//wenn keine id per URL übergeben wird soll die Seite im Pfad nachricht/inbox.inc.php aufgerufen werden
	else	{
		include($pages_dir.'/meineangebote.php');
	}
?>
	
	
	
	
	
	
