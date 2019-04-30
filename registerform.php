
<script>
$(document).ready(function(){

    $("#submit").on('click', function(){

      //validate email
    var filterEmail = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!filterEmail.test($("#email").val()))
        {
          alert("Please type a  valid email!");
            return false; 
        } 

       if($("#passwd").val()!= $("#cpasswd").val())
        {
        alert("Password did not match!");
        return false;
        }   

      var crudname='create'
      $.ajax({
        async: false,
        url:'api/register.php',
        type:'POST',
        data: {crudname:crudname,
                firstname:$("#firstName").val(),
                lastname:$("#lastName").val(),
                email:$("#email").val(),
                uname:$("#UserName").val(),
                pwd:$("#passwd").val()
              },
        success: function(data){
          alert(data);
            if(data == 'success'){
              $('#RegModal input').val("");
            }
        
        }
      });

   

    }); //end of submit

}); //end of document
 
</script>

<!-- Modal -->
<div id="RegModal" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" >

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header"> 
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Sign up</h4>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" role="form">
             
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">First Name</label>
                    <div class="col-sm-9">
                        <input type="text" id="firstName" placeholder="First Name" class="form-control" autofocus>                     
                    </div>
                </div>

                <div class="form-group">
                    <label for="lastName" class="col-sm-3 control-label">Last Name</label>
                    <div class="col-sm-9">
                        <input type="text" id="lastName" placeholder="Last Name" class="form-control" >                     
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" id="email" placeholder="Please type a valid email" class="form-control" >                     
                    </div>
                </div>

                <div class="form-group">
                    <label for="username" class="col-sm-3 control-label">username</label>
                    <div class="col-sm-9">
                        <input type="text" id="UserName" placeholder="username" class="form-control">                     
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-9">
                        <input type="password" id="passwd" placeholder="password" class="form-control">                     
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Confirm password</label>
                    <div class="col-sm-9">
                        <input type="password" id="cpasswd" placeholder="confirm password" class="form-control">                     
                    </div>
                </div>

               


      </form>          
       
      </div>
      <div class="modal-footer">
        <button type="button" id="submit" class="btn btn-primary" >Submit</button>
      </div>
    </div>

  </div>
</div> 