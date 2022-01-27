<?php
    require_once('./connectMysql.php');
    require_once('./addAccountBank.php');

    $db = connectMysql();

    echo $_POST['IdCompte'];
    $IdCompte = $_POST['IdCompte'];

    // prepare the statement for execution
    $statement = $db->prepare('DELETE FROM CompteBancaire WHERE IdCompte = :idC');
    $statement->execute(array('idC'=> $IdCompte));

    // execute the statement
    if ($statement->execute()) {
        notifE('delete success');
    }

?>

