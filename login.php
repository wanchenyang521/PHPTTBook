<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登录</title>
<link rel="stylesheet" type="text/css" href="css/login.css"/>
</head>

<body>

<div id="logo">
<h1><img src="images/denglu1_03.gif" />快来加入天天书屋吧！</h1>
<h1 id="h"> 各种图书等你来看个够。</h1>
<p style="text-align:right; color: #0C0;"><a href="index.php" style="color:#0C3">返回首页</a>&nbsp;<a href="regsiter.php" style="color:#0C3">注册</a></p>
<form action="loginprocess.php" method="post"> 
  <p>用户名：
    <input name="yhm" type="text" id="yhm" />
  </p>
  <p>
    密&nbsp;&nbsp;码：
      <input name="mm" type="password" id="mm" />
  </p>
  <p>验证码：
  	<input type="text" name="yzm" id="yzm" size="10" />
  	<img src="yzmimage.php" />
  </p>
  <p>
    <input type="checkbox" name="auto_login" id="auto_login" value="on" />
    <label for="auto_login">下次自动登录</label>
  </p>

  <input name="ok"  type="submit" style="background:url(images/denglu2.gif); width:99px ; height:36px;  margin-left:30px;" value="登录" id="ok" />
  <input name=""  type="reset" style="background:url(images/denglu3.gif)  ; width:97px ; height:36px; margin-left:30px; " value="重置" />
</form>
</div>

</body>
</html>
