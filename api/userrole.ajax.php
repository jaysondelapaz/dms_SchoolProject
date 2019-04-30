<!-- <script src="js/jquery-3.1.1.js"></script>
 --><script>

$(document).ready(function(){


	$(".edit").click(function(){

		  	var $td= $(this).closest("tr").children(":eq(0)"); //get the TR's first TD
		  	var user_id = $td.text(); //get the required value in id td
		  	var $td1= $(this).closest("tr").children(":eq(01)"); //get usernae in table td
		  	var username = $td1.text(); //get the required value in id td		 
		 	var $td2= $(this).closest("tr").children(":eq(02)"); //get user role in table td
		  	var user_role = $td2.text(); //get the required value in id td
		 	//alert(user_id+username+user_role);

		 	$.ajax({
		 			url:'api/usercommand.ajax.php',
		 			type:'POST',
		 			data:{action:'getcommand',userID:user_id},
		 			success:function(g){
		 				//alert(user_id);
		 				$("#txtuserid").val(user_id);
					 	$("#txtusername").val(username);
					 	$("#txtuserrole").val(user_role);	
					 	$(".divCommand").show().html(g);
		 			}
		 	}) ;

	});


	 //edit user details
	$(".edituser").click(function(){

		  	var $td= $(this).closest("tr").children(":eq(0)"); //get the TR's first TD
		  	var user_id = $td.text(); //get the required value in id td
		  	var $td1= $(this).closest("tr").children(":eq(01)"); //get usernae in table td
		  	var fname = $td1.text(); //get the required value in id td		 
		 	var $td2= $(this).closest("tr").children(":eq(02)"); //get user role in table td
		  	var ulname = $td2.text(); //get the required value in id td
		 	var $td3= $(this).closest("tr").children(":eq(03)"); //get user role in table td
		  	var uemail = $td3.text();
		  	var $td4= $(this).closest("tr").children(":eq(04)"); //get user role in table td
		  	var uname = $td4.text();
		  	

		  				$("#txtuid").val(user_id);
		 				$("#txtfirstname").val(fname);
		 				$("#txtlastname").val(ulname);
		 				$("#txtemail").val(uemail);
					 	$("#txtuname").val(uname);
					 	$("#txtupassword").val("");		 
		 	
	});


	//delete user
	$(".deleteUser").click(function(){
		if (!confirm('Are you sure you want to delete this user? ')) return false;
		  	var $td= $(this).closest("tr").children(":eq(0)"); //get the TR's first TD
		  	var user_id = $td.text(); //get the required value in id td
		  	
		 	$.ajax({
		 			url:'api/usercommand.ajax.php',
		 			type:'POST',
		 			data:{action:'Delete_User',userId:user_id},
		 			success:function(rs){
		 				alert(rs);
		 				userList();
		 			}
		 	}) ;

	});


});	
</script>	
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

if($action=='Readuserrole'){
?>


<table id="Mytable" class="display" cellspacing="0" width="100%">
<h3>Edit user role and command</h3>
	<thead>
	<tr>
			<th>userID</th>
			<th>Username</th>
			<th>User_level</th>
			<th>action</th>
	</tr>
	</thead>

	<tbody>

<?php		
	$selectUser = $s->customQeury("SELECT user.user_id as user_id, user.user_name as user_name, role.user_level as user_level FROM user_table as user LEFT JOIN urole_table as role ON user.user_id = role.user_id ");
	while($row=$selectUser->fetch_object()){
		echo'
				<tr>
					<td>'.$row->user_id.'</td>
					<td>'.$row->user_name.'</td>
					<td>'.$row->user_level.'</td>
					<td><button class="btn edit" data-toggle="modal" data-target="#userModal"><span class="glyphicon glyphicon-edit"></span></button></td>
				</tr>
		';
	}
?>



	</tbody>
	</table>	

<?php

}

?>


<?php
if($action=='UserList'){

	?>


	<table id="Mytable" class="display" cellspacing="0" width="100%">
	<h3>Edit user details</h3>
	<thead>
	<tr>
			<th>userID</th>
			<th>Firstname</th>
			<th>Lastname</th>
			<th>Email</th>
			<th>Username</th>
			<th>Password</th>
			<th>action</th>
	</tr>
	</thead>

	<tbody>

<?php		
	$selectUserlist = $s->customQeury("SELECT * FROM user_table ");
	while($rows=$selectUserlist->fetch_object()){
		echo'
				<tr>
					<td>'.$rows->user_id.'</td>
					<td>'.$rows->FirstName.'</td>
					<td>'.$rows->LastName.'</td>
					<td>'.$rows->user_email.'</td>
					<td>'.$rows->user_name.'</td>
					<td>'.$rows->user_password.'</td>
					<td>
					<button class="btn edituser" data-toggle="modal" data-target="#userListModal"><span class="glyphicon glyphicon-edit"></span></button>
						
						<button class="btn deleteUser"><span class="glyphicon glyphicon-trash"></span></button>

					</td>
				</tr>
		';
	}
?>


<?php

}
?>
</tbody>
</table>