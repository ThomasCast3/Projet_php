<?php
  require_once './connectMysql.php';
  function insertData(){
    if(isset($_POST["submitForm"])){

      $nom_compte = $_POST['nom_compte'];
      $type_compte = $_POST['type_compte'];
      $provision_compte = $_POST['provision_compte'];
      $devise_compte = $_POST['devise_compte'];

      $db = connectMysql();
      $req = $db->prepare('INSERT INTO CompteBancaire ( IdUtilisateur, Nom_Compte, Type_Compte, Provision_Compte, Devise_Compte) VALUES ( :idU, :NC, :TC, :PC, :DC) ');
      $req->execute( array( 'idU' => 3, 'NC' => $nom_compte, 'TC' => $type_compte, 'PC' => $provision_compte, 'DC' => $devise_compte ) );
      echo "$req";
    }
  }
  insertData();

?>