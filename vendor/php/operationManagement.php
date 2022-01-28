<?php
    require_once('../connectMysql.php');
    include_once('../addAccountBank.php');


    function ListOperation( $IdCompte ) {
        $db = connectMysql();  // BDD connection
        $req = $db->prepare('SELECT * FROM Operation WHERE IdCompte = ?');  //prepare request retrieve transactions from an account
        $req->execute( array( $IdCompte ) );  //run the req 

        return $req->fetchAll();  //return the result as an array
    }

    if(isset($_POST["submitOperationEdit"])){ // When submit Edit is clicked

        $IdOperation = $_POST['IdOperation']; // We will look for the values
        $nom_operation = $_POST['NomOperation'];
        $type_operation = $_POST['IdCategorie'];
        $montant_operation = $_POST['MontantOperation'];
        $date_operation= $_POST['DateOperation'];

        $db = connectMysql();

        // sql query to update the database
        $db->prepare('UPDATE Operation 
        SET  NomOperation = :NOP , IdCategorie = :IdC , MontantOperation = :MO , DateOperation = :DO
        WHERE IdOperation = :idO; ');
        $req->execute( array('NOP' => $nom_operation, 'IdC' => $type_operation, 'MO' => $montant_operation, 'DO' => $date_operation, 'idO' => $IdOperation ) );
        notifC("You have successfully edited an account");
        
    }


?>



