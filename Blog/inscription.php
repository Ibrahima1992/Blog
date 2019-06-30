<!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8" />
      <title>connexion</title>
    </head>
    <body>
      <?php
        session_start();
        include 'index.php';//connection au serveur
        //recuperer les valeurs du formualaires inscription dans la page (page_accueil.html)
        if(isset($_POST['Valider']) && (empty($_POST['nom']) || empty($_POST['prennom'])
         || empty($_POST['identifiant']) || empty($_POST['pass']) || empty($_POST['pass2'])
         || empty($_POST['adresse']) || empty($_POST['email']))){
        }

        else{
          $name = $_POST['nom'];
          $prenom = $_POST['prenom'];
          $id = $_POST['identifiant'];
          $psw1 = $_POST['pass'];
          $psw2 = $_POST['pass2'];
          $adr= $_POST['adresse'];
          $email = $_POST['email'];

         //teste pour les deux mots de pass
          if($psw1 != $psw2){
            header("Location: erreur_pass.html");//message d'erreur si les deux mots de pass sont differents
            exit();
          }
          else{
            $sql = "SELECT count(*) FROM information WHERE identifiant='".$id."'";
            $req = mysql_query($sql) or die(mysql_error());
            $res = mysql_fetch_row($req);
            $m = $res[0];

            if($m == 0) {
              //préparation de la requete
              $sql = "INSERT INTO information VALUES('','$name','$prenom','$id','$psw1','$adr','$email')";
              //insertion du (msql_query), et écrire un message d'erreur si la requete
              $req = mysql_query($sql) or die(mysql_error());
              if($req){
                header('Location: inscriptionterminée.html');
              }

              mysql_close ();
            }

            else{//si l'identifiant existe déjà on affiche un  message d'erreur
              header('Location: erreur_exist_identifiant.html');
              exit();
            }
          }
        }

      ?>
    </body>
 </html>
