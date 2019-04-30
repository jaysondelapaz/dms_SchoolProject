<?php 

session_start();

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

</style>





<script>



$(document).ready(function(){

	$("#saveFolder").on('click', function(){

	//alert("hahay!");
	

		$.ajax({

			url:'api/folder.ajax.php',

			type:'POST',

			data:{crudname:'create', txtfoldername:$('#txtfoldername').val(	)},

			success: function(res){

				alert(res);

			}

		});

	});	





	//search

	$("#search").on('click', function(){

		//alert("a;sldf");

		$.ajax({

			url:'api/folder.ajax.php',

			type:'POST',

			data:{folder_Name:$("#txtfoldername").val(),crudname:'search'},

			success: function(res){

				//alert(res);

			$(".result").fadeIn(1000).html(res);

			}

		});

	});

function removes(id){

   if (!confirm('Are you sure you want to delete this file? ')) return false;

  var crudname ="Deletes";

  $.ajax({

      url:'api/folder.ajax2.php',

      type:'POST',

      data:{action:crudname,key:id},

      success: function(data){

        alert(data);

        //_search();

      }

  }); 

}



	

});



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

			<div class="col-md-2"></div>

			<div class="col-md-4">

				<span style="color:#fff;"> Date From : </span><input type="" value="<?php echo $currentDate; ?>" id="dateFrompicker"/>

			</div>

			



			<div class="col-md-4" >	

				<span style="color:#fff;">Date To :</span> <input type="" value="<?php echo $currentDate; ?>" id="dateTopicker" /></td>

			</div>	

			<div class="col-md-2"></div>



			<div class="col-md-4" style="margin-top:10px;margin-left: 190px;">

		        <span style="color:#fff;"> Folder Name : </span><input type="text" value="" id="fName"/>

		      </div>



		</div>



		<div class="row" style="margin-bottom:10px;">	

				<div class="col-md-5"></div>

				<div class="col-md-1" style="">

				<button class="btn"  id="search" >Search</button>

				</div>



				<div class="col-md-1" style="">

				<button id="Create" class="btn" data-toggle="modal" data-target="#DocumentModal">Create</button>

				</div>

				<div class="col-md-5"></div>

		</div>	





</div>

<!-- end of headDiv-->





<!-- Modal Folder -->

<div class="modal fade" id="DocumentModal" data-keyboard="false" data-backdrop="static"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLabel">Add folder</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="alert alert-info msg" role="alert" style="display:none;"></div>

      <form id="FormFolder" >

      <div class="modal-body">	 		

		       <label for="folder">Folder name</label><input type="text" class="form-control" name="txtfoldername" id="txtfoldername"/>

      </div>

      <div class="modal-footer">

     

        <button type="submit" id="saveFolder" class="btn btn-primary"> save</button>

      </div>

      	</form>	

    </div>

  </div>

</div>

<!--END OF MODAL-->







<div class="container result"  style="border:1px solid #FFA500; display:none;padding-top:5px;">



</div>



<?php require_once("footer.php"); ?>



