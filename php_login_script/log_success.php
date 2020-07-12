<?php
session_start();
if(!session_is_registered(myusername)){
header("location:main_login.php");
}
?>

<html>
<body>
Login Successful

<h1> Welcome! </h1>
</body>
</html>