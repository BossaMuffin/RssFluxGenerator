# RssFluxGenerator
RSS generator from the table clustering the website articles in the DB 

For each call, the index.php file picks up the website articles in the DB, on the table named "coz_articles_fr". Then, each article is mapped to be write in the file named flux_rss.xml (http://your-website.com/sources/RSS/flux_rss.xml for example).

Here, the table "coz_articles_fr" is also the source of our website articles publishing, accessible by :
 - http://www.your-website.com/fr-articles.php ;
 - with #".$article['titre']." anchor.

Disclaimer :)
 Neither the DB, nor the "fr-articles.php" (and his post system) are present in this "FluxRssGenerator" repository.
However, perhaps, you could find these in the Comozone website repositories.
 
