<?php
session_start();
$arr=$_SESSION['mybook'];
foreach($_POST as $key=>$value)
{
    foreach($arr as $k=>$v){
        if($key==$k){
            $v['booknum']=$value;
            $arr[$k]=$v;
        }
    }
}
$_SESSION['mybook']=$arr;
echo "<script>location.href='gouwuche.php';</script>";
?>