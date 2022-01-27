<html> 

  <!doctype html>
  <html lang="fr">

  <head>
    <meta charset="utf-8">
    <title>Little Accountant</title>
    <link rel="stylesheet" href="../../assets//style/style.css">
    <?php include('../php/addOperation.php') ?>
  </head>

  <body>
      
    <header>
      <div class="header-container">
        <h2 id="easterEgg">Create Operation</h2>
      </div>
    </header>

    <form method="POST">
        <input type="hidden" name="IdCompte" />

      <p>Operation's name : <input type="text" name="NomOperation" /></p>

      <p>Type of operation :
        <select name="name">
          <option value="alimentaire">Alimentaire</option>
          <option value="vestimentaire">Vestimentaire</option>
          <option value="loisir">Loisir</option>
          <option value="transport">Transport</option>
          <option value="logement">Logement</option>
          <option value="autre1">Autre</option>
          <option value="virement">Virement</option>
          <option value="depot">Depot</option>
          <option value="salaire">Salaire</option>
          <option value="autre2">Autre</option>
        </select>
      </p>

      <p>transaction amount : <input type="number" name="MontantOperation" /> </p>

      <p>Operation's date : <input type="date" name="DateOperation" /> </p>

      <p><input type="submit" name="submitFormOperation" value="OK"></p>
    </form>

    <!-- <script src="./assets/js/accountManagement.js"></script> -->
  </body>
</html>