<?php
session_start();
require_once('function.php');
$s=new apiFunction;
$c=$s->today();
while($r = $c->fetch_object())
      {
         $currentDate=$r->cDate;
      }

$action = isset($_POST['action']) ? $_POST['action']:'';

if($action=='getcommand'){

	$get_userrole = $s->customQeury("SELECT user_level FROM urole_table WHERE user_id='".$_POST['userID']."'");
	echo'<select name="txtuserrole" id="txtuserrole">';
	while($u=$get_userrole->fetch_object()){
		if($u->user_level =='Admin'){
			echo'<option value="'.$u->user_level.'" selected>'.$u->user_level.'</option>';
			echo'<option value="User">User</option>';
		}

		if($u->user_level =='User'){
			echo'<option value="'.$u->user_level.'" selected>'.$u->user_level.'</option>';
			echo'<option value="Admin">Admin</option>';
		}
	}
	echo'</select>';


	echo"<h3>User Command</h3>";
	$download=$s->customQeury("SELECT cmd_name FROM command_table WHERE  user_id='".$_POST['userID']."' AND cmd_name='DOWNLOAD'");
						if($download->num_rows > 0){
							echo'<input type="checkbox" value="DOWNLOAD" name="chkCommand[]" id="chkCommand" checked /> DOWNLOAD &nbsp; &nbsp; &nbsp; ';
						}else{
							echo'<input type="checkbox" value="DOWNLOAD" name="chkCommand[]" id="chkCommand"/> DOWNLOAD &nbsp; &nbsp; &nbsp; ';
						}


	$del=$s->customQeury("SELECT cmd_name FROM command_table WHERE user_id='".$_POST['userID']."' AND cmd_name='DELETE'");
						if($del->num_rows > 0){
							echo'<input type="checkbox" value="DELETE" name="chkCommand[]" id="chkCommand" checked /> DELETE &nbsp; &nbsp; &nbsp;';
						}else{
							echo'<input type="checkbox" value="DELETE" name="chkCommand[]" id="chkCommand"/> DELETE &nbsp; &nbsp; &nbsp;';
						}
					


						$cmdfolder=$s->customQeury("SELECT cmd_name FROM command_table WHERE user_id='".$_POST['userID']."' AND  cmd_name='FOLDER'");
						if($cmdfolder->num_rows > 0){
							echo'<input type="checkbox" value="FOLDER" name="chkCommand[]" id="chkCommand" checked /> FOLDER &nbsp; &nbsp; &nbsp; ';
						}else{
							echo'<input type="checkbox" value="FOLDER" name="chkCommand[]" id="chkCommand"/> FOLDER &nbsp; &nbsp; &nbsp; ';
						}

}	


if($action == 'AddCommand'){
	$Command=json_decode($_POST['cmdName']);

	//delete cmd access first
	$d = $s->customQeury("DELETE FROM command_table WHERE user_id='".$_POST['user_id']."'");
	
	//update user role
	$u = $s->customQeury("UPDATE urole_table SET user_name='".$_POST['userName']."',user_level='".$_POST['userRole']."' WHERE user_id='".$_POST['user_id']."'");
	
	
	foreach ($Command as $key => $cmd ) {
                       if($cmd==""):
                        echo"all SubModule Acess was removed!";
                		endif;
                    $insertcmd_download = $s->customQeury("INSERT INTO command_table VALUES('".$_POST['user_id']."','".$_POST['userName']."','$cmd')");
    			                
    }

    echo"success";

}


// if($action =='EditUser'){
// 	$userDetails = $s->customQeury("SELECT * FROM user_table WHERE user_id='".$_POST['userID']."'");

// 	while($z=$userDetails->fetch_object()){
// 		// echo $z->user_id;
// 		// echo $z->FirstName;
// 		// echo $z->LastName;
// 		// echo $z->user_email;
// 		// echo $z->user_name;
	
// 		echo'<label for="folder">Passwords</label><input type="password" class="form-control" value="'.$z->user_password.'" name="txtupassword" id="txtupassword" />';

// 	}
// }

if($action == 'UdatedUserDetails'){
	   
	$u = $s->customQeury("UPDATE user_table SET FirstName='".$_POST['fName']."',LastName='".$_POST['lName']."',user_email='".$_POST['eMail']."', user_name='".$_POST['userName']."',user_password='".md5($_POST['uPasswd'])."' WHERE user_id='".$_POST['uid']."'"); 
	$userRoleUpdate = $s->customQeury("UPDATE urole_table SET user_name='".$_POST['userName']."' WHERE user_id='".$_POST['uid']."'");  

	if($u){
		echo "Success";
	}      		
}


if($action=='Delete_User'){
	
	$udeleteUser = $s->customQeury("DELETE FROM user_table WHERE user_id='".$_POST['userId']."'");
	$udeleteUserRole = $s->customQeury("DELETE FROM urole_table WHERE user_id='".$_POST['userId']."'");
	echo"success";

}
?>