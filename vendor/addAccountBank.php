<?php
  require_once './connectMysql.php';
  session_start();

  // function addAccountBank(){
    if(isset($_POST["submitForm"])){

      $nom_compte = $_POST['nom_compte'];
      $type_compte = $_POST['type_compte'];
      $provision_compte = $_POST['provision_compte'];
      $devise_compte = $_POST['devise_compte'];

      $db = connectMysql();

      $id = $_SESSION['user_login'];

      $count = $db->query("SELECT COUNT(*) FROM CompteBancaire WHERE IdUtilisateur =  $id")->fetchColumn();
      // $count->execute( array( 'idU' => 3 ) );

      // $delete = $db->query('DELETE FROM CompteBancaire WHERE IdUtilisateur = 3 ')->fetchColumn();

      if($type_compte != "courant" && $type_compte != "epargne" && $type_compte != "compte joint"){
        notifE("You have to put a correct count's type");

       }else if($devise_compte != "EUR" && $devise_compte != "USD" ){
        notifE("You have to put a correct currency");

        // echo "<script>
        //             alert(\"You have to put a correct currency\");
        //             window.location.href = '../addAccountHTML.php';
        //           </script>";
       }else if(is_numeric($provision_compte)==false){
        notifE("You have to put a number");

        // echo "<script>
        //             alert(\"You have to put a number\");
        //             window.location.href = '../addAccountHTML.php';
        //           </script>";
  
       }else{
          if ($count < 11) {
            $req = $db->prepare('INSERT INTO CompteBancaire ( IdUtilisateur, Nom_Compte, Type_Compte, Provision_Compte, Devise_Compte) VALUES ( :idU, :NC, :TC, :PC, :DC) ');
            $req->execute( array( 'idU' => $id, 'NC' => $nom_compte, 'TC' => $type_compte, 'PC' => $provision_compte, 'DC' => $devise_compte ) );
            notifC("You have successfully created an account");
          }else {
            echo "<script>
                    alert(\"Nombre de compte dépassé\");
                    window.location.href = '../addAccountHTML.php';
                  </script>";
          }
        }
      }
    // }
  function h($text) { 
    return htmlspecialchars($text);
  }

  // addAccountBank();

?>

<html> 

  <!doctype html>
  <html lang="fr">

  <head>
    <meta charset="utf-8">
    <title>Little Accountant</title>
    <link rel="stylesheet" href="../style/style.css">
  </head>

  <body>
      <?php
      function notifE($text)
        {?>
         <div id="notification_container">
            <div class="content">
               <p><?php echo $text ?></p>
            </div>
         </div>
         <?php
        }
        
        function notifC($text)
        {?>
            <div id="notification_container">
               <div class="content_notif_correct">
                  <p><?php echo $text ?></p>
               </div>
            </div>
            <?php
        }
        ?> 
    <header>
      <div class="header-container">
        <h2 id="easterEgg">Create Bank Account</h2>
      </div>
    </header>

    <form method="POST">
      <p>Votre nom de compte : <input type="text" name="nom_compte" /></p>

      <p>Votre type de compte :
        <select name="type_compte">
          <option value="courant">Courant</option>
          <option value="epargne">Épargne</option>
          <option value="compte joint">Compte Joint</option>
        </select>
      </p>

      <p>Votre provision : <input type="number" name="provision_compte" /></p>

      <p>Votre devise :
        <select name="devise_compte">
          <option value="EUR">€ EUR</option>
          <option value="USD">$ USD</option>
        </select>
      </p>

      <p><input type="submit" name="submitForm" value="OK"></p>
    </form>

  </body>
</html>

<script>
document.getElementById("easterEgg").addEventListener('click', function(event) {
    window.open('./easterEgg/easterEgg.html');
})

  // Add a timer to supress our notifications after 3 seconds
  setTimeout(function () {
        document.querySelector('#notification_container .content').remove();
    }, 3000);

    setTimeout(function () {
        document.querySelector('#notification_container .content_notif_correct').remove();
    }, 3000);
</script>