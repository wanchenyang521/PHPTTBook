<?php
session_start();
?>
   <div id="header">
    <div id="login">
        <p><span class="p1">
        <?php
			include "include/conn.php";
			if(isset($_COOKIE["username"]) && isset($_COOKIE["password"]))
			{
				$username=$_COOKIE["username"];
				$password=$_COOKIE["password"];
				$sql="select * from tb_user where username='$username'";
				$res=mysqli_query($conn,$sql);
				if($row=mysqli_fetch_array($res))
				{
					if($row["password"]==$password)
					{
						$_SESSION["username"]=$username;
						date_default_timezone_set("Asia/Shanghai");
						echo "您好，".$_SESSION["username"];
						if(isset($_COOKIE["lastvisit"]))
						{
							echo "您上次登录时间是：".$_COOKIE["lastvisit"];
					setcookie("lastvisit",date("Y-m-d H:i:s"),time()+30*24*60*60);
						}
						else{
							echo "您是第一次登录！";
							setcookie("lastvisit",date("Y-m-d H:i:s"),time()+30*24*60*60);
						}
						echo "！<a href='logout.php'><img src='images/login1.gif' />退出登录</a>";
					}
				}
			}
			else{
				date_default_timezone_set("Asia/Shanghai");
				if(isset($_SESSION['username']))
				{
					echo "您好，".$_SESSION["username"];
					if(isset($_COOKIE["lastvisit"]))
					{
						echo "您上次登录时间是：".$_COOKIE["lastvisit"];
						setcookie("lastvisit",date("Y-m-d 	H:i:s"),time()+30*24*60*60);
					}
					else{
						echo "您是第一次登录！";
						setcookie("lastvisit",date("Y-m-d H:i:s"),time()+30*24*60*60);
					}
					echo "！<a href='logout.php'><img src='images/login1.gif' />退出登录</a>";
				}
				else
				{
					echo "欢迎来天天书屋！<a href='login.php'><img  src='images/login1.gif' />请登录</a>";
				}
			}
			
		?>
         <a href="regsiter.php"><img  src="images/login1.gif" />免费注册</a></span><span class="p2"> <a href="gouwuche.php"><img src="images/login2.gif" />购物车</a> <a href="dingdan.html"><img src="images/login2.gif" />我的订单</a></span></a> </p>
    </div>
    <div id="logo">
        <h1><img src="images/logo.gif" />各种好看的图书尽在天天书屋</h1>
    </div>
    <form action="searchresult.php" method="get" style="background-color:#0C6; width:300px; height:30px; margin:20px 30px 0px 0px; padding-top:10px; float:right; padding-left:10px;">
        热门搜索：
        <input name="keyword" type="text" placeholder="请输入关键字" id="keyword" />
        <input name="搜索" type="submit" id="搜索" value="搜索" />
    </form>
</div>