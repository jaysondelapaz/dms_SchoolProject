<script>
    $(document).ready(function(){
        $("#btn-send").on('click', function(){
            var emailtotxt = $("#emailto").val();
            var subjecttxt = $("#subject").val();
            var msgtxt =$("#msgtxt").val();
            //alert(emailtotxt+subjecttxt+msgtxt);
            
            $.ajax({
                url:'email/index.php',
                type:'POST',
                data:{emailtotxt:emailtotxt,subjecttxt:subjecttxt,msgtxt:msgtxt},
                success: function(data){
                    alert(data);
                    $('#Emailform')[0].reset();
                }
                
            });
        }) ;
    });
</script>
<!-- Modal -->
<div class="modal fade" id="EmailModal" data-keyboard="false" data-backdrop="static"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Send Email</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="alert alert-info msg" role="alert" style="display:none;"></div>
      
      <div class="modal-body">
        		
      			<form class="form" id="Emailform" style="padding:40px;">
               
        
                <div class="form-group">  
                  <label for="to">To</label> <input type="email" class="form-control" id="emailto" name="emailto" placeholder="example@gmail.com / example.yahoo.com etc.." required /><br />
                </div>

                <div class="form-group">
                  <label for="subject">Subject</label> <input type="text" id="subject" class="form-control" name="subject" />
                </div>

                <div class="form-group">
                  <label for="message">Message</label><textarea name="msg" id="msgtxt" class="form-control"></textarea>
                </div>
                  <?php //<input type="submit" class="btn btn-primary btn-block" value="Sent" style="padding:5px;">?>
                    <button type="button" id="btn-send" class="btn btn-primary btn-block">send</button>
            </form>              
      </div>
     
      
    </div>
  </div>
</div>
<!--END OF MODAL-->




