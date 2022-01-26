<?php
session_start();

require_once "../vendor/connectMysql.php";

if(isset($_SESSION["user_login"]))	//check condition user login not direct back to index.php page
{
	header("location: welcome.php");
}


if(isset($_REQUEST['btn_register'])) //button name "btn_register"
{
  $db = connectMysql();

	$username		= strip_tags($_REQUEST['txt_username']);		//textbox name "txt_email"
	$email		= strip_tags($_REQUEST['txt_email']);		//textbox name "txt_email"
	$password	= strip_tags($_REQUEST['txt_password']);	//textbox name "txt_password"
		
  if(empty($username)){
    notifE('Please enter a username');//check username textbox not empty
	}
	else if(empty($email)){
    notifE('Please enter email');//check email textbox not empty 
	}
	else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    notifE('Please enter a valid email address');//check proper email format 
	}
	else if(empty($password)){
    notifE('Please enter password'); //check passowrd textbox not empty
	}
	else if(strlen($password) < 6){ 
    notifE('Password must be atleast 6 characters');//check passowrd must be 6 characters
	}
	else
	{	
		try
		{	
			$select_stmt=$db->prepare("SELECT * FROM Utilisateurs 
										WHERE email=:email OR username=:uname"); // sql select query
			
			$select_stmt->execute(array(':email'=>$email,':uname'=>$username)); //execute query 

      if( $select_stmt->rowCount() > 0 ) {
        notifE('Email or username already taken');
      }
			else if(!isset($errorMsg)) //check no "$errorMsg" show then continue
			{
				$new_password = password_hash($password, PASSWORD_DEFAULT); //hash the password using password_hash()
				
				$insert_stmt=$db->prepare('INSERT INTO Utilisateurs (email,password,username) VALUES
																(:email,:password,:username)'); 		//sql insert query					
				
				if($insert_stmt->execute(array(':email'	=>$email, ':password'=>$new_password, ':username'=>$username))){
          $_SESSION["user_login"] = $db->lastInsertId();	//session name is "user_login"
          notifC('Register Successfully...');
          //header("refresh:2; welcome.php");			//refresh 2 second after redirect to "welcome.php" page
        }
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
    <link rel="stylesheet" href="../style/styleCreateAccount.css">	
  </head>

	<body>
    <header>
      <div class="header-container">
        <h2>Create Your Account</h2>
      </div>
    </header>

		
		<div class="container">
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
  
      <form method="post" class="form-horizontal">

        <div class="form-group">
          <label class="label">Username</label>
          <input type="text" name="txt_username" class="form-control" placeholder="enter username" />
				</div>
          
        <div class="form-group">
          <label class="label">Email</label>
          <input type="text" name="txt_email" class="form-control" placeholder="enter email" />
        </div>
          
        <div class="form-group">
        <label class="label">Password</label>
          <input type="password" name="txt_password" class="form-control" placeholder="enter passowrd" />
        </div>
          
        <div class="form-group">
          <input type="submit"  name="btn_register" class="btn btn-primary " value="Register">
        </div>
        
        <div class="form-group">
          You have a account register here? <a href="login.php">
          <p class="text-info">Login Account</p></a>		
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
</script>
