<?php
    require_once('./connectMysql.php');
    require_once('./addAccountBank.php');


    $db = connectMysql();

    echo $_POST['IdCompte'];

    $idCompte = $_POST['IdCompte'];

    // $sqlAccount = 'DELETE FROM CompteBancaire WHERE IdCompte = :idC';
    // prepare the statement for execution
    $statement = $db->prepare('DELETE FROM CompteBancaire WHERE IdCompte = :idC');
    $statement->execute(array('idC'=> $idCompte));


    // execute the statement
    if($statement->execute()){
        notifC('Account deleted...');
        header("refresh:2; ../vendor/html/welcomeHtml.php");
    }
?>

<html>
    <link rel="stylesheet" href="../assets/style/style.css">
    <script src="../assets/js/accountManagement.js"></script>
</html>
