
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
    <link rel="stylesheet" href="../assets/style/styleCreateAccount.css">	
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
