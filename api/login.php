<?php
session_start();
require_once('function.php');
$crudname = isset($_POST['crudname'])?$_POST['crudname']:'';

$a = new apiFunction;

if($crudname=='isLogin')
{
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	$login = $a->isLogin($username,$password);
	if($login->num_rows>0)
	{
		while($r = $login->fetch_object())
		{
			 $username= $r->user_name;
			 $uid = $r->user_id;
			 $_SESSION['username'] = $username;
			 $_SESSION['userid'] = $uid;

			 //get user role
			 $role = $a->customQeury("SELECT user_level FROM urole_table WHERE user_id='". $_SESSION['userid']."'");
			 while($u = $role->fetch_object())
			 {
			 	$Urole = $u->user_level;
			 	 $_SESSION['userlevel'] = $Urole;
			 }
			
			echo"<script> alert('success'); window.open('../home.php', '_parent');</script>";
		//header('Location: http://www.conn.com/');
			//header("Refresh:0.5;url=../brisktopia.com/7XKm");
			
		}		
		
	}
	else 
	{
		echo"<script> alert('Invalid username and password'); window.open('../index.php', '_parent'); </script>";
		//header("Refresh:1;url=../index.php");
	//header("Location: http://youtube.com");
	}	
		
}

?>