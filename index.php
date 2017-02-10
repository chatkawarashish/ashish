<?php session_start(); ?>
<?php include 'connection.php'; ob_start()  ?>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="css/main.css">
    <script language="JavaScript" src="jquery-2.1.3.min.js"></script>
</head>
<body>


<?php 
    $_SESSION['login'] = false;
?>



<?php
    $flag = 0;
    if(isset($_POST['posted']))
    {
        $flag  = 0;
        $loginname = $_POST['uname'];
        $loginpassword = $_POST['upassword'];
        
        $query = "SELECT login_password from login WHERE login_name = '$loginname'";
        
        $res = mysql_query($query);
        $num_rows = mysql_num_rows($res);
        //echo $res; echo "<br>";echo $num_rows;
		
		if(mysql_num_rows($res)>0)
		{
			$row=mysql_fetch_assoc($res);
			$password=$row['login_password'];
		 
			//$password = mysql_result($res, 0, 'login_password');       
			if ($loginpassword == $password)
			{
				$_SESSION['login'] = true;
				$_SESSION['user'] = $loginname;
				header('Location: userhome.php');
			}
			else
            $flag = 1;            
		}
		else $flag=1;
	}
		?>

<?php
if(!$_SESSION['login'])
{
?>
<h1 align="center">Student Information System[SIS]</h1>
<form action="index.php" method="POST">
    <input type="hidden" value="true" name="posted">
    <table align="center" cellpadding = "6">
        <tr>
            <td class="lable">User Name : </td>
            <td><input type="text" name="uname" class = "flat"></td>
        </tr>
        <tr>
            <td class="lable">Password : </td>
            <td><input type="password" name="upassword" class="flat">
            <?php
                if ($flag == 1)    
                    echo "<br><font color='red'>User Name / Password Not Matching..</font>";
            ?>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Login" class="submit">
            </td>
            
        </tr>
        <tr>
            <td></td>
            <td><a href="getpassword.php">Forgot Password ?</a></td>
        </tr>
    </table>
</form>

<?php
}
?>