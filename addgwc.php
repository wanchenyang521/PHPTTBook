<?php
session_start();
$bookid=$_GET['bookid'];
include "include/conn.php";
$sql="select * from tb_book where bookid=$bookid";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($res);
$bookname=$row['bookname'];
$arr=$_SESSION['mybook'];
if(!is_array($arr)){
    $arr[$bookid]=array("bookid"=>$bookid,"bookname"=>$bookname,"booknum"=>1);
}
else{
    if(!array_key_exists($bookid,$arr)){
        $arr[$bookid]=array("bookid"=>$bookid,"bookname"=>$bookname,"booknum"=>1);
    }
    else{
        $arr[$bookid]["booknum"]+=1;
    }
}
$_SESSION['mybook']=$arr;
echo "<script>location.href='gouwuche.php';</script>";
?>