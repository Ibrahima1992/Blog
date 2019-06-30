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
           <h1>MON BLOG</h1>
         </header>
        </div>

        <section>
          <article>
    <h2>Ecrire article:</h2>
<form method="post" action="ecrire_article.php">
  <p>
    Titre: <input type="text" name="titre" required />
  </p>

   <legend>Article:</legend>
    <textarea name="texte" cols="" rows="" required />
    </textarea>

  <p>
    <input type="submit" name="publier" value="Publier"/>
    <input type="reset" name="annuler" value="Annuler"/>
  </p>

</form>

          </article>
        </section>

       <footer>
          <p>vide pour le moment</p>
       </footer>
     </div>

    </body>
 </html>


	<?php
		if(isset($_POST['publier'])) {
      if ((!empty($_POST['titre']) && !empty($_POST['texte']))){

			//si on appui sur le bouton publier
			$titre = $_POST['titre'];
			$texte = $_POST['texte'];

     //$titre = mysql_real_escape_string($titre);
     //$texte = mysql_real_escape_string($texte);

      mysql_connect("localhost", "root", "asmaou96");
      mysql_select_db("monProjet");

			$sql = "INSERT INTO article VALUES('','$titre', '$texte', now())";
			//on envoie la requête
			$req = mysql_query($sql) or die(mysql_error());
			echo "Enregistrement réussi";
      echo"<a href='affiche_article.php'>click</a>";
			mysql_close ();
		}
  }
	?>
