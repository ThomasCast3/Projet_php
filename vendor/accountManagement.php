<?php
    require_once('connectMysql.php');
    include_once('addAccountBank.php');


    function ListCompte( $idUtilisateur ) {
    $db = connectMysql();  //BDD connection
    $req = $db->prepare('SELECT * FROM CompteBancaire WHERE IdUtilisateur = ?');  //prepare request to retrieve a user's account
    $req->execute( array( $idUtilisateur ) );  //run the req 

    return $req->fetchAll();  // return the result as an array
    }

    if(isset($_POST["submitFormEdit"])){ // When submit Edit is clicked

        $idCompte = $_POST['IdCompte']; //we will look for the values
        $nom_compte = $_POST['Nom_Compte'];
        $type_compte = $_POST['Type_Compte'];
        $provision_compte = $_POST['Provision_Compte'];
        $devise_compte = $_POST['Devise_Compte'];

        $db = connectMysql(); 

        //security management
        if($type_compte != "courant" && $type_compte != "epargne" && $type_compte != "compte joint"){
            notifE("You have to put a correct count's type");

        }else if($devise_compte != "EUR" && $devise_compte != "USD" ){
            notifE("You have to put a correct currency");

        }else if(is_numeric($provision_compte)==false){
            notifE("You have to put a number");

        }else{ // sql query to update the database
            $req = $db->prepare('UPDATE CompteBancaire 
            SET  Nom_Compte = :NC , Type_Compte = :TC , Provision_Compte = :PC , Devise_Compte = :DC
            WHERE IdCompte = :idC; ');
            $req->execute( array('NC' => $nom_compte, 'TC' => $type_compte, 'PC' => $provision_compte, 'DC' => $devise_compte, 'idC' => $idCompte ) );
            notifC("You have successfully edited an account");
        }
    }

?>



