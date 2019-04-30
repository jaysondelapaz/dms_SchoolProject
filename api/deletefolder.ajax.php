<?php
session_start();

require_once('function.php');

$s=new apiFunction;

$c=$s->today();

while($r = $c->fetch_object())

      {

         $currentDate=$r->cDate;

      }



$Folder_id = trim($_GET['id']);
$delete =$s->delete("folder_table","folderID",$Folder_id);      

if($delete)
	{
		echo"<script>alert('success')</script>";
		header("refresh:2; url=../folder.php");
	}	
?>