<?php
  function insertData(){
    if(isset($_POST["submitForm"])){
      $conn = mysqli_connect("mysql-rttaphp.alwaysdata.net", "rttaphp_formulaire", "rttaphp_rui", "justrunnz");

      // $db = connectMysql();

      $nom_compte = $_REQUEST['nom_compte'];
      $type_compte = $_REQUEST['type_compte'];
      $provision_compte = $_REQUEST['provision_compte'];
      $devise_compte = $_REQUEST['devise_compte'];


      $req = "INSERT INTO CompteBancaire VALUES ('$nom_compte','$type_compte','$provision_compte','$devise_compte')";
      // $req->execute(array("nom" => $_POST['nom'], "type_compte" => $_POST['type_compte'], "provision" => $_POST['provision'], "devise" => $_POST['devise']));
    
      if(mysqli_query($conn, $req)){
        echo "<h3>data stored in a database successfully." 
            . " Please browse your localhost php my admin" 
            . " to view the updated data</h3>"; 

        echo nl2br("\n$nom_compte\n $type_compte\n "
            . "$provision_compte\n $devise_compte");
      } else{
          echo "ERROR: Hush! Sorry $req. " 
              . mysqli_error($conn);
      }
    }
  }
  insertData();

?>