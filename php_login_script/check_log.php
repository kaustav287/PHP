<?php

$host="localhost"; 
$user="root"; 
$pass="";
$db_name="test"; 
$tbl_name="members";

$conn1 = new mysqli($host,$user,$pass);
mysqli_select_db("php_test")or die("cannot select DB");


$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];

$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysqli_real_escape_string($myusername);
$mypassword = mysqli_real_escape_string($mypassword);

$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";

$result=mysqli_query($sql);

$count=mysqli_num_rows($result);

if($count==1){


session_register("myusername");
session_register("mypassword");

header("location:log_success.php");
}
else {
echo "Wrong Username or Password";
}
?>s