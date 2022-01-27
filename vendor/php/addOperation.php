<?php
// session_start();
require_once('../connectMysql.php');
include_once('../addAccountBank.php');



  if(isset($_POST["submitFormOperation"])){

    $db = connectMysql();

    $NomOperation = $_POST['NomOperation'];
    $name = $_POST['name'];

    function ListIdCategory( $name ) {
        $db = connectMysql();  //connection BDD
        $idCategory = $db->prepare('SELECT id FROM category WHERE name = ?');  //prepare requete recuperer les compte d'un utilisateur
        $idCategory->execute( array( $name ) );  //executer la req 
    
        return $idCategory->fetchColumn();  // retourner le resultat sous forme de tableau
    }

    $idCategory = ListIdCategory( $name );
    echo $idCategory;


    $idCompte = $_POST['IdCompte'];

    $MontantOperation = $_POST['MontantOperation'];
    $DateOperation = $_POST['DateOperation'];

    if($name != "alimentaire" && $name != "vestimentaire" && $name != "loisir" && $name != "transport" && $name != "logement" && $name != "autre1" && $name != "virement" && $name != "depot" && $name != "salaire" && $name != "autre2"){
        notifE("You have to put a correct operation's type");

      }else if(strtotime($DateOperation)==false){
        notifE("You have to put a correct currency");

      }else if(is_numeric($MontantOperation)==false){
        notifE("You have to put a number");

      }else{
          echo ' | transaction ok | ';
          echo $idCompte;
          echo ' | test';

          $req = $db->prepare('INSERT INTO Operation ( IdCompte, IdCategorie, NomOpération, MontantOpération, DateOpération) VALUES ( :idCom, :idCat, :NO, :MO, :DO) ');
          $req->execute( array( 'idCom' => $idCompte, 'idCat' => $idCategory, 'NO' => $NomOperation, 'MO' => $MontantOperation, 'DO' => $DateOperation ) );

        //   notifC("You have successfully created an account");
        //   header("refresh:3; ../../vendor/html/welcomeHtml.php");			//refresh 2 second after redirect to "welcome.php" page
        
      }
    }



?>


