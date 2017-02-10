<?php session_start(); ?>
<?php include 'connection.php'; ?>
<html>
<head>
    <title>Home Page</title>
    <link rel="stylesheet" href="css/main.css">
    <script language="JavaScript" src="jquery-2.1.3.min.js"></script>
</head>
<body>

<?php 
if ($_SESSION['login'])
{
?>
	<div align = 'right' class="logout"><a href="logout.php">Logout</a></div>
	<h1 align="center">Student Information System[SIS]</h1></div>
	<h2 align="center">User Home Page</h2>
	<h3> Login successfully : Now you can put codng for user home page <h3>

<?php 
}
else
{	
		echo "<font size=8 color=red><b>Aceess Denied<b><font><br>";
		echo "You need to login to acees this page<br>";
		echo "<a href=index.php> Click Here to login</a>";
		exit();
}
?>