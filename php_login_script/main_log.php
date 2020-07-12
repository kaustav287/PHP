<?php  

$l_host = 'localhost';
$user = 'root';
$pass = '';

$conn = new mysqli($l_host,$user,$pass);
if(!$conn)
{
    die("could not connect" . mysqli_error());
}
else
echo "connection success";


$sql = "CREATE DATABASE php_test";
mysqli_query($conn,$sql);

mysqli_select_db($conn,"php_test");

//mysqli_query($conn,$cre);

mysqli_close($conn);

?>

<form name="form1" method="post" action="check_log.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td colspan="3"><strong>Member Login </strong></td>
</tr>
<tr>
<td width="78">Username</td>
<td width="6">:</td>
<td width="294"><input name="myusername" type="text" id="myusername"></td>
</tr>
<tr>
<td>Password</td>
<td>:</td>
<td><input name="mypassword" type="text" id="mypassword"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="Login"></td>
</tr>
</table>
</td>
</form>
