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
    <title>Formulaire</title>
    <link rel="stylesheet" href="./style/style.css">
  </head>

  <body>
    <header>
      <div class="header-container">
        <h2>Mon Compte Helper</h2>
      </div>
    </header>

    <div>
        <h2>mes comptes</h2>
<a href="PHP.php">add account</a>
<p >séléctionner un compte :
<select id="menuDeroulan" name="type_compte">
    <?php foreach( ListCompte( 3 ) as $Compte ): ?>   <!--creer une boucle for sur la fonction listCompte pour l'utilisateur 3 -->

        <option value="<?= $Compte['IdCompte']; ?>"><?= $Compte['Nom_Compte']; ?></option>  <!-- creer un option dans select avec l'id du compte et afficher son nom -->

    <?php endforeach; ?>  <!--  fin boucle for -->
</select>
 </p>


</div>

<script>
<?php echo "var jsvar = '$nomCompte' ;" ?>
console.log(jsvar);
</script>


  </body>
</html>