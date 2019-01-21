<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>图片商城首页</title>
<link rel="stylesheet" type="text/css" href="css/yuding.css" />

    <?php
    include "include/conn.php";
    include "include/substr.php";
    //    获取推荐图书
    $sqlRecommedBook="select * from tb_book where recommend=1 order by pubdate desc limit 0,9";
    $resRecommedBook=mysqli_query($conn,$sqlRecommedBook);
    //    获取图书类型
    $sqlType = "select * from tb_type";
    $resType = mysqli_query($conn,$sqlType);
    //    获取公告
    $sqlGonggao = "select * from tb_gonggao"; //question:设置九条公告数目
    $resGonggao = mysqli_query($conn,$sqlGonggao);
    //    获取图书畅销榜
    $sqlNewBook = "select * from tb_book where newbook=1 order by pubdate desc limit 0,10";
    $resNewBook = mysqli_query($conn,$sqlNewBook);
    $numNewBook = 1;
    //   获取图书分类
    $sqlBookType = "select * from tb_type";
    $resBookType = mysqli_query($conn,$sqlBookType);
    //  获取同类型图书
    $key=$_GET["keyword"];
	$keyarr=explode(' ',$key);
	$sqlSameTypeBook="select * from tb_book";  
    for($i=0;$i<count($keyarr);$i++) 
	{
		if($i==0)
			$sqlSameTypeBook=$sqlSameTypeBook." where bookname like '%$keyarr[$i]%'";
		else
			$sqlSameTypeBook=$sqlSameTypeBook." and bookname like '%$keyarr[$i]%'";
	}
    $resSameTypeBook =mysqli_query($conn,$sqlSameTypeBook);
	$total=mysqli_num_rows($resSameTypeBook);
	$pagesize=4;
	$pagenum=ceil($total/$pagesize);
	if(isset($_GET["p"]))
		$curpage=$_GET["p"];
	else
		$curpage=1;
	$start=($curpage-1)*$pagesize;
	$sqlSameTypeBook2=$sqlSameTypeBook." limit $start,$pagesize";
	$curres=mysqli_query($conn,$sqlSameTypeBook2);
    ?>
</head>
<body>
<div id="header">
  <div id="login">
    <p><span class="p1">欢迎来天天书屋！<a href="login.php"><img  src="images/login1.gif" />请登录</a> <a href="regsiter.php"><img  src="images/login1.gif" />免费注册</a></span><span class="p2"> <a href="gouwuche.php"><img src="images/login2.gif" />购物车</a> <a href="dingdan.html"><img src="images/login2.gif" />我的订单</a></span></a> </p>
  </div>
  <div id="logo">
    <h1><img src="images/logo.gif" />各种好看的图书尽在天天书屋</h1>
  </div>
  <form action="" method="get" style="background-color:#0C6; width:300px; height:30px; margin:20px 30px 0px 0px; padding-top:10px; float:right; padding-left:10px;">
    <select name="全部分类" size="1" >
      <option value="全部分类">全部分类</option>
      <option value="全部分类">全部分类2</option>
    </select>
    <input name="" type="text" value="输入关键字" />
    <input name="搜索" type="button" id="搜索" value="搜索" />
  </form>
</div>
<div id="nav" >
  <ul>
    <li><a href="index.php">首页</a></li>
    <li><a href="yuding.html">新书预售</a></li>
    <li><a href="yuding.html">推荐图书</a></li>
    <li><a href="yuding.html">科技图书</a></li>
    <li><a href="yuding.html">教育图书</a></li>
    <li><a href="yuding.html">文艺图书</a></li>
    <li><a href="yuding.html">青春图书</a></li>
    <li><a href="yuding.html">励志图书</a></li>
    <li><a href="yuding.html">生活图书</a></li>
    <li><a href="yuding.html">管理图书</a></li>
  </ul>
</div><div id="content">
    <div id="left">
        <div id="subnav">
            <h3><img src="images/left.gif" />图书分类</h3>
            <?php
            while($rowType=mysqli_fetch_array($resType)) {
                ?>
                <h4><img src="images/login2.gif"/><a href="typeshow.php?tid=<?php echo $rowType['typeid']?>"><?php echo $rowType["typename"]?></a></h4>
                <?php
            }?>
        </div>
        <div id="bottom">
            <h3><img src="images/left.gif" />天天公告</h3>
            <ul>
                <?php
                while($rowGonggao=mysqli_fetch_array($resGonggao)) {
                    ?>
                    <li><a href="gonggao.html"><?php echo $rowGonggao["title"]?></li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>


  <div id="right">


    <?php
    if(mysqli_num_rows($curres)>0){
    while($rowSameTypeBook=mysqli_fetch_array($curres))
    { ?>
        <div id="r1">
            <div id="rleft"><a href="tushuchangxiao.php"><img src="admin/<?php echo $rowSameTypeBook['photo'];?>" style="width:150px;height: 150px; "/></a></div>
            <div id="rright">
                <h4><?echo $rowSameTypeBook['bookname']; ?></h4><p> <a href="tushuchangxiao.php"><?php echo chineseSubstr($rowSameTypeBook['introduction'],300); ?></a></p>
                <p  class="rp"><a href="tushuchangxiao.php">现价<span class="xianjia">￥<?php
            if($rowSameTypeBook['vipprice']<10)
                echo number_format($rowSameTypeBook['bookprice']*$rowSameTypeBook["vipprice"]/10,2);
            else
                echo number_format($rowSameTypeBook['bookprice']*$rowSameTypeBook["vipprice"]/100,2);
            ?>
        </span>原价<span class="yuanjia">¥<?php echo number_format($rowSameTypeBook['bookprice'],2);?></span> 折扣：<span class="zheko"><?php echo $rowSameTypeBook['vipprice']?>折 </span></a></p>
                <img src="images/goumia.png" /><img src="images/shoucang.png" /></div>
        </div>

<?php }} ?>





    <div id="fenye">
      <p>本站共有 <?php echo $total; ?> 条记录 每页显示 <?php echo $pagesize; ?> 条 第 <?php echo $curpage; ?> 页/共 <?php echo $pagenum; ?> 页 <a href="searchresult.php?keyword=<?php echo $key;?>&p=1" target="_self">首页</a> <a href="searchresult.php?keyword=<?php echo $key;?>&p=<?php 
		  if($curpage>1)
		  	echo $curpage-1;
		  else
			echo $curpage;
		  ?>" target="_self">上一页</a> <a href="searchresult.php?keyword=<?php echo $key;?>&p=<?php 
		  if($curpage<$pagenum)
		  	echo $curpage+1;
		  else
			echo $curpage;
		  ?>" target="_self">下一页</a> <a href="searchresult.php?keyword=<?php  echo $key; ?>&p=<?php echo $pagenum;?>" target="_self">尾页</a></p>
    </div>
  </div>
</div>
<div id="footer">
  <p>互联网信息服务备案编号：冀ICP备06001111号 技术支持：计算机系</p>
<p>Copyright @2012-2019,All Rights Reserved  京ICP证041189号</p>
</div>
</body>
</html>
