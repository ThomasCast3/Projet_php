<?php            
require_once "../../vendor/connectMysql.php";
include_once "../html/welcomeHtml.php";


    $db = connectMysql();

    if(!isset($_SESSION['user_login']))	//check unauthorize user not access in "welcome.php" page
    {
        header("location: login.php");
    }


    $id = $_SESSION['user_login'];

    $select_stmt = $db->prepare("SELECT * FROM Utilisateurs WHERE IdUtilisateur=:IdUtilisateur");
    $select_stmt->execute(array(":IdUtilisateur"=>$id));

    $row=$select_stmt->fetch(PDO::FETCH_ASSOC);
?>