<?php
//测试连接服务器
$conn = @mysqli_connect("localhost","root","")or die("数据库连接失败:".mysqli_connect_error());
//当服务器连接成功后，选择数据库
$select =@mysqli_select_db($conn,"db_shop")or die("选择数据库失败:".mysqli_error($conn));
//设置字符编码
mysqli_set_charset($conn,"utf8");





?>