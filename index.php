<!--
A chaque execution, ce fichier va écrire les articles issues de la DB, table "coz_articles_fr" (dont lers nouveautés), vers le fichier "flux_rss.xml" (acvessible à l'adresse http://your-website.com/sources/RSS/flux_rss.xml, par exemple)
Ici la table "coz_articles_fr" est aussi la source des arctiles puliés sur:
 - http://www.your-website.com/fr-articles.php ;
 - avec l'ancre #".$article['titre']."

-->
<?php
	 // ouverture de la DB
	require('../../INC/BDD_connect.inc.php');
	// ouverture du fichier XML de destination
	$file = fopen("flux_rss.xml", "w");

	// préparation de l'entête XML
	header("Contenu-type : text/xml");
	$xml = "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\r\n";
	$xml .= "<rss version=\"2.0\">\r\n";
    	$xml .= "<channel>\r\n";
    	$xml .= "<title>Your Website - RSS</title>\r\n";
    	$xml .= "<link>http://www.your-website.com</link>\r\n";
    	$xml .= "<description>Les news de notre site web</description>\r\n\n";

	// on récupère les articles sur la DB
	 $req_articles = $bdd->query('SELECT * FROM coz_articles_fr ORDER BY id DESC'); 
	
	// écriture des articles 1 a 1
	while ($article = $req_articles->fetch()) {
	$xml .= "<item>";
	$xml .= "<titre>Article publié : ".$article['titre']."</titre>\r\n"; 
	$xml .= "<link>http://www.your-website.com/fr-articles.php</link>\r\n";
	$xml .= "<guid >http://www.your-website.com/fr-articles.php#".$article['titre']."</guid>\r\n";
	$xml .= "<description>".$article['description']."</description>\r\n";  
	$xml .= "<pubDate>".$article['date']."</pubDate>\r\n\n";
    	}
	 
	$xml .= "</channel>\r\n";
	#print_r($xml);

	// écriture des articles dans le fichier XML et fermeture du fichier
	fwrite($file, $xml);
	fclose($file);
