<html> 

  <!doctype html>
  <html lang="fr">

  <head>
    <meta charset="utf-8">
    <title>Little Accountant</title>
    <link rel="stylesheet" href="../style/style.css">
  </head>

  <body>
    <header>
      <div class="header-container">
        <h2>Edit Bank Account</h2>
      </div>
    </header>

    <form action="./vendor/addAccountPHP.php" method="POST">
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

      <p><input action="./vendor/addAccountPHP.php" type="submit" name="submitForm" value="OK"></p>
    </form>

  </body>
</html>

<script>
  var selectCompte = document.getElementById( 'menuDeroulan' );

  selectCompte.addEventListener('change',(event)=> {
    let item      = event.target;
    let data      = item.options[item.selectedIndex];
    let fullData  = JSON.parse( data.getAttribute( 'data-full' ) );

    console.log( fullData.Nom_Compte );
    //let data = this.querySelector(':checked').getAttribute('data-full')
    //alert( data );
  });
</script>