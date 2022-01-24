<!doctype html>
<html lang="fr">
    <head>
      <meta charset="utf-8">
      <title>Formulaire</title>
      <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <form action="PHP.php" method="GET">
            <p>Votre nom de compte : <input type="text" name="nom" /></p>
            
            <p>Votre type de compte :
                <select name="type" >
                  <option value="courant">Courant</option>
                  <option value="epargne">Épargne</option>
                  <option value="compte joint">Compte Joint</option>
                </select>
            </p>

            <p>Votre provision : <input type="number" name="provision" /></p>

            <p>Votre devise : 
              <select name="devise" >
                <option value="EUR">€ EUR</option>
                <option value="USD">$ USD</option>
              </select>
            </p>
            
            <p><input type="submit" name="submitForm" value="OK"></p>
        </form>

    </body>
</html>