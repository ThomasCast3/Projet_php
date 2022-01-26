<?php
require_once('./connectMysql.php');

  if(isset($_POST["submitForm"])){

    $nom_compte = $_POST['nom_compte'];
    $type_compte = $_POST['type_compte'];
    $provision_compte = $_POST['provision_compte'];
    $devise_compte = $_POST['devise_compte'];

    $db = connectMysql();

    $count = $db->query('SELECT COUNT(*) FROM CompteBancaire WHERE IdUtilisateur = 65 ')->fetchColumn();

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
          $req->execute( array( 'idU' => 65, 'NC' => $nom_compte, 'TC' => $type_compte, 'PC' => $provision_compte, 'DC' => $devise_compte ) );
          notifC("You have successfully created an account");
        }else {
          echo "<script>
                  alert(\"Nombre de compte dépassé\");
                  window.location.href = '../addAccountHTML.php';
                </script>";
        }
      }
    }

    function h($text) { 
      return htmlspecialchars($text);
    }

    function notifE($text) {?>
      <div id="notification_container">
        <div class="content">
            <p><?php echo $text ?></p>
        </div>
      </div>
      <?php
    }
      
    function notifC($text) {?>
      <div id="notification_container">
          <div class="content_notif_correct">
            <p><?php echo $text ?></p>
          </div>
      </div>
      <?php
    }


?>


