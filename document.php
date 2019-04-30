<?php session_start();
require_once('session.php');
require_once('header.php');

 ?>

<!--<script src="js/jquery-3.1.1.js"></script> -->
<script>



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
          console.log(data);
      
        },
        error: function() 
        {
          console.log("ERROR!:"+data);
        }           
     });
  }));
});


function readURL(input) {
        if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imgpreview')
                        .attr('src', e.target.result);
                        //.width(220)
                        //.height(250)         
                };

                reader.readAsDataURL(input.files[0]);
            }
}


/*$(document).ready(function(){
  $("#search").on('click',function(){
    var crudname="search";
      $.ajax({
          url:'api/document.ajax.php',
          type:'POST',
          data:{action:crudname,dateFrom:$("#dateFrompicker").val(),dateTo:$("#dateTopicker").val()},
          success: function(response){
              console.log(response);
              $(".container").html(response);
          }
      });
  }); 


}); //end of document ready */


</script>

<div class="row" style="padding:20px;">
	<div class="col-md-2"></div>
	<div class="col-md-4">
		<span style="color:#fff;"> Date From : </span><input type="" value="<?php echo date('Y-m-d'); ?>" id="dateFrompicker"/>
	</div>
	

	<div class="col-md-4" >	
		<span style="color:#fff;">Date To :</span> <input type="" value="<?php echo date('Y-m-d'); ?>" id="dateTopicker" /></td>
	</div>	
	<div class="col-md-2"></div>

</div>

<div class="row" style="margin-bottom:10px;">	
		<div class="col-md-5"></div>
		<div class="col-md-1" style="">
		<button class="btn" id="search" >Search</button>
		</div>

		<div class="col-md-1" style="">
		<button id="Create" class="btn" data-toggle="modal" data-target="#DocumentModal">Add File</button>
		</div>
		<div class="col-md-5"></div>
</div>	
		


