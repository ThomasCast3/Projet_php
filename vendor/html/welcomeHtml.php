<html> 

  <!doctype html>
  <html lang="fr">

  <head>
    <meta charset="utf-8">
    <title>Little Accountant</title>
    <link rel="stylesheet" href="../../assets//style/style.css">
    <?php include('../../vendor/accountManagement.php') ?>
    <?php include('../../vendor/php/operation.php') ?>

  </head>

  <body>
    <header>
      <div class="header-container">
        <h2 id="easterEgg">Bank Account Management</h2>
      </div>
    </header>

    <p>Select a Bank Account :
      <select id="menuDeroulan" name="type_compte">
        <option value="">-- Bank Account --</option>
          <?php 
              $idUser = $_SESSION['user_login'];
              foreach( ListCompte( $idUser ) as $Compte ): ?>   <!--creer une boucle for sur la fonction listCompte pour l'utilisateur 3 -->
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
              <a href="../../addAccountBankHtml.php">
                ADD
              </a>
            </li>
            <li id="editBtn">
                EDIT
            </li>
            <li>
              <form id="deleteAccountForm" method="POST" action="../../vendor/deleteAccountBank.php">
                <input type="hidden" name="IdCompte" />
                <input type="submit" value="DELETE" />
              </form>
            </li>
          </ul>
        </li>
      </ul>
    </nav>

    <div id="editInfoCompte">
      <form method="POST" >
        <input type="hidden" name="IdCompte"/>

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

        <p><input type="submit" name="submitFormEdit" value="OK"></p>
      </form>
    </div>
    <a href="../php/logout.php">Logout</a>

    <!-- *************   OPERATION   ************* -->

    <div>

      

      <form method="POST" action="../php/addOperation.php" id="addOperation">
          <input type="hidden" name="IdCompte" />

        <p>Operation's name : <input type="text" name="NomOperation" /></p>

        <p>Type of operation :
          <select name="IdCategorie">
            <option value="1">Alimentaire</option>
            <option value="2">Vestimentaire</option>
            <option value="3">Loisir</option>
            <option value="4">Transport</option>
            <option value="5">Logement</option>
            <option value="6">Autre</option>
            <option value="7">Virement</option>
            <option value="8">Depot</option>
            <option value="9">Salaire</option>
            <option value="10">Autre</option>
          </select>
        </p>

        <p>transaction amount : <input type="number" name="MontantOperation" /> </p>

        <p>Operation's date : <input type="date" name="DateOperation" /> </p>

        <p><input type="submit" name="submitFormOperation" value="OK"></p>


      </form>

      <button id="editOperationBtn"> EDIT </button>
      
    </div>

      
      

    <div id="editInfoOperation">
      <form method="POST" >
        <input type="hidden" name="IdCompte"/>

        <p>Operation's name : <input type="text" name="NomOperation" /></p>

        <p>Type of operation :
          <select name="IdCategorie">
            <option value="1">Alimentaire</option>
            <option value="2">Vestimentaire</option>
            <option value="3">Loisir</option>
            <option value="4">Transport</option>
            <option value="5">Logement</option>
            <option value="6">Autre</option>
            <option value="7">Virement</option>
            <option value="8">Depot</option>
            <option value="9">Salaire</option>
            <option value="10">Autre</option>
          </select>
        </p>

        <p>transaction amount : <input type="number" name="MontantOperation" /> </p>

        <p>Operation's date : <input type="date" name="DateOperation" /> </p>

        <p><input type="submit" name="submitFormOperation" value="OK"></p>
      </form>

      <form id="deleteAccountForm" method="POST" action="../../vendor/deleteAccountBank.php">
        <input type="hidden" name="IdCompte" />
        <input type="submit" value="DELETE" />
      </form>
    </div>

    <script src="../../assets/js/accountManagement.js"></script>

  </body>
</html>