
<?php

  function compteInformation(){

    if(isset($_POST["submitForm"])){
          echo "<p>";
          echo"<span><strong>Nom de compte : </strong><em>" . $_POST['nom'] . "</em><br>";
          echo"<span><strong>Type de compte : </strong><em>" . $_POST['type'] . "</em><br>";
          echo"<span><strong>Provision de compte : </strong><em>" . $_POST['provision'] . "</em><br>";
          echo"<span><strong>Devise de compte : </strong><em>" . $_POST['devise'] . "</em><br>";
          echo"</p>";
      
  }
}



compteInformation();
?>
