
<?php
  function compteInformation(){
    if(isset($_GET["submitForm"])){
          echo "<p>";
          echo"<span>nom de compte:<strong>" . $_GET['nom'] . "</strong><br>";
          echo"<span>type de compte:<strong>" . $_GET['type'] . "</strong><br>";
          echo"<span>provision de compte:<strong>" . $_GET['provision'] . "</strong><br>";
          echo"<span>devise de compte:<strong>" . $_GET['devise'] . "</strong><br>";
          echo"</p>";
      
  }
}

compteInformation();
?>
