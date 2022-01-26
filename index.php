<?php
require_once('./vendor/connectMysql.php');

function ListCompte( $idUtilisateur ) {
    $db = connectMysql();  //connection BDD
    $req = $db->prepare('SELECT * FROM CompteBancaire WHERE IdUtilisateur = ?');  //prepare requete recuperer les compte d'un utilisateur
    $req->execute( array( $idUtilisateur ) );  //executer la req 

    return $req->fetchAll();  // retourner le resulta sous forme de tableau
}

?>

<html> 

  <!doctype html>
  <html lang="fr">

  <head>
    <meta charset="utf-8">
    <title>Little Accountant</title>
    <link rel="stylesheet" href="./style/style.css">
  </head>

  <body>
    <header>
      <div class="header-container">
        <h2 id="easterEgg">Create Bank Account</h2>
      </div>
    </header>

    <p>Select a Bank Account :
      <select id="menuDeroulan" name="type_compte">
          <?php foreach( ListCompte( 3 ) as $Compte ): ?>   <!--creer une boucle for sur la fonction listCompte pour l'utilisateur 3 -->

              <option value="<?= $Compte['IdCompte']; ?>"><?= $Compte['Nom_Compte']; ?></option>  <!-- creer un option dans select avec l'id du compte et afficher son nom -->

          <?php endforeach; ?>  <!--  fin boucle for -->
      </select>
    </p>


    <nav>
      <ul class="menu">
        <li>
          OPTIONS
          <ul class="sub-menu">
            <li>
              <a href="addAccountHTML.php">
                ADD
              </a>
            </li>
            <li>
              <a href="editAccountHTML.php">
                EDIT
              </a>
            </li>
            <li>
              <a href="./vendor/deleteAccount.php">
                DELETE
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>

    
  </body>
</html>

<script>
document.getElementById("easterEgg").addEventListener('click', function(event) {
    window.open('./easterEgg/easterEgg.html');
})
</script>