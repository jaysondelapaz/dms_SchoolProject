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

if($action =='ajaxSearch'):

	
      $term=stripslashes($_POST['term']);
  		$mysqli = new mysqli("localhost","root","","technodb")or die($mysqli->error);
      $query=$mysqli->query("SELECT user_name FROM  user_table where user_name like '%$term%'");
      //$auto = $s->_autoComplete('user_table','user_name',$term);
      while ($row = mysqli_fetch_array($query))
            {
             $resultData[] = $row['user_name'];
            }
            echo json_encode($resultData);
   

endif;	

if($action =='Delete'){
	$d = new apiFunction;
	$delete =$d->delete("share_table","sid",$_POST['key']);
	if($delete)
	{
		echo"success";
	}	
	
}


if($action == 'Create'){
	$id = $_POST['user'];
	$file = $_POST['file'];
	$shareBy =$_SESSION['userid'];

	$check =$s->CheckFile($file,$shareBy,$id);
	if($check->num_rows>0){
		echo"This file is already shared to this user!";
		exit;
	}
	$value="null".","."'$id'".","."'$file'".","."'$currentDate'".","."'$shareBy'";
	$insert = $s->PublicInsert("share_table",$value);
	if($insert){
		echo"success";
	}else{
		echo"ERROR!";
	}
}

if($action == 'GetFile'){ 
	$get = $s->getID("file_table","fid",$_POST['ids']);
		while($rw=$get->fetch_object()){
			$name = $rw->fileName;
			$path = $rw->path;
		}
       $location = $path.$name;
       $get = $s->getID("file_table","fid",$_POST['ids']);
		while($rw=$get->fetch_object()){
			$name = $rw->fileName;
			$path = $rw->path;
		}
       $location = $path.$name;
       //echo $location;
	   if (file_exists($location) && is_readable($location)) {
      header('Content-Description: File Transfer');
			    header('Content-Type: application/octet-stream');
			    header('Content-Disposition: attachment; filename='.basename($location));
			    header('Content-Transfer-Encoding: binary');
			    header('Expires: 0');
			    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			    header('Pragma: public');
			    header('Content-Length: ' . filesize($location));
			    //ob_clean();
			    flush();
			    readfile($location);
			    //exit;
     }else{
        echo"File not found...";
     }  
	   
}


if($action=='Read'){
	$datefrom = trim($_POST['dateFrom']);
	$dateto = trim($_POST['dateTo']);
	$id = $_SESSION['userid'];
	$fname = trim($_POST['fileName']);
?>

<table id="Mytable" class="display" cellspacing="0" width="100%">

	<thead>
	<tr>
			<th>#</th>
			<th>filename</th>
			<th>ShareBy</th>
			<th>date</th>
			<th>action</th>
	</tr>
	</thead>

	<tbody>


<?php	
	//echo $datefrom.$dateto;
	$read = $s->Share($datefrom,$dateto,$id,$fname);
	$default ="<img src='icon/default.png'/>";
		$doc= '<img src="icon/doc.png" />';
		$rar="<img src='icon/rar.png' />";
		$jpeg ="<img src='icon/jpg.png' />";
		$excel="<img src='icon/excel.png'/>";
		$pdf="<img src='icon/pdf.png'/>";
		$zip="<img src='icon/zip.png'/>";
		$ppt="<img src='icon/ppt.png'/>";
		
	if($read->num_rows>0){
		while($d= $read->fetch_object()){
		$extension = pathinfo($d->fileName, PATHINFO_EXTENSION);
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
<td> <?php echo $d->id;?> </td>
<td> <?php echo $extension." ".$d->fileName;?> </td>
<td> <?php echo $d->shareby;?> </td>
<td> <?php echo $d->date;?> </td>
<td>
			<form action="api/share.ajax.php" method="POST">
			<input type="hidden" name="ids" value="<?php echo $d->fid;?>">
			<input type="hidden" name="action" value="GetFile">
			<button type="submit" style="border:none;" ><img src='icon/download.png'  title='Download'/></button>
			&nbsp;&nbsp;&nbsp;	
			<a href='#' onclick='remove("<?php echo $d->id; ?>");'><img src='icon/delete.png' title='Delete File'/></a></form>
</td>
</tr>

<?php			
			
		}
	}else{
		echo"<tr><td></td><td></td><td>No Data</td><td></td><td></td> </tr>";
	}
}


?>      
</tbody>
</table>