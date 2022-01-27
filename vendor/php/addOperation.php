<?php
// session_start();
require_once('../connectMysql.php');
require_once('../addAccountBank.php');


  if(isset($_POST["submitFormOperation"])){

    $db = connectMysql();

    $NomOperation = $_POST['NomOperation'];
    $idCategory = $_POST['IdCategorie'];
    $idCompte = $_POST['IdCompte'];
    $MontantOperation = $_POST['MontantOperation'];
    $DateOperation = $_POST['DateOperation'];

    // if($name != "alimentaire" && $name != "vestimentaire" && $name != "loisir" && $name != "transport" && $name != "logement" && $name != "autre1" && $name != "virement" && $name != "depot" && $name != "salaire" && $name != "autre2"){
    //     notifE("You have to put a correct operation's type");

    //   }else if(strtotime($DateOperation)==false){
    //     notifE("You have to put a correct currency");

    //   }else if(is_numeric($MontantOperation)==false){
    //     notifE("You have to put a number");

    //   }else{
        //   echo ' | transaction ok | ';
        //   echo $idCompte;
        //   echo ' | test';

        $req = $db->prepare('INSERT INTO Operation ( IdCompte, IdCategorie, NomOperation, MontantOperation, DateOperation) VALUES ( :idCom, :idCat, :NOP, :MO, :DO) ');
        $req->execute( array( 'idCom' => $idCompte, 'idCat' => $idCategory, 'NOP' => $NomOperation, 'MO' => $MontantOperation, 'DO' => $DateOperation ) );

          notifC("You have successfully created an account");
          header("refresh:3; ../../vendor/html/welcomeHtml.php");			//refresh 2 second after redirect to "welcome.php" page
        
    //   }
    }



?>


