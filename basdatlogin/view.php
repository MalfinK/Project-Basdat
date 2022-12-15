<?php 
session_start();
echo "selamat datang ".$_SESSION["user"];

?>
<a href="logout.php">logout</a>