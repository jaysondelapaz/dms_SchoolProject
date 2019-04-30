<?php 
session_start();

if($_SESSION['userlevel'] == 'Admin'):


require_once("api/function.php");

require_once("session.php");

require_once("header.php");

require_once("modal.php");

$s=new apiFunction;

$c=$s->today();

while($r = $c->fetch_object())

      {

         $currentDate=$r->cDate;

      }

?>

<style>

.menu{

	background-color:#FFA500;

}

a{

	color:#fff;

	text-decoration: none;



}

li{
	margin-right:30px;
}

</style>





<script>



function userList(){
	  $.ajax({

                  url:'api/userrole.ajax.php',

                  type:'POST',

                  data:{action:'UserList'},

                  success: function(response){

                      //console.log(response);

                      $(".result").show().html(response);

                      initiateTable();

                  }

     });

}



function get_userlist(){



  
//edit user command
  $.ajax({

                  url:'api/userrole.ajax.php',

                  type:'POST',

                  data:{action:'Readuserrole'},

                  success: function(response){

                      //console.log(response);

                      $(".result").show().html(response);

                      initiateTable();

                  }

     });

}


function saveAccess(){
$(document).ready(function(){

		var C_access = new Array();
		               $("input:checked").each(function() {
		                 C_access.push($(this).val());
		                });
		               
		              var Command = JSON.stringify(C_access);	
		              
		                
		            $.ajax({
					    url:"api/usercommand.ajax.php",  
		                method:"POST",  
		                data: { action:'AddCommand',
		                		user_id:$("#txtuserid").val(),
		                		userName:$("#txtusername").val(),
		                		userRole:$("#txtuserrole").val(),
                				cmdName:Command          		
                  		 },
             			success: function(data){ 
                         alert(data);
		                $('input:checkbox').removeAttr('checked');
		               }
           			});

	
});	
}

function saveUserDetails(){
	var upass = $("#txtupassword").val();
	if( upass==""){
		alert("Please fill the password field!");
		return false;
	}


					$.ajax({
					    url:"api/usercommand.ajax.php",  
		                method:"POST",  
		                data: { action:'UdatedUserDetails',
		                		uid:$("#txtuid").val(),
		                		fName:$("#txtfirstname").val(),
		                		lName:$("#txtlastname").val(),
		                		eMail:$("#txtemail").val(),
		                		userName:$("#txtuname").val(),
		                		uPasswd:upass,
                				         		
                  		 },
             			success: function(is){ 
                         alert(is);
		                 userList();	
		               }
           			});
	
}
</script>



<div class="container" style="border:1px solid #FFA500;">

 



  <div class="row">

<div class="col-md-4" style="margin-left:-16px;">



	<img class="responsive" src="icon/technoLogo.png" style="height: 78px;width:270px;margin-right: 130px;" />

	<h4 style="margin:0px 0px 0px 5px;">Document Management System</h4>

	</div>





 </div> <!-- end of row -->



 <div class="row">





		<div class="col-md-8 menu" style="background-color:#FFA500;float:right;padding-top: 5px;">

			<a href="home.php"> <span class="glyphicon glyphicon-file"></span>Documents</a>



			<a href="share.php" style="margin-left:50px;"> <span class="glyphicon glyphicon-share"></span>Share</a>



			<a href="folder.php" style="margin-left:50px;"><span class="glyphicon glyphicon-folder-close"></span> Folder</a>



      

  

	
	<?php include('api/userrole.php'); ?>

		<span class="glyphicon glyphicon-user" style="margin-left:50px;"><?php echo$_SESSION['username']; ?></span>

		<a href="logout.php" style="margin-left:50px;">logout</a>

		</div>



 </div> <!-- end of row -->

</div>

<div class="container headDiv" style="background-color:#FFA500;margin-top:10px;">

	



		<div class="row" style="padding:20px;">
			<nav class="navbar-nav">
				<ul  class="navbar-nav" style="list-style: none;display:inline;">
				<li><a href="#" id="userdisplay" onclick="userList();" style="text-decoration: none;">
						<h5><span class="glyphicon glyphicon-user"></span>Users</h5>
					</a>
				</li>

			
				<li><a href="#" id="userdisplay" onclick="get_userlist();" style="text-decoration: none;">
						<h5><span class="glyphicon glyphicon-cog"></span>Users Access</h5>
					</a>
				</li>

			</ul>
		</nav>

		</div>	





</div>

<!-- end of headDiv-->







<!-- Modal Folder -->

<div class="modal fade" id="userModal" data-keyboard="false" data-backdrop="static"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <h3 class="modal-title" id="exampleModalLabel">Edit user permission</h3>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="alert alert-info msg" role="alert" style="display:none;"></div>

      <form id="FormFolder" >

      <div class="modal-body">	 		
				<label for="folder">UserID</label><input type="text" class="form-control" name="txtuserid" id="txtuserid" disabled />
		       <label for="folder">Username</label><input type="text" class="form-control" name="txtusername" id="txtusername" disabled/>
		        
		        <label for="folder">UserRole</label>
		       

		       

				<div class="divCommand" style="display:none;"></div>
		       
		        

      </div>

      <div class="modal-footer">

     

        <button type="button" onclick="saveAccess();" id="saveFolder" class="btn btn-primary"> save</button>

      </div>

      	</form>	

    </div>

  </div>

</div>

<!--END OF MODAL-->



<div class="container result"  style="border:1px solid #FFA500; display:none;padding-top:5px;">



</div>



<?php require_once("footer.php"); ?>



<!-- Modal Folder -->

<div class="modal fade" id="userListModal" data-keyboard="false" data-backdrop="static"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <h3 class="modal-title" id="exampleModalLabel">Edit user details</h3>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="alert alert-info msg" role="alert" style="display:none;"></div>

      <form id="FormUser" >

      <div class="modal-body">	 		
				<label for="folder">UserID</label><input type="text" class="form-control" name="txtuid" id="txtuid" disabled />
				<label for="folder">Firstname</label><input type="text" class="form-control" name="txtfirstname" id="txtfirstname" />
				<label for="folder">Lastname</label><input type="text" class="form-control" name="txtlastname" id="txtlastname" />
				<label for="folder">Email</label><input type="text" class="form-control" name="txtemail" id="txtemail" />
		       <label for="folder">Username</label><input type="text" class="form-control" name="txtuname" id="txtuname" />
		       <label for="folder">Password</label><input type="text" class="form-control" name="txtupassword" id="txtupassword" required />	         
				
				<div class="userDiv"></div>
      </div>

      <div class="modal-footer">
	
     

        <button type="button" onclick="saveUserDetails();" id="saveupdateUser" class="btn btn-primary"> save</button>

      </div>

      	</form>	

    </div>

  </div>

</div>

<!--END OF MODAL-->

<?php
else:
header("Location: home.php");
endif;


?>