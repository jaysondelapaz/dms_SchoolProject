<?php
session_start();

unset($_SESSION['username']);
session_destroy();
echo"<script> alert('Thank you for login!'); window.open('index.php', '_parent');</script>";
header("Refresh:0.5;url=index.php");

?>