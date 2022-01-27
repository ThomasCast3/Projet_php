<?php
require_once('../connectMysql.php');
include_once('../addAccountBank.php');

$db = connectMysql();


// $idCompte = $_POST['IdCompte'];

// // prepare the statement for execution
// $statement = $db->prepare('DELETE FROM Operation WHERE IdCompte = :idC');
// $statement->execute(array('idC'=> $idCompte));

// // execute the statement
// if ($statement->execute()) {
//     notifE('delete success');
// }

if(isset($_POST['deleteOp'])){
    
    // session_start();

    $db=connectMysql();
 
    $idCompte =$_POST['IdCompte'];
    $idCategory = $_POST['IdCategorie'];

    $req = $db->query("SELECT MontantOperation FROM Operation WHERE IdCompte =$idCompte");
    $req->execute();
    $result = $req->fetchColumn();

    $op = $db->query("SELECT IdOperation FROM Operation WHERE IdCompte =$idCompte");
    $op->execute();
    $opId = $op->fetchColumn();


    if ($idCategory > 0 && $idCategory < 7) {

        //provision = provision - montant
        $debit = $db->prepare('UPDATE CompteBancaire
        SET  Provision_Compte = Provision_Compte + :MontantOperation
        WHERE IdCompte = :IdCompte ');
        $debit->execute( array('MontantOperation' => $result, 'IdCompte' => $idCompte));
    
    }elseif ($idCategory > 6 && $idCategory < 11) {
        
        //provision = provision + montant
        $credit = $db->prepare('UPDATE CompteBancaire
        SET  Provision_Compte = Provision_Compte - :MontantOperation
        WHERE IdCompte = :IdCompte ');
        $credit->execute( array('MontantOperation' => $result, 'IdCompte' => $idCompte));

    }

    $statement = $db->prepare('DELETE FROM Operation WHERE IdOperation = :idO');
    $statement->execute(array('idO'=> $opId));

    notifC("You have successfully delete an operation");
    header("refresh:3; ../../vendor/html/welcomeHtml.php");
}
?>

