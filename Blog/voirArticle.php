<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8" />
      <title>MON SITE</title>
      <link rel="stylesheet" href="css/style.css"/>
    </head>

    <body>
      <div id="contenu">
        <div>
         <header>
           <h1>
<?php
     session_start ();
     echo $_SESSION['identifiant'];
?></h1>


         </header>
        </div>

        <section>
          <article>
    <h2> Liste des articles publiés sur ce blog:</h2>
<?php

       mysql_connect("localhost", "root", "root");

       mysql_select_db("monProjet");

    $sql = "SELECT titre FROM article";

    $req = mysql_query($sql) or die(mysql_error());

    while ($d = mysql_fetch_array($req)) {
     echo "<p>";
     echo "Titre:";
     echo "<a href=\"lien_vers_la_page_de_larticle\">";
     echo "".$d['titre']."";
     echo "</a>";
     echo "<br/>";
     echo "Date:".$d['date']."";
     echo "</p>";
     }


   mysql_close ();
?>

          </article>
        </section>

       <footer>
          <p>vide pour le moment</p>
       </footer>
     </div>

    </body>
 </html>
