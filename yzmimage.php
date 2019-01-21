<?php
session_start();  //启动session  
header("Content-type:image/gif");  //输出头信息
$image_w=100;  //图像的宽
$image_h=25;  //图像的高
$number=range(0,9); //生成一个成员为数字的数组 
$character=range("A","Z");  //生成一个成员为大写字母的数组
$result=array_merge($number,$character);  //合并两个数组
$string=""; //初始化 
$len=count($result); //新数组的长度
for($i=0;$i<4;$i++)
{
	$new_number[$i]=$result[rand(0,$len-1)];  //在$result数组中随机取出一个字符
	$string=$string.$new_number[$i];  //生成验证码字符串
}
$_SESSION["yzm"]=$string;  //将验证码字符串保存到session文件中
$check_image=imagecreatetruecolor($image_w,$image_h);  //创建一副空白图片
$white=imagecolorallocate($check_image,255,255,255);
$black=imagecolorallocate($check_image,0,0,0);
imagefill($check_image,0,0,$white);  //设置背景颜色为白色
for($i=0;$i<100;$i++)  //加入100个干扰的黑点
{
	imagesetpixel($check_image,rand(0,$image_w),rand(0,$image_h),$black);
}
for($i=0;$i<4;$i++) //将四位验证码输出到图片中 
{
	$x=mt_rand(1,8)+$image_w*$i/4; //[1,8] [26,33] [51,58]  [76,83]
	$y=mt_rand(1,$image_h/4);  //[1,6]
	$color=imagecolorallocate($check_image,mt_rand(0,200),mt_rand(0,200),mt_rand(0,200));
	imagestring($check_image,5,$x,$y,$new_number[$i],$color);
}
	imagepng($check_image);
	imagedestroy($check_image);
?>