<?php
session_start();
$bookid=$_GET['bookid'];
$arr=$_SESSION['mybook'];
foreach($arr as $key=>$value){
    if($key==$bookid){
        unset($arr[$key]);
    }
}
$_SESSION['mybook']=$arr;
echo "<script>location.href='gouwuche.php';</script>";
?>