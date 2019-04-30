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
if($action=='DocumentAdd'){
					$date= date("m-d-Y");			
					$path ='../upload/'.$_SESSION['username'].'/'.$date.'/'; // directory
					$valid_file = array('pdf','PDF','jpg','jpeg','JPG','JPEG','png','PNG','gif','GIF','rar','RAR','zip','ZIP','doc','dot','wbk','docx','docm','dotx','dotm','docb','xls','xlt','xlm','xlsx','xlsm','xltx','xltm','xlsb','xla','xlam','ppt','pot','pps','pptx','pptm','potx','potm','ppam','ppsx','ppsm','sldx','sldm','ACCDB','ACCDE','ACCDR','txt','TXT');			
								if(isset($_FILES['img']))
								{
									if($_FILES['img']['tmp_name']!='')
									{
											
										if($_FILES['img']['size']>10000000) //10 MB
										{
										echo"This file is too large. File must be less than 10MB in size";
										}else{
												$img = $_FILES['img']['name'];
												$tmp = $_FILES['img']['tmp_name'];
												//$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION)); // get uploaded file's extension
													$ext = pathinfo($img, PATHINFO_EXTENSION);
												//$final_image = rand(1000,1000000).$img; // can upload same image using rand function
												// check's valid format
												if(in_array($ext, $valid_file)) 
												{		
													if(!is_dir($path))
													{
														mkdir($path, 0777 , true); // upload directory
														chmod($path, 0777);
													}	
														//$path = $path.strtolower($img);	
														$path1 = $path.$img;	
													
														if(file_exists($path1)) //check file if already exist
														{
															echo"This file ".$img." exist!";
														}else{	
															//chmod($path, 0777);
															if(move_uploaded_file($tmp,$path1)) 
															{
															$a = new apiFunction;
															$name = $_SESSION['userid'];
															$value="null".","."'$name'".","."'$img'".","."'$path'".","."'$currentDate'";
															$a->PublicInsert('file_table',$value);
															echo"success";
															}
														}
												} else{
													echo"Invalid! the file must be jpg, pdf, xls, doc, ods";
												}
											}	
									}else{
											echo"No file choosen";
										}		
								}//end of isset

					
}//end of action	





if($action =='Delete'){
	$d = new apiFunction;
	$delete =$d->delete("file_table","fid",$_POST['key']);
	unlink($_POST['link'].$_POST['name']);
	if($delete)
	{
		echo"success";
	}	
	
}

//add to folder
if($action == 'Savetofolder'){
	$id = $_POST['fid']; //file id
	$userid = $_SESSION['userid']; //user id
	$fname = $_POST['folderName'];
	//echo$id.$userid.$fname.$currentDate;
	$quID = $s->customQeury("SELECT ContentID FROM `addtofolder_table`  ORDER BY ContentID DESC");
	if($quID->num_rows>0)
    {
        while($r=$quID->fetch_object())
        {
            $qid = $r->ContentID;
        }
    }
    else
    {
        $qid=1;
    }
    
	$value3="'$qid'".","."'$id'".","."'$userid'".","."'$fname'".","."'$currentDate'";
	$mInsert = $s->PublicInsert('addtofolder_table',$value3);
	if($mInsert){
		echo"success";
	}else{
		echo"ERROR!";
	}

}

if($action =='search'){
	$datefrom =$_POST['dateFrom'];
	$dateTo=$_POST['dateTo'];
	$Fname = $_POST['fileName'];

	?>

	<table id="Mytable" class="display" cellspacing="0" width="100%">

	<thead>
	<tr>
			<th>#</th>
			<th>filename</th>
			<th>date</th>
			<th>action</th>
	</tr>
	</thead>

	<tbody>
	<?php
		$b=new apiFunction;
		$id = $_SESSION['userid'];
		$search=$b->search('file_table','date',$datefrom,$dateTo,'user_id',$id,"fileName",$Fname);
		$default ="<img src='icon/default.png'/>";
		$doc= '<img src="icon/doc.png" />';
		$rar="<img src='icon/rar.png' />";
		$jpeg ="<img src='icon/jpg.png' />";
		$excel="<img src='icon/excel.png'/>";
		$pdf="<img src='icon/pdf.png'/>";
		$zip="<img src='icon/zip.png'/>";
		$ppt="<img src='icon/ppt.png'/>";
	

		if($search->num_rows>0):
		while($r = $search->fetch_object()){
			$name = $r->fileName;
			$extension = pathinfo($r->fileName, PATHINFO_EXTENSION);

			switch($extension){
				case 'PNG':
					$extension = $jpeg;
					break;
				case 'png':
					$extension = $jpeg;
					break;
				case 'GIF':
					$extension = $jpeg;
					break;
				case 'gif':
					$extension = $jpeg;
					break;
				case 'JPG':
					$extension = $jpeg;
					break;
				case 'JPEG':
					$extension = $jpeg;
					break;
				case 'jpg':
					$extension = $jpeg;
					break;
				case 'JPG':
					$extension = $jpeg;
					break;	
				case 'doc':
					$extension = $doc;
					break;		
				case 'docx':
					$extension =  $doc;
					break;
				case 'xls':
					$extension =  $excel;
					break;
				case 'xlsx':
					$extension =  $excel;
					break;
				case 'xlsm':
					$extension =  $excel;
					break;
				case 'xltx':
					$extension =  $excel;
					break;
				case 'XLTX':
					$extension =  $excel;
					break;	
				case 'XLS':
					$extension =  $excel;
					break;
				case 'XLSX':
					$extension =  $excel;
					break;
				case 'XLSM':
					$extension =  $excel;
					break;						
				case 'PDF':
					$extension = $pdf;
					break;
				case 'pdf':
					$extension = $pdf;
					break;
				case 'rar':
					$extension = $rar;
					break;	
				case 'RAR':
					$extension = $rar;
					break;
				case 'zip':
					$extension = $zip;
					break;
				case 'ZIP':
					$extension = $zip;
					break;	
				case 'pptx':
					$extension = $ppt;
					break;
				case 'ppt':
					$extension = $ppt;
					break;	
				case 'PPTX':
					$extension = $ppt;
					break;
				case 'PPT':
					$extension = $ppt;
					break;										
				default:
					$extension = $default;
					break;			
			}
			 
			
	?>

	<tr>
			<td><?php echo $r->fid; ?> </td>
			<td><?php echo $extension." ".$r->fileName; ?> </td>
			<td><?php echo $r->date; ?> </td>
			<td>
			<form action="api/download.php" method="POST"> <input type="hidden" name="id" value="<?php echo $r->fid;?>">
			

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
			

			<a href='#' onclick='remove("<?php echo $r->fid; ?>","<?php echo $r->fileName; ?>","<?php echo $r->path; ?>");'><img src='icon/delete.png' title='Delete File'/></a>
			&nbsp;&nbsp;&nbsp;

			<?php
				}
				
				
			}//end of DELETE ACCESS

			
			//ADD FOLDER ACCESS
			$accessFolder =$s->customQeury("SELECT cmd_name FROM command_table WHERE user_id='".$_SESSION['userid']."' AND user_name='".$_SESSION['username']."' AND cmd_name='FOLDER'");
			if($accessFolder->num_rows > 0){
				while($dts=$accessFolder->fetch_object()){
					
					
			?>
				<a href='#' class="btn" onclick='getID("<?php echo $r->fid;?>");' data-toggle="modal" data-target="#AddToFolderModal" style="color:blue;"><img src='icon/move.png' style="width:40px; height:40px;" title='Save to Folder'/> </a>
			<?php		
					// delete also to inside folder
					$remove_to_folder = $s->customQeury("DELETE FROM addtofolder_table WHERE fid='".$r->fid."'");
				}	
			} // end ADDFOLDER ACCESS

			?>

			</form>
			</td>
	</tr>

<?php		
			} //end of while
		else:
			echo"<tr><td></td><td></td><td>No Data</td><td></td></tr>";
		endif;


echo "</tbody>
</table>";
}
?>
