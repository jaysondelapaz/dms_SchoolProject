<?php

if(!isset($_SESSION['username'])){
	//echo'<span class="glyphicon glyphicon-user" >'.' '.$_SESSION['username'].'</span>';
	//echo' <a href="./api/logout.php">logout</a>';
	echo"<script> alert('login please'); </script>";
	header('location:index.php');
}else{
	//echo"<script> alert('login please'); window.open('index.php', '_parent'); </script>";
	//header('location:./index.php');
	//header("Refresh:0.1;url=./index.php");
}

?>