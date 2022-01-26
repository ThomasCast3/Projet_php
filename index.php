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
          <?php foreach( ListCompte( 65 ) as $Compte ): ?>   <!--creer une boucle for sur la fonction listCompte pour l'utilisateur 3 -->

              <option data-full='<?=json_encode($Compte); ?>' value="<?= $Compte['IdCompte']; ?>"><?= $Compte['Nom_Compte']; ?></option>  <!-- creer un option dans select avec l'id du compte et afficher son nom -->

          <?php endforeach; ?>  <!--  fin boucle for -->
      </select>
    </p>


    <nav>
      <ul class="menu">
        <li>
          OPTIONS
          <ul class="sub-menu">
            <li>
              <a href="./vendor/addAccountBank.php">
                ADD
              </a>
            </li>
            <li id="editBtn">
                EDIT
            </li>
            <li>
              <a href="./vendor/deleteAccountBank.php">
                DELETE
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>

    <div id="editInfoCompte">
      <form method="POST">
        <p>Votre nom de compte : <input type="text" name="Nom_Compte" id="NomDeCompte"/></p>

        <p>Votre type de compte :

          <select name="Type_Compte" id="Type_Compte">
            <option value="courant">Courant</option>
            <option value="epargne">Épargne</option>
            <option value="compte joint">Compte Joint</option>
          </select>
        </p>

        <p>Votre provision : <input type="number" name="Provision_Compte" id="ProvisionDeCompte"/></p>

        <p>Votre devise :
          <select name="Devise_Compte">
            <option value="EUR">€ EUR</option>
            <option value="USD">$ USD</option>
          </select>
        </p>

        <p><input type="submit" name="submitForm" value="OK"></p>
      </form>
    </div>
  
    
  </body>
</html>

<script>
  document.getElementById("easterEgg").addEventListener('click', function(event) {
      window.open('./easterEgg/easterEgg.html');
  })

  var selectCompte = document.getElementById( 'menuDeroulan' );

  selectCompte.addEventListener('change',(event)=> {
    let item      = event.target;
    let data      = item.options[item.selectedIndex];
    let fullData  = JSON.parse( data.getAttribute( 'data-full' ) );

    // Pre fill all inputs
    let inputs    = document.querySelectorAll( '#editInfoCompte input, #editInfoCompte select' );
    
    inputs.forEach( function( item, i ) {
      if( item.getAttribute( 'type' ) != 'submit' ) {
        let name = item.getAttribute( 'name' );

        item.value = fullData[name];
      }
    });

    // console.log(fullData.Nom_Compte);

    //var monNomCompte = fullData.Nom_Compte;
    //document.getElementById('NomDeCompte').setAttribute('value',monNomCompte);

    // var typeCompte = fullData.Type_Compte;
    // document.getElementById('').setAttribute('value',typeCompte);

    // var maProvision = fullData.Provision_Compte;
    // document.getElementById('ProvisionDeCompte').setAttribute('value',maProvision);

    // document.getElementById( 'type_compte' ).value = fullData.Type_Compte;

    // var deviseCompte = fullData.Devise_Compte;
    // document.getElementById('').setAttribute('value',deviseCompte);

  });

  let item = document.getElementById( 'editBtn' );

  item.addEventListener( 'click', function() {
      let body = document.getElementsByTagName( 'body' )[0];

      body.classList.toggle( 'editPage' );
  })
      
</script>