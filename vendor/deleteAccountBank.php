<?php
require_once('./connectMysql.php');
require_once('./addAccountBank.php');


// session_start();
$db = connectMysql();

echo $_POST['IdCompte'];

// if(!isset($_SESSION['user_login']))	//check unauthorize user not access in "welcome.php" page
// {
//     header("location: ../index.php");
// }

// $id = $_SESSION['user_login'];



$idCompte = $_POST['IdCompte'];


// $sqlAccount = 'DELETE FROM CompteBancaire WHERE IdCompte = :idC';
// prepare the statement for execution
$statement = $db->prepare('DELETE FROM CompteBancaire WHERE IdCompte = :idC');
$statement->execute(array('idC'=> $idCompte));

// execute the statement
if ($statement->execute()) {
    // echo 'publisher id ' . $idCompte . ' was deleted successfully.';
    notifE('delete success');
}

//session_destroy();
?>

