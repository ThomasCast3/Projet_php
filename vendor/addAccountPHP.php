<?php
  require_once './connectMysql.php';

  function addAccountBank(){
    if(isset($_POST["submitForm"])){

      $nom_compte = $_POST['nom_compte'];
      $type_compte = $_POST['type_compte'];
      $provision_compte = $_POST['provision_compte'];
      $devise_compte = $_POST['devise_compte'];

      $db = connectMysql();

      $count = $db->query('SELECT COUNT(*) FROM CompteBancaire WHERE IdUtilisateur = 3 ')->fetchColumn();
      // $count->execute( array( 'idU' => 3 ) );

      // $delete = $db->query('DELETE FROM CompteBancaire WHERE IdUtilisateur = 3 ')->fetchColumn();

      if($type_compte != "courant" && $type_compte != "epargne" && $type_compte != "compte joint"){
        notifE("You have to put a correct count's type");
        ?>
        <script>
          window.location.href = '../addAccountHTML.php';
        </script>
        <?php
        // header("Location: ../addAccountHTML.php?err=compte");
       }else if($devise_compte != "EUR" && $devise_compte != "USD" ){
        echo "<script>
                    alert(\"You have to put a correct currency\");
                    window.location.href = '../addAccountHTML.php';
                  </script>";
        // header("Location: ../addAccountHTML.php?err=devise");
       }else if(is_numeric($provision_compte)==false){

        echo "<script>
                    alert(\"You have to put a number\");
                    window.location.href = '../addAccountHTML.php';
                  </script>";
  
        // header("Location: ../addAccountHTML.php?<SCRIPT>alert('error')</SCRIPT>");
  
       }else{
          if ($count < 11) {
            $req = $db->prepare('INSERT INTO CompteBancaire ( IdUtilisateur, Nom_Compte, Type_Compte, Provision_Compte, Devise_Compte) VALUES ( :idU, :NC, :TC, :PC, :DC) ');
            $req->execute( array( 'idU' => 3, 'NC' => $nom_compte, 'TC' => $type_compte, 'PC' => $provision_compte, 'DC' => $devise_compte ) );
          }else {
            echo "<script>
                    alert(\"Nombre de compte dépassé\");
                    window.location.href = '../addAccountHTML.php';
                  </script>";
          }
        }
      }
    }
  function h($text) { 
    return htmlspecialchars($text);
  }

  addAccountBank();

?>


<html>
  <link rel="stylesheet" html="../style/style.css">
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
</html>