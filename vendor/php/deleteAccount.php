<?php
require_once('../connectMysql.php');
include_once('../addAccountBank.php');

$db = connectMysql();

if(isset($_POST['deleteAc'])){

    $db = connectMysql();

    // echo $_POST['IdCompte'];
    $idCompte = $_POST['IdCompte'];

    $statement = $db->prepare('DELETE FROM Operation WHERE IdCompte = :idC');
    $statement->execute(array('idC'=> $idCompte));

    // prepare the statement for execution
    $statement = $db->prepare('DELETE FROM CompteBancaire WHERE IdCompte = :idC');
    $statement->execute(array('idC'=> $idCompte));

    // execute the statement
    notifC('Account deleted...');
    header("refresh:2; ../html/welcomeHtml.php");

}   
?>

