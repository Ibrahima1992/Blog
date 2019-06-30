<?php
	session_start();
	if(isset($_SESSION['identifiant'])){

		$sql = "SELECT count(*) FROM information WHERE identifiant='".$_SESSION['identifiant']."'";
		$req = mysql_query($sql) or die(mysql_error());
		$res = mysql_fetch_row($req);
		$n = $res[0];
		if($n==1){
			//on est connecté
		}
		else
		{
			header('Location:page_accueil.html');
			exit();
		}

	}else{
		header('Location: page_accueil.html');
		exit();
	}

?>

