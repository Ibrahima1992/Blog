<?php

   include 'index.php';//connection au serveur
   if(isset($_POST['connecter'])){
	  if (!empty($_POST['identifiant']) && !empty($_POST['pass'])){
      $id=$_POST['identifiant'];
      $psw1=$_POST['pass'];
      // on teste si une entrée de la base contient ce couple identifiant/pass
      $sql = "SELECT count(*) FROM information WHERE identifiant='".$id."' AND pass='".$psw1."'";
      $req = mysql_query($sql) or die(mysql_error());
      $res = mysql_fetch_row($req);
      $m = $res[0];
      // si on obtient une réponse, alors ce compte existe
      if($m == 1) {
        session_start();
        $_SESSION['identifiant'] = $_POST['identifiant'];
        header('Location: voirArticle.html');
n
        mysql_close();

      }

      else {
      // si on ne trouve aucune réponse, le visiteur s'est trompé soit de son identifiant ou soit de son mot de pass
      //ou alors le compte n'existe pas
      //on n'affiche un message d'erreur
      header('Location: page_accueil.html');
      }
  }
}

?>


