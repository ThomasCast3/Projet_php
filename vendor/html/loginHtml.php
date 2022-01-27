<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
   <link rel="stylesheet" href="../../assets/style/styleLogin.css"

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
               <a href="../html/createUserHtml.php"><p class="text-info">Register Account</p></a>		
            </div>  
         </form>

      </div>
	   </body>
      
      <script src="../../assets/js/accountManagement.js"></script>

</html>