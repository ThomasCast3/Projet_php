<?php
require 'connectMysql.php';

session_start();
$db = connectMysql();

if(!isset($_SESSION['user_login']))	//check unauthorize user not access in "welcome.php" page
{
    header("location: deleteAccountBank.php");
}

$id = $_SESSION['user_login'];


$sqlAccount = 'DELETE FROM CompteBancaire WHERE IdUtilisateur = :id';
// prepare the statement for execution
$statement = $db->prepare($sqlAccount);
$statement->execute(array(':id'=> $id));

// execute the statement
if ($statement->execute()) {
	echo 'publisher id ' . $id . ' was deleted successfully.';
}

//session_destroy();
