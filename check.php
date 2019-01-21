<?php
$yhm=$_GET["name"];
include "include/conn.php";
$sql="select * from tb_user where username='$yhm'";
$res=mysqli_query($conn,$sql);
if(mysqli_num_rows($res)>0){
	echo false;
}
else{
	echo true;
}
?>