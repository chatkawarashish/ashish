<?php include 'connection.php'; ?>
<html>
<head>
    <title>NIIITR</title>
    <link rel="stylesheet" href="css/main.css">
    <script language="JavaScript" src="jquery-2.1.3.min.js"></script>
</head>
<body>




<h1 align="center">Student Information System[SIS]</h1>

<?php
    if(isset($_POST['fpPosted']))
    {
        $uname = $_POST['uname'];
        $query = "SELECT * from login WHERE login_name = '$uname'";
        
        $res = mysql_query($query);
        $num_rows = mysql_num_rows($res);
        
        if($num_rows != 0)
        {
            $usPass = mysql_result($res, 0, 'login_password');
            $usEmail = mysql_result($res, 0, 'email');

            $msg = "Yor PassWord is <b><font size='5' color='red'>: $usPass</b></font>";
           // $sub = "Password Notification";
			
			echo $msg;
			//echo $sub;
			 echo '<br><a href=index.php>Click here for login</a>';
			exit();
          
        }
        else
        {
            echo "<script>alert('Invalid User Name'); </script>";
        }
    }
?>

<form action="#" method="POST">
   <input type="hidden" name="fpPosted" value="true">
    <table align='center'>
        <tr>
            <td>Enter User ID : </td>
            <td><input type="text" name="uname"> </td>
        </tr>
        
        <tr>
            <td></td>
            <td><input type="submit" value="Get Password"> 
            </td>
        </tr>
        
    </table>
</form>
