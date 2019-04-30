<?php
session_start();

require_once('function.php');

$s=new apiFunction;

$c=$s->today();

while($r = $c->fetch_object())

      {

         $currentDate=$r->cDate;

      }





$action = isset($_POST['crudname']) ? $_POST['crudname']:'';

if($action == 'create'){

	$folder = $_POST['txtfoldername'];

	$user_id = $_SESSION['userid'];

	$value="null".","."'$folder'".","."'$user_id'";

	$insert= $s->PublicInsert('folder_table',$value);

	if($insert)

	{

		echo"success";

	}else

	{

		echo"error: ";

	}

}




if($action == 'search')

{

?>



<!-- folder function -->

<script >

	$(document).ready(function(){

		

	});



	function searchFolderContent(id){

		//alert(id+FName);

		$.ajax({

			url:'api/folder.ajax2.php',

			type:'POST',

			data:{ids:id,action:'findContent'},

			success: function(datatxt){

				//alert(datatxt);

				$(".result").show().html(datatxt);

                      initiateTable();

			}

		});



	}

</script>

<?php

	$fname = trim($_POST['folder_Name']);	

	$get =$s->SearchUserFolder($_SESSION['userid'],$fname);

	if($get->num_rows>0):

		while($ado=$get->fetch_object()){

			

?>			

			<div class="col-md-2" style="padding:15px;">

				<a href="api/deletefolder.ajax.php?id=<?php echo $ado->folderID;?>" style="text-decoration:none;color:#0000;"><span class="glyphicon glyphicon-remove" style="color:#000;margin-right:65px;float:right;border:1px solid black;border-radius:3px 3px;"></span></a>

				<a href="#" onclick="searchFolderContent('<?php echo$ado->folderID; ?>');" class="folders" style="text-decoration:none;color:blue;display:inline;">

					<img src="icon/folder-icon.png"> 
					 <br /> &nbsp;&nbsp; <?php echo$ado->folderName; ?> </a> 

			</div> 



<?php		}


	else:

	echo"no data";

	endif;	

}







?>