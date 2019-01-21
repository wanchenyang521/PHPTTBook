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
    $typeid = $_GET["tid"];
    $sqlSameTypeBook="select * from tb_book where typeid=$typeid";
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
<?php
	include "header.php";
?>
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
//    error_reporting(E_ALL & ~E_NOTICE);//通过修改php.ini无效后使用
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
                <a href="addgwc.php?bookid=<?php echo $rowSameTypeBook['bookid']; ?>"><img src="images/goumia.png" /></a><img src="images/shoucang.png" /></div>
        </div>

<?php }} ?>





    <div id="fenye">
      <p>本站共有 <?php echo $total; ?> 条记录 每页显示 <?php echo $pagesize; ?> 条 第 <?php echo $curpage; ?> 页/共 <?php echo $pagenum; ?> 页 <a href="typeshow.php?tid=<?php echo $typeid;?>&p=1" target="_self">首页</a> <a href="typeshow.php?tid=<?php echo $typeid;?>&p=<?php 
		  if($curpage>1)
		  	echo $curpage-1;
		  else
			echo $curpage;
		  ?>" target="_self">上一页</a> <a href="typeshow.php?tid=<?php echo $typeid;?>&p=<?php 
		  if($curpage<$pagenum)
		  	echo $curpage+1;
		  else
			echo $curpage;
		  ?>" target="_self">下一页</a> <a href="typeshow.php?tid=<?php  echo $typeid; ?>&p=<?php echo $pagenum;?>" target="_self">尾页</a></p>
    </div>
  </div>
</div>
<div id="footer">
  <p>互联网信息服务备案编号：冀ICP备06001111号 技术支持：计算机系</p>
<p>Copyright @2012-2019,All Rights Reserved  京ICP证041189号</p>
</div>
</body>
</html>
