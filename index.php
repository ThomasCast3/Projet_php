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

    <div>
      <p>Choose an option :
        <select name="choix_option">
          <option id="addAccount">Add an account</option>
          <option id="editAccount">Edit an account</option>
          <option id="deleteAccount">Delete an account</option>
        </select>
      </p>
    </div>
    
    <!-- <div>
      <ul>
        <li>
          <a>
            Option :
          </a>
          <ul>
            <li>
              <a>
                Add an account
              </a>
            </li>
            <li>
              <a>
                Edit an account
              </a>
            </li>
            <li>
              <a>
                Delete an account
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </div> -->

  </body>
</html>

<script>
document.getElementById("easterEgg").addEventListener('click', function(event) {
    window.open('./easterEgg/easterEgg.html');
})
</script>