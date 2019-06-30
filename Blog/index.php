<?php
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = 'asmaou96';
    $dbb = 'monProjet';
    @mysql_connect($dbhost, $dbuser, $dbpass );// on se connecte à la base:
    mysql_select_db($dbb);// on selectionne la table
?>
