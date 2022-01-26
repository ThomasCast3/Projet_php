<html> 

  <!doctype html>
  <html lang="fr">

  <head>
    <meta charset="utf-8">
    <title>Little Accountant</title>
    <link rel="stylesheet" href="./assets/style/style.css">
    <?php include('./vendor/accountManagement.php') ?>
  </head>

  <body>
    <header>
      <div class="header-container">
        <h2 id="easterEgg">Create Bank Account</h2>
      </div>
    </header>

    <p>Select a Bank Account :
      <select id="menuDeroulan" name="type_compte">
        <option value="">-- Bank Account --</option>
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
              <a href="./addAccountBankHTML.php">
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
  
    <script src="./assets/js/accountManagement.js"></script>

  </body>
</html>