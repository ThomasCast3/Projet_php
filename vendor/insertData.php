<?php
  require_once './connectMysql.php';
  function insertData(){


    if(isset($_POST["submitForm"])){

      $nom_compte = $_POST['nom_compte'];
      $type_compte = $_POST['type_compte'];
      $provision_compte = $_POST['provision_compte'];
      $devise_compte = $_POST['devise_compte'];

     if($type_compte != "courant" && $type_compte != "epargne" && $type_compte != "compte joint"){
      echo "error type de compte";
     }

     if($devise_compte != "EUR" && $devise_compte != "USD" ){
      echo "error devise de compte";
     }

     if(is_numeric($provision_compte)==false){
      echo "la provision n'est pas un nombre";
     }

    $db = connectMysql();


      $req = $db->prepare('INSERT INTO CompteBancaire ( IdUtilisateur, Nom_Compte, Type_Compte, Provision_Compte, Devise_Compte) VALUES ( :idU, :NC, :TC, :PC, :DC) ');
      $req->execute( array( 'idU' => 3, 'NC' => $nom_compte, 'TC' => $type_compte, 'PC' => $provision_compte, 'DC' => $devise_compte ) );
    
    }
  }
  insertData();

 
?>