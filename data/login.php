<?php

require_once "../vendor/connectMysql.php";
include_once './loginHtml.php';
session_start();

if(isset($_SESSION["user_login"]))	//check condition user login not direct back to index.php page
{
	header("location: welcomeHtml.php");
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
						header("refresh:2; welcomeHtml.php");			//refresh 2 second after redirect to "welcome.php" page
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