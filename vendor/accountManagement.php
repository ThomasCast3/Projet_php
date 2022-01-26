<?php
require_once('./vendor/connectMysql.php');

function ListCompte( $idUtilisateur ) {
    $db = connectMysql();  //connection BDD
    $req = $db->prepare('SELECT * FROM CompteBancaire WHERE IdUtilisateur = ?');  //prepare requete recuperer les compte d'un utilisateur
    $req->execute( array( $idUtilisateur ) );  //executer la req 

    return $req->fetchAll();  // retourner le resulta sous forme de tableau
}

?>


