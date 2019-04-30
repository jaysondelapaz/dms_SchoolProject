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
.ui-autocomplete {
position:absolute;
    cursor:default;
    z-index:1001 !important
}
</style>

	


<script>

$(document).ready(function(){
$("#name").autocomplete({
          source: function(request, response) {
                    $.ajax({
                        cache: false,
                        async: false,
                        url: "api/share.ajax.php",
                        type: "POST",
                        dataType: "json",
                        data: {term: request.term,action: 'ajaxSearch'},
                        success: function(responseText) {
                            response(responseText);
                            console.log(responseText);
                            }
                    });//end of ajax
           }
      });//end of autocomplete

});


$(document).ready(function (e) {
  $("#Form").on('submit',(function(e) { 
    e.preventDefault();
    $.ajax({
      url: "api/share.ajax.php",
      type: "POST",
      data:  new FormData(this),
      contentType: false,
      cache: false,
      processData:false,
      success: function(data)
        { 
          successMsg(data);
           $("#Form")[0].reset();
        
        },
        error: function() 
        {
          console.log("ERROR!:"+data);
        }           
     });
  }));
});
/*function sharefile(){
	var id = $("#userID option:selected").val();
	var fid = $("#fileID option:selected").val();
	var crudname = "Create";
	
	$.ajax({
		cache: false,
        async: false,
        url: "api/share.ajax.php",
        type: "POST",
        data:{action:crudname,user:id,file:fid},
        success:function(res){
        	alert(res);
        }
	});
} */

//search
function _search(){       
              $.ajax({
                  url:'api/share.ajax.php',
                  type:'POST',
                  data:{action:'Read',dateFrom:$("#dateFrompicker").val(),dateTo:$("#dateTopicker").val(),fileName:$("#fileName").val()},
                  success: function(response){
                      //console.log(response);
                      $(".result").show().html(response);
                      initiateTable();
                  }
              });
}//end of function


//delete file
function remove(id){
   if (!confirm('Are you sure you want to delete this file? ')) return false;
  $.ajax({
      url:'api/share.ajax.php',
      type:'POST',
      data:{action:'Delete',key:id},
      success: function(data){
       //alert(data);
        _search();
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
				<button id="Create" class="btn" data-toggle="modal" data-target="#DocumentModal">Create</button>
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
        <h5 class="modal-title" id="exampleModalLabel">File Sharing</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="alert alert-info msg" role="alert" style="display:none;"></div>
      <form id="Form" >
      <div class="modal-body">
        		
      	<?php /*<div class="form-group has-float-label " style="">
            <div class="col-md-3" style="">Share to: </div><input   id="name" type="text"  placeholder="Please type username" style="width:200px;"/>
            <input type="hidden" name="action" value="Create"/>
        </div> */ ?>


        <div class="form-group">
        	 <div class="col-md-3" style="">Share to: </div>
           <input type="hidden" name="action" value="Create"/>
           		<select id="userID" name="user" class="form-control" style="width:200px;margin-top:20px;margin-left:140px;">
           			<option selected value="" disabled>Share to</option>
           		
            		<?php  
            		$g = $s->_select("user_table"); 

            			if($g->num_rows>0):
            			while($rw=$g->fetch_object()){?>
            		
            					<option value="<?php echo $rw->user_id; ?>" style="color:green;"> <?php echo $rw->user_name; ?></option>
            		<?php	}
            			else: 
            					echo'<option value="">No File yet</option>';
            			endif;	
            		?>
            		 
           		</select>
           		
        </div>					

        <div class="form-group">
        	 <div class="col-md-3" style="">File: </div>
           		<select id="fileID" name="file" class="form-control" style="width:200px;margin-top:20px;margin-left:140px;">
           			<option selected value="" disabled>Select File</option>
           		
            		<?php  
            		$get = $s->getID("file_table","user_id",$_SESSION['userid']); 

            			if($get->num_rows>0):
            			while($data=$get->fetch_object()){ ?>
            		
            					<option value="<?php echo $data->fid; ?>" style="color:green;"> <?php echo $data->fileName; ?></option>
            		<?php	}
            			else: 
            					echo'<option value="">No File yet</option>';
            			endif;	
            		?>
            		 
           		</select>
           		
        </div>					
        		
           			 		
		                       
                   
      </div>
      <div class="modal-footer">
     
        <input type="submit" value="share" id="save"  class="btn btn-primary">
      </div>
      	</form>	
    </div>
  </div>
</div>
<!--END OF MODAL-->



<div class="container result" style="border:1px solid #FFA500; display:none;padding-top:5px;">

</div>

<?php require_once("footer.php"); ?>

