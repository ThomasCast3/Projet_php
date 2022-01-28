<html> 

  <!doctype html>
  <html lang="fr">

  <head>
    <meta charset="utf-8">
    <title>Little Accountant</title>
    <link rel="stylesheet" href="./assets/style/style.css">
    <?php include('./vendor/addAccountBank.php') ?>
  </head>

  <body>
    <header>
      <div class="header-container">
        <h2 id="easterEgg">Create Bank Account</h2>
      </div>
    </header>

    <form method="POST">
      <p>Acount's name : <input type="text" name="nom_compte" /></p>

      <p>Account's type :
        <select name="type_compte">
          <option value="courant">Current</option>
          <option value="epargne">Savings</option>
          <option value="compte joint">joint account</option>
        </select>
      </p>

      <p>Account's provision : <input type="number" name="provision_compte" /></p>

      <p>Account's currency :
        <select name="devise_compte">
          <option value="EUR">€ EUR</option>
          <option value="USD">$ USD</option>
        </select>
      </p>

      <p><input type="submit" name="submitForm" value="OK"></p>
    </form>

    <script src="./assets/js/addAccountBank.js"></script>
  </body>
</html>