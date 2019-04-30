<?php

session_start();

require_once('function.php');

$s=new apiFunction;

$c=$s->today();

while($r = $c->fetch_object())

      {

         $currentDate=$r->cDate;

      }





$action = isset($_POST['action']) ? $_POST['action']:'';


if($action == 'Deletes')
{ 
	$d = new apiFunction;
	$delete =$d->delete("addtofolder_table","ContentID",$_POST['key']);

	if($delete)

	{

		echo"successfully deleted";

	}else

	{

		echo"error: ";

	}

}


if($action =='findContent'){

	$id=$_POST['ids'];

	//$fname=$_POST['FName'];

?>




<table id="Mytable" class="display" cellspacing="0" width="100%">



	<thead>

	<tr>

			<th>#</th>

			<th>UserID</th>

			<th>FolderName</th>

			<th>FileName</th>
			<th>Action</th>

		



	</tr>

	</thead>



	<tbody>



<?php

	$a=$s->SearchFolderContent($id,$_SESSION['userid']);

	if($a->num_rows>0)

	{

		while($row=$a->fetch_object())

		{

?>

	<tr>

		<td><?php echo $row->ContentID;?></td>

		<td><?php echo $row->userID;?></td>

		<td><?php echo'<img src="icon/folder-icon.png" style="height:30px;width:30px;">&nbsp;	'.$row->FolderName;?></td>

		<td><?php echo $row->fileName;?></td>

		<td>
			<form action="api/download.php" method="POST"> <input type="hidden" name="id" id="id" value="<?php echo $row->fid;?>"> 
			

			<!--DOWNLOAD FILE ACCESS-->
			<?php
			$access =$s->customQeury("SELECT cmd_name FROM command_table WHERE user_id='".$_SESSION['userid']."' AND user_name='".$_SESSION['username']."' AND cmd_name='DOWNLOAD'");
			if($access->num_rows > 0){
			?>
				<button type="submit" style="border:none;"><img src='icon/download.png'  title='Download'/></button>
			&nbsp;&nbsp;&nbsp;
			<?php	
				
			} //end of DOWNLOAD ACCESS
			

			//DELETE ACCESS</form>
			$accessDelete =$s->customQeury("SELECT cmd_name FROM command_table WHERE user_id='".$_SESSION['userid']."' AND user_name='".$_SESSION['username']."' AND cmd_name='DELETE'");
			if($accessDelete->num_rows > 0){
				while($dta=$accessDelete->fetch_object()){
					
			?>
			
			
			<a href='#' onclick='removes("<?php echo $row->ContentID; ?>");'><img src='icon/delete.png' title='Delete File'/></a>
			&nbsp;&nbsp;&nbsp;
			

			<?php
				}
				
				
			}//end of DELETE ACCESS

			
			
			?>

			</form>
			</td>

	    <?php echo'<input type="hidden" value="'.$row->path.'">';?>

	</tr>

<?php			

			//echo$row->userID.$row->FolderName.$row->fileName.$row->path;

		}

	}

	else

	{

		echo"No Data";

	}



	echo'

		<tbody>

		</table>

	';

}



?>