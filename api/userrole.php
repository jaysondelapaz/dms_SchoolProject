<?php
  $accessLevel =$s->customQeury("SELECT user_level FROM urole_table WHERE user_id ='".$_SESSION['userid']."' AND user_name='".$_SESSION['username']."' ");
  if($accessLevel->num_rows > 0){
    while($a=$accessLevel->fetch_object()){
      if($a->user_level =='Admin'){
        echo'<a href="dashboard.php" style="margin-left:50px;"><span class="glyphicon glyphicon-dashboard"></span>Dashboard</a>';
      }
      else{
      	
      }
    }
  }
 
    //echo'<a href="dashboard.php" style="margin-left:50px;"><span class="glyphicon glyphicon-dashboard"></span>Dashboard</a>';
  
?>