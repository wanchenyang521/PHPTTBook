<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>图片商城首页</title>
<link rel="stylesheet" type="text/css" href="css/regsiter.css" />
<script type="text/javascript" src="js/validation.js"></script>
<script type="text/javascript" src="js/ajax.js"></script>
</head>
<body>

<?php
	include "header.php";
?>
<div id="content">
 
<form id="zhuce" name="zhuce" action="addregsiter.php" method="post" style="background:url(images/bg.gif) no-repeat;" onSubmit="return check();">
     <h1>天天注册</h1>
      <ul>
        <li><a href="#">1.填写注册信息</a></li>
        <li><a href="#">2.注册成功</a></li>
         
  </ul>
 <p style="font-size:12px; text-align:right; margin-right:100px;">以下<font style=" color:#F00;">*</font>为必填项</p>
    
    <table width="571" border="0" id="table2" >
      <tr>
        <td width="80" height="49"><font color="#FF0000">*</font>用 户 名：</td>
        <td width="166"><input name="yhm" id="usernameInput" type="text" onBlur="checkuser()" placeholder="请输入用户名" /></td>
        <td width="321" style="color:#8ec657; text-align:left; padding-left:5px;"><div id="content1"><font color="#0000FF";><img src="images/logintb.jpg" style="padding-right:5px;" />请填写您常用的Emai地址或手机号码 方便您记忆</font></div></td>
      </tr>
      <tr>
        <td height="49"><font color="#FF0000">*</font>登录密码：</td>
        <td><input name="dlmm" type="password" placeholder="请输入密码" /></td>
        <td style=" text-align:left; padding-left:5px;"><font color="#0000FF";><img src="images/logintb.jpg" style="padding-right:5px;" />6-20位英文字母或者数字建议采用易记的英文数字组合</font></td>
      </tr>
      <tr>
        <td height="61"><font color="#FF0000">*</font>确认密码：</td>
        <td><input name="qrmm" type="password" placeholder="请确认密码" /></td>
        <td style=" text-align:left; padding-left:5px;"><font color="#0000FF";><img src="images/logintb.jpg" style="padding-right:5px;" />必需与设置密码一致</font></td>
      </tr>
      
     <tr>
        <td height="49">联系电话：</td>
        <td><input name="lxdh" type="text" placeholder="请输入电话"/></td>
        <td  style=" text-align:left; padding-left:5px;"><font color="#0000FF";><img src="images/logintb.jpg" style="padding-right:5px;" />请正确填写</font></td>
      </tr>
      <tr>
        <td height="49"><font color="#FF0000">*</font>邮箱地址：</td>
        <td><input name="xydz" type="text" placeholder="请输入邮箱地址" /></td>
        <td style=" text-align:left; padding-left:5px;"><font color="#0000FF";><img src="images/logintb.jpg" style="padding-right:5px;" />请务必真实，并确认是您最常用的电子邮箱</font></td>
      </tr>
      <tr>
      <td height="49">用户地址:</td>
      <td><input type="text" name="yhdz"placeholder="请输入地址" /></td>
      <td style=" text-align:left; padding-left:5px;"><font color="#0000FF";><img src="images/logintb.jpg" style="padding-right:5px;" />填写城市名、区、街道、门牌号。</font></td>
      </tr>
      <tr>
        <td height="49"><font color="#FF0000">*</font>验 证 码：</td>
        <td><input name="yzm" type="text" placeholder="请输入用地址"/></td>
        <td style="text-align:left;"><img src="yzmimage.php" /></td>
      </tr>
      <tr>
        <td height="55" width="80"></td>
        <td> 
          <input type="submit" name="ok" id="ok" value="" style="background:url(images/bottom.gif); width:114px; height:51px; border:0px;" />
         </td>
         <td></td>
      </tr>
    </table>
    </form>

</div>
<div id="footer">
  <p>互联网信息服务备案编号：冀ICP备06003045号 技术支持：现代教育技术部 </p>
<p>Copyright @2012-2014,All Rights Reserved  京ICP证041189号</p>
</div></body>
</html>
