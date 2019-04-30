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



a{

	color:#fff;

	text-decoration: none;



}

</style>





<script>





//upload

$(document).ready(function (e) {

  $("#Form").on('submit',(function(e) { 

    e.preventDefault();

    $.ajax({

      url: "api/document.ajax.php",

      type: "POST",

      data:  new FormData(this),

      contentType: false,

      cache: false,

      processData:false,

      success: function(data)

        { 

          successMsg(data);

          $("#imgpreview").attr("src","");

          $("#Form")[0].reset();

          _search();

          //console.log(data);    

        },

        error: function() 

        {

          console.log("ERROR!:"+data);

        }           

     });

  }));

});





//preview

function readURL(input) {

        if (input.files && input.files[0]) {

                var reader = new FileReader();

                reader.onload = function (e) {

                    $('#imgpreview')

                        .attr('src', e.target.result);       

                };



                reader.readAsDataURL(input.files[0]);

            }

}





//search

function _search(){

            var crudname="search";

            var fileNames = $("#fileName").val();

              $.ajax({

                  url:'api/document.ajax.php',

                  type:'POST',

                  data:{action:crudname,dateFrom:$("#dateFrompicker").val(),dateTo:$("#dateTopicker").val(),fileName:fileNames},

                  success: function(response){

                      //console.log(response);

                      $(".result").show().html(response);

                      initiateTable();

                  }

              });

}//end of function





//delete file

function remove(id,name,link){

   if (!confirm('Are you sure you want to delete this file? ')) return false;

  var crudname ="Delete";

  $.ajax({

      url:'api/document.ajax.php',

      type:'POST',

      data:{action:crudname,name:name,link:link,key:id},

      success: function(data){

       // alert(data);

        _search();

      }

  }); 

}





function dld(link,name){

  //alert(link+name);

  var crudname='Download';

  $.ajax({

      url:'api/document.ajax.php',

      type:'POST',

      data:{action:crudname,link:link,name:name},

      success: function(response){

        console.log(response);

      }

  });

}







function getID(id){

$(".txtID").val(id);

}



function AddToFolder(fid,folderName){

  $('select').val('');

  //alert(folderName);

  $.ajax({

      url:'api/document.ajax.php',

      type:'POST',

      data:{fid:fid,folderName:folderName,action:'Savetofolder'},

      success: function(data){

        alert(data);

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

			<div class="col-md-2"></div>

			<div class="col-md-4">

				<span style="color:#fff;"> Date From : </span><input type="" value="<?php echo $currentDate; ?>" id="dateFrompicker"/>

			</div>

			



			<div class="col-md-4" >	

				<span style="color:#fff;">Date To :</span> <input type="" value="<?php echo $currentDate; ?>" id="dateTopicker" /></td>

			</div>	

			<div class="col-md-2"></div>



     

      <div class="col-md-4" style="margin-top:10px;margin-left: 190px;">

        <span style="color:#fff;"> File Name : </span><input type="text" value="" id="fileName"/>

      </div>

      

     



		</div>



		<div class="row" style="margin-bottom:10px;">	

				<div class="col-md-5"></div>

				<div class="col-md-1" style="">

				<button class="btn" onclick="_search();" id="search" >Search</button>

				</div>



				<div class="col-md-1" style="">

				<button id="Create" class="btn" data-toggle="modal" data-target="#DocumentModal">Add File</button>

				</div>

				<div class="col-md-5"></div>

		</div>	





</div>

<!-- end of headDiv-->





<!-- Modal -->

<div class="modal fade" id="DocumentModal" data-keyboard="false" data-backdrop="static"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLabel">Upload Document</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="alert alert-info msg" role="alert" style="display:none;"></div>

      <form id="Form" >

      <div class="modal-body">

        		

      						

        		

           			 		<div>Browse Image <input type="file" name="img" id="image" onchange="readURL(this);"/></div>

								<img class="responsive" style="padding:0;border:0;width:230px;height:250px;margin-left:100px;margin-top:20px;border-radius:5px 5px;box-shadow:2px 2px;border:1px solid black;" id="imgpreview" src="" alt=""/>		

                   	 				<input type="hidden" value="DocumentAdd" name="action"/>

                   		

		                       

                   

      </div>

      <div class="modal-footer">

     

        <input type="submit" value="save" class="btn btn-primary">

      </div>

      	</form>	

    </div>

  </div>

</div>

<!--END OF MODAL-->









<!-- Modal add to folder -->

<div class="modal fade" id="AddToFolderModal" data-keyboard="false" data-backdrop="static"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLabel">Save to Folder</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="alert alert-info msg" role="alert" style="display:none;"></div>

      <form id="FolderForm" >

      <div class="modal-body">

            

           <div class="form-group">

              <input type="hidden" class="txtID" value=""/>

            </div>

            <div class="form-group">

            <select class="form-control" id="fdrName">

              <option value="" selected>Select folder</option>

                <?php

              $n =$s->GetUserfolder($_SESSION['userid']);

                while($o = $n->fetch_object()){

                  echo'<option value="'.$o->folderID.'">'. $o->folderName.'</option>';

                }



              ?>  

            </select>

              </div>    

                           

                   

      </div>

      <div class="modal-footer">

     

        <button type="button"  onclick="AddToFolder($('.txtID').val(),$('#fdrName').val());"  class="btn btn-primary">save</button>

      </div>

        </form> 

    </div>

  </div>

</div>

<!--END OF MODAL-->





<div class="container result" style="border:1px solid #FFA500; display:none;padding-top:5px;">



</div>



<?php require_once("footer.php"); ?>



