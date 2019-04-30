<?php
session_start();
require_once('function.php');
		$a = new apiFunction;
		$get = $a->getID("file_table","fid",$_POST['id']);
		while($rw=$get->fetch_object()){
			$name = $rw->fileName;
			$path = $rw->path;
		}
       //$path ="upload/demo/11-13-2017/3.png";//$paths.$name;
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

?>