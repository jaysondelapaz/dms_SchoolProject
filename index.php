<?php require_once('header.php'); ?>  
<?php require_once('registerform.php'); ?>
    <div class="container" >


<div class="container">

 
<!--<div class="col-md-4" style="margin-top: 3em;border:1px solid #ccc;padding:15px;border-radius:15px 15px ; ">
 
         <form class="form" action="api/login.php" method="POST" style="background-color:#FFA500;width: 35em;margin: auto;margin-top: 10em;border-radius: 15px 15px;padding:px;">
              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#RegModal" style="margin-left: 200px;">Register</button>
            
            <div class="form-group">
              <input type="text" class="form-control" name="username" id="username" placeholder="username" required>
             
            </div>
            
            <div class="form-group">  
               <input type="password" class="form-control" name="password" id="password" placeholder="password" required>
             
            </div>  
              <input type="hidden" value="isLogin" name="crudname" id="crudname">
              <div class="form-group">
              <button id="btn-login" class="btn btn-default btn-block" >Login</button>  
             
            </div>
          </form>
 </div>-->

<div class="row">

 <div class="col-md-4"></div>
    <div class="col-md-4" style="margin-top: 3em;border: 1px solid #ccc;padding: 15px;border-radius: 15px 15px;background-color: #FFA500; " >
      <h4 style="color:#fff;">Sign in to your account</h4>
      <hr>
       <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#RegModal" style="margin: 0px 0px 10px 0px;background-color: #fff;color: #000;border: none;margin-right: 2em;">Register</button>
 <form class="form" action="api/login.php" method="POST" style="padding: 2em;">
    
      <div class="form-group">
            <input type="text" class="form-control" name="username" id="username" placeholder="username" required>
    </div>
    <div class="form-group">
      
      <input type="password" class="form-control" name="password" id="password" placeholder="password" required>
    </div>
      <input type="hidden" value="isLogin" name="crudname" id="crudname">
     <button id="btn-login" class="btn btn-primary btn-block" style="padding: 10px;background-color: #fff;color: #000;border: none;" >Login</button> 
    <!-- <input type="submit" name="Compute" class="btn btn-lg btn-success btn-block" value="Compute">  -->


</form>
</div>

<div class="col-md-4"></div>
  </div>
</div>


<?php require_once('footer.php'); ?>
 