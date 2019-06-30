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
    <h2>
      <?php
       mysql_connect("localhost", "root", "asmaou96");

       mysql_select_db("monProjet");

      $sql = "SELECT titre FROM article";

    $req = mysql_query($sql) or die(mysql_error());
      echo $_POST['titre'];
      ?>
    </h2>

          </article>
        </section>

       <footer>
          <p>vide pour le moment</p>
       </footer>
     </div>

    </body>
 </html>
