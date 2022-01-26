<?php

require_once "../vendor/connectMysql.php";

session_start();

if(isset($_SESSION["user_login"]))	//check condition user login not direct back to index.php page
{
	header("location: welcome.php");
}

if(isset($_REQUEST['btn_login']))	//button name is "btn_login" 

{
   $db = connectMysql();

	$email		=strip_tags($_REQUEST["txt_username_email"]);	//textbox name "txt_username_email"
	$password	=strip_tags($_REQUEST["txt_password"]);			//textbox name "txt_password"
		
   if(empty($email)){
      notifE('please enter username or email'); //check "username/email" textbox not empty 
	}
	else if(empty($password)){
      notifE('please enter password'); //check "passoword" textbox not empty 
	}
	else
	{
		try
		{
			$select_stmt=$db->prepare("SELECT * FROM Utilisateurs WHERE email=:email"); //sql select query
			$select_stmt->execute(array(':email'=>$email));	//execute query with bind parameter
			$row=$select_stmt->fetch(PDO::FETCH_ASSOC);
			
			if($select_stmt->rowCount() > 0)	//check condition database record greater zero after continue
			{
				if($email==$row["email"]) //check condition user taypable "username or email" are both match from database "username or email" after continue
				{
					if(password_verify($password, $row["password"])) //check condition user taypable "password" are match from database "password" using password_verify() after continue
					{
						$_SESSION["user_login"] = $row["IdUtilisateur"];	//session name is "user_login"
                  notifC('Successfully Login...');
						header("refresh:2; welcome.php");			//refresh 2 second after redirect to "welcome.php" page
					}
					else
					{
                  notifE('wrong password');
					}
				}
				else
				{
               notifE('wrong username or email');
				}
			}
			else
			{
            notifE('wrong username or email');
			}
		}
		catch(PDOException $e)
		{
			$e->getMessage();
		}		
	}
}
?>

<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
   <link rel="stylesheet" href="../style/styleLogin.css"

</head>

		<?php
      function notifE($text)
		{?>
         <div id="notification_container">
            <div class="content">
               <p><?php echo $text ?></p>
            </div>
         </div>
         <?php
			}
		
         function notifC($text)
         {?>
            <div id="notification_container">
               <div class="content_notif_correct">
                  <p><?php echo $text ?></p>
               </div>
            </div>
            <?php
            }
         ?> 

	<body>
   
      <header>
         <div class="header-container">
         <h2>Login Your Account</h2>
         </div>
      </header>

	
      <div class="container">

         <form method="post" class="form-horizontal">
               
            <div class="form-group">
               <label class="label">Email</label>
               <input type="text" name="txt_username_email" class="form-control" placeholder="enter username or email" />
            </div>
               
            <div class="form-group">
               <label class="label">Password</label>
               <input type="password" name="txt_password" class="form-control" placeholder="enter passowrd" />
            </div>
            
            <div class="form-group">
               <input type="submit" name="btn_login" class="btn btn-success" value="Login">
            </div>

            
            <div class="form-group">
               You don't have a account register here? 
               <a href="createAccount.php"><p class="text-info">Register Account</p></a>		
            </div>  
         </form>

      </div>
	</body>
</html>

<script>
  // Add a timer to supress our notifications after 3 seconds
  setTimeout(function () {
        document.querySelector('#notification_container .content').remove();
    }, 3000);

    setTimeout(function () {
        document.querySelector('#notification_container .content_notif_correct').remove();
    }, 3000);
</script>