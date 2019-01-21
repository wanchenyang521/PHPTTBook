<?php
session_start();
if(isset($_POST['ok']))
{
	include "include/conn.php";
	$username=$_POST['yhm'];
	$password=$_POST['mm'];
	$yzm=$_POST['yzm'];
	$auto=$_POST['auto_login'];
	$checkyzm=$_SESSION['yzm'];
	if(strcasecmp($yzm,$checkyzm)==0)
	{
		$sql="select * from tb_user where username='$username'";
		$res=mysqli_query($conn,$sql);
		if($row=mysqli_fetch_array($res))
		{
			if($row['password']==md5($password))
			{
				if($auto=="on")
				{
					setcookie("username",$username,time()+30*24*60*60);
					setcookie("password",md5($password),time()+30*24*60*60);
				}
				$_SESSION['username']=$username;
				header("Location:index.php");
			}
			else
			{
				echo "<script>alert('密码错误，请重新输入');</script>";
				//header("Location:login.php");
				echo "<script>window.history.go(-1);</script>";
			}		
		}
		else
		{
			echo "<script>alert('用户名不存在，请重新输入');</script>";
			//header("Location:login.php");
			echo "<script>window.history.go(-1);</script>";
		}
	}
	else{
		echo "<script>alert('验证码不正确，请重新输入');</script>";
		//header("Location:login.php");
		echo "<script>window.history.go(-1);</script>";
	}
}
?>