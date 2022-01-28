<?php
require_once('../connectMysql.php');
include_once('../addAccountBank.php');

$db = connectMysql();

if(isset($_POST['deleteOp'])){ //When delete button is clicked
    
    $db=connectMysql();
 
    $idCompte =$_POST['IdCompte'];
    $idCategory = $_POST['IdCategorie'];

    // sql request to take the amount
    $req = $db->query("SELECT MontantOperation FROM Operation WHERE IdCompte =$idCompte");
    $req->execute();
    $result = $req->fetchColumn();

    if ($idCategory > 0 && $idCategory < 7) { //When the type is a debit

        //provision = provision - montant
        $debit = $db->prepare('UPDATE CompteBancaire
        SET  Provision_Compte = Provision_Compte + :MontantOperation
        WHERE IdCompte = :IdCompte ');
        $debit->execute( array('MontantOperation' => $result, 'IdCompte' => $idCompte));
    
    }elseif ($idCategory > 6 && $idCategory < 11) { //When the type is a credit

        //provision = provision + montant
        $credit = $db->prepare('UPDATE CompteBancaire
        SET  Provision_Compte = Provision_Compte - :MontantOperation
        WHERE IdCompte = :IdCompte ');
        $credit->execute( array('MontantOperation' => $result, 'IdCompte' => $idCompte));

    }

    // sql request to take the IdOperation
    $op = $db->query("SELECT IdOperation FROM Operation WHERE IdCompte = $idCompte");
    $op->execute();
    $opId = $op->fetchColumn();

    // sql request to delete the operation
    $delete = $db->prepare('DELETE FROM Operation WHERE IdOperation = :idO');
    $delete->execute(array('idO'=> $opId));

    notifC("You have successfully delete an operation");
    header("refresh:3; ../../vendor/html/welcomeHtml.php");
    
}
?>

