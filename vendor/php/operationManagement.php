<?php
    require_once('../connectMysql.php');
    include_once('../addAccountBank.php');


    function ListOperation( $IdCompte ) {
        $db = connectMysql();  //connection BDD
        $req = $db->prepare('SELECT * FROM Operation WHERE IdCompte = ?');  //prepare requete recuperer les compte d'un utilisateur
        $req->execute( array( $IdCompte ) );  //executer la req 

        return $req->fetchAll();  // retourner le resulta sous forme de tableau
    }

    if(isset($_POST["submitOperationEdit"])){

        $IdOperation = $_POST['IdOperation'];
        $nom_operation = $_POST['NomOperation'];
        $type_operation = $_POST['IdCategorie'];
        $montant_operation = $_POST['MontantOperation'];
        $date_operation= $_POST['DateOperation'];

        $db = connectMysql();

        $db->prepare('UPDATE Operation
        SET  NomOperation = :NOP , IdCategorie = :IdC , MontantOperation = :MO , DateOperation = :DO
        WHERE IdOperation = :idO; ');
        $req->execute( array('NOP' => $nom_operation, 'IdC' => $type_operation, 'MO' => $montant_operation, 'DO' => $date_operation, 'idO' => $IdOperation ) );
        notifC("You have successfully edited an account");
        
    }

?>



