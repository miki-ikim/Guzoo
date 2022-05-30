<?php 

session_start();
if(!isset($_SESSION["user_id"] )&& $_SESSION["loggedIn"] = true){
header("Location: ../../index.php?msg=qLogin First");
exit(); }

?>