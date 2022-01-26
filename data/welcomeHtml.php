<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="../assets/style/styleWelcome.css"
    </head>

    <body>
        <header>
            <div class="header-container">
                <h2>Bank Helper</h2>
                <div class="container-user">
                    <?php
                        include_once './welcome.php';
                        if(isset($_SESSION['user_login']))
                            {?> 
                                <p>Hello, <?php echo $row['username'] ;
                            }
                    ?></p>
                    <nav>
                        <ul class="menu">
                            <li>
                                <i class="large material-icons">account_circle</i>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="../vendor/addAccountBank.php">ADD</a>
                                    </li>
                                    <li id="editBtn">EDIT</li>
                                    <li>
                                        <a href="../vendor/deleteAccountBank.php">DELETE</a>
                                    </li>
                                    <li>
                                        <a href="../data/welcomeHtml.php">Go back</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
            </div>
        </header>
            <a href="logout.php">Logout</a>

        </div>

    </body>
</html>