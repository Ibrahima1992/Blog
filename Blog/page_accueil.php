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

            <p>
              <img src="images/img_pre.jpg">
            </p>

             <div>
               <!--Formulaire pour la connexion(pour les personnes déjà inscrites)-->
              <form method="POST" action="page_accueil.php">
                <fieldset id="conect">
                <legend>Connexion</legend>
                <p>
                <input type="text" name="identifiant" placeholder="Identifiant" size="30" required/>
                </p>
                <p>
                <input type="password" name="pass" placeholder="Mot de pass" size="30" required/>
                </p>
                <input type="submit" name="connecter" value="connecter">
                </fieldest>
             </form>
            </div>

           <div>
              <!--Formulaire pour l'inscription(pour les personnes non inscrites)-->
              <form method="post" action="inscription.php">
                <fieldset>
                <legend>Vous n'avez pas de compte?</legend>
                <p>
                  <input type="text" name="nom" placeholder="Nom" size="30" required/>
                </p>
                <p>
                  <input type="text" name="prenom" placeholder="Prenom" size="30"  required/>
                </p>
                <p>
                  <input type="text" name="identifiant" placeholder="Identifiant" size="30" required/>
                </p>
                <p>
                  <input type="password" name="pass" placeholder="Mot de pass" size="30" required/>
                </p>
                <p>
                  <input type="password" name="pass2" placeholder="Confirmation mot de pass" size="30" required/>
                </p>
                <p>
                  <input type="text" name="adresse" placeholder="Adresse" size="30" required/>
                </p>
                <p>
                  <input type="text" name="email" placeholder="Adresse mail" size="30" required/>
                </p>

                <input type="submit" value="Valider" >
                </fieldest>
             </form>

            </div>
          </article>
        </section>

       <footer>
          <p>vide pour le moment</p>
       </footer>
     </div>

    </body>
 </html>


<?php


   if(isset($_POST['connecter'])){
	  if (!empty($_POST['identifiant']) && !empty($_POST['pass'])){
      $id=$_POST['identifiant'];
      $psw1=$_POST['pass'];

       mysql_connect("localhost", "root", "asmaou96");
       mysql_select_db("monProjet");

      // on teste si une entrée de la base contient ce couple identifiant/pass
      $sql = "SELECT count(*) FROM information WHERE identifiant='".$id."' AND pass='".$psw1."'";
      $req = mysql_query($sql) or die(mysql_error());
      $res = mysql_fetch_row($req);
      $m = $res[0];
      // si on obtient une réponse, alors ce compte existe
      if($m == 1) {
        session_start ();
        $_SESSION['identifiant'] = $_POST['identifiant'];
        header('Location: voirArticle.php');

        mysql_close();

      }

      else {
      // si on ne trouve aucune réponse, le visiteur s'est trompé soit de son identifiant ou soit de son mot de pass
      //ou alors le compte n'existe pas
      //on n'affiche un message d'erreur
      header('Location: page_accueil.php');
      }
  }
}

?>


