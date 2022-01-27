<?php
    // session_start();
    require_once('../connectMysql.php');
    include_once('../addAccountBank.php');

    if(isset($_POST["submitFormOperation"])){

        $db = connectMysql();

        $AccountId = $_POST['IdCompte'];
        $name = $_POST['Nom_Operation'];

        $idCategory = $_POST['Id_Categorie'];
        
        $OperationAmount = $_POST['Montant_Operation'];
        $OperationDate = $_POST['Date_Operation'];

        // $thisCategoryID = filter_input(INPUT_POST, 'operationTypeName', FILTER_SANITIZE_STRING);
        // echo $thisCategoryID;


        function ListIdCategory( $name ) {
            $db = connectMysql();  //connection BDD
            $idCategory = $db->prepare('SELECT id FROM category WHERE nameCat = :nameCat');  //prepare requete recuperer les compte d'un utilisateur
            $idCategory->execute( array( 'nameCat'=>$name ) );  //executer la req 
        
            return $idCategory->fetchColumn();  // retourner le resultat sous forme de tableau
        }

        $idCategory = ListIdCategory( $name );

        
        // if($name != "1" && $name != "2" && $name != "3" && $name != "4" && $name != "5" && $name != "6" && $name != "7" && $name != "8" && $name != "9" && $name != "10"){
        //     notifE("You have to put a correct operation's type");

        // }else if(strtotime($DateOperation)==false){
        //     notifE("You have to put a correct currency");

        // }else if(is_numeric($MontantOperation)==false){
        //     notifE("You have to put a number");

        // }else{
            // echo ' | transaction ok | ';
            echo $idCompte;
            echo " ";
            echo $idCategory;
            echo " ";
            echo $NomOperation;
            echo " ";
            echo $MontantOperation;
            echo " ";
            echo $DateOperation;
            
        
            $req = $db->prepare("INSERT INTO Operation ( IdCompte, IdCategorie, NomOperation, MontantOperation, DateOperation) VALUES ( :idCom, :idCat, :NOP, :MO, :DO)");
            $req->execute( array( 'idCom' => $AccountId, 'idCat' => $idCategory, 'NOP' => $name, 'MO' => $OperationAmount, 'DO' => $OperationDate ) );
        
              notifC("You have successfully created an account");
              header("refresh:3; ../../vendor/html/welcomeHtml.php");			//refresh 2 second after redirect to "welcome.php" page
            
        // }
    }

?>


