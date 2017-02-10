<?php
	header('Location: index.php');
	$_SESSION['login'] = false;
    session_unset();
    session_destroy();
   
?>