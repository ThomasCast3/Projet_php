<?php
session_start();

require_once "../../vendor/connectMysql.php";
include_once "../html/createUserHtml.php";

if(isset($_SESSION["user_login"]))	//check condition user login not direct back to index.php page
{
	header("Location: ../vendor/html/welcomeHtml.php");
}


if(isset($_REQUEST['btn_register'])) //button name "btn_register"
{
  	$db = connectMysql();

	$username	= strip_tags($_REQUEST['txt_username']);	//textbox name "txt_email"
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
	else{	
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
					header("refresh:2; ../vendor/html/welcomeHtml.php");
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