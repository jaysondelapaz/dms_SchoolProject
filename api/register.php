<?php
require_once('function.php');
$crudname = isset($_POST['crudname'])?$_POST['crudname']:'';

if($crudname=='create')
{
	 $firstname =$_POST['firstname'];
	 $lastname=$_POST['lastname'];
	 $email =$_POST['email'];
	 $username=$_POST['uname'];
	 $pwd = md5($_POST['pwd']);


	$a= new apiFunction;
	$value ="null".","."'$firstname'".","."'$lastname'".","."'$email'".","."'$username'".","."'$pwd'";
	$CheckUser = $a->CheckUserExist($username);
	if($CheckUser->num_rows>0){
		echo"username exist!";
	}else{
		$CheckEmail = $a->CheckEmail($email);
		if($CheckEmail->num_rows>0){
			echo"email exist!";
		}else{
			$a->PublicInsert("user_table",$value);
			$getlastrowID = $a->customQeury("SELECT user_id FROM user_table ORDER BY user_id DESC LIMIT 1");
			while($lastID = $getlastrowID->fetch_object()){
				 
				 $insertrole = $a->customQeury("INSERT INTO urole_table VALUES('".$lastID->user_id."','$username','User')");
			}
			if($a){
				echo"success";
			}else{
				echo"failed!";
			}	
		}
	}
}

?>