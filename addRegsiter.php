<?php
session_start();
include "include/conn.php";
if(isset($_POST["ok"])){
	$yhm=$_POST["yhm"];
	$dlmm=$_POST["dlmm"];
	$qrmm=$_POST["qrmm"];
	$lxdh=$_POST["lxdh"];
	$xydz=$_POST["xydz"];
	$yhdz=$_POST["yhdz"];
	$yzm=$_POST["yzm"];
	$time=date("Y-m-d",time());
	if($yzm==$_SESSION["yzm"]){
		$sql2="select * from tb_user where username='$yhm'";
		$res2=mysqli_query($conn,$sql2);
		$num=mysqli_num_rows($res2);
		if($num>0){
			echo "<script>alert('用户名已存在');</script>";
			echo "<script>window.history.go(-1);</script>";
		}
		else{
			$pass=md5($dlmm);
			$sql="insert into tb_user(username,password,email,address,telephone,regdate) values('$yhm','$pass','$xydz','$yhdz','$lxdh','$time')";
			$res=mysqli_query($conn,$sql);
			if($res){
				echo "<script>alert('注册成功，请登录');</script>";
				echo "<script>location.href='login.php';</script>";
			}
		}
	}
	else{
		echo "<script>alert('验证码错误');</script>";
		echo "<script>window.history.go(-1);</script>";
	}
}
?>