
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>图片商城首页</title>
    <link rel="stylesheet" type="text/css" href="css/index.css" />
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
</div>
<div id="content">
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
    <div id="con">
        <div id="banner">
            <script language="javascript" src="js/pptBox.js"></script>
            <script>
                var box =new PPTBox();
                box.width = 510; //宽度
                box.height = 314;//高度
                box.autoplayer = 3;//自动播放间隔时间
                //box.add({"url":"图片地址","title":"悬浮标题","href":"链接地址"})
                box.add({"url":"images/js4.png","href":"","title":"悬浮提示标题1"})//url为换图片 href为点击后链接的地址
                box.add({"url":"images/js2.png","href":"","title":"悬浮提示标题2"})//url为换图片 href为点击后链接的地址
                box.add({"url":"images/js3.png","href":"","title":"悬浮提示标题3"})//url为换图片 href为点击后链接的地址
                box.add({"url":"images/js.png","href":"","title":"悬浮提示标题4"})//url为换图片 href为点击后链接的地址
                box.show();
            </script>
        </div>
        <div id="right">
            <h3><img src="images/right.gif" /><span>图书畅销榜</span></h3>
            <?php
            while($rowNewBook=mysqli_fetch_array($resNewBook)) {
                ?>
                <p> <a href="yuding.html"><img src="images/<?php echo $numNewBook?>.gif" /><?php echo $rowNewBook['bookname'];?></a></p>
                <?php
                $numNewBook++;
            }?>
<!--            <p id="rp"> <a href="yuding.html"><img src="images/1.gif" />平凡的世界 </a></p>-->
<!--            <p> <a href="yuding.html"><img src="images/2.gif" />每天一份幸运惊喜</a></p>-->
<!--            <p><a href="yuding.html"> <img src="images/3.gif" />遇见未知自己</a></p>-->
<!--            <p><a href="yuding.html"> <img src="images/4.gif" />关系决定命运</a></p>-->
<!--            <p><a href="yuding.html"> <img src="images/5.gif" />面向对象、数据库、API</a></p>-->
<!--            <p><a href="yuding.html"> <img src="images/6.gif" /> 最丰富、权威、实用的专业</a></p>-->
<!--            <p> <a href="yuding.html"><img src="images/7.gif" />情绪决定行为</a></p>-->
<!--            <p> <a href="yuding.html"><img src="images/8.gif" />红军长征隐藏三十年的真相</a></p>-->
<!--            <p> <a href="yuding.html"><img src="images/9.gif" />最丰富、权威、实用的专业</a></p>-->
<!--            <p> <a href="yuding.html"><img src="images/10.gif" />性格决定命</a></p>-->
        </div>
        <div id="confooter">
            <h3><span class="hl"><img id="conimg" src="images/right5.gif" />推荐图书</span><span class="hr">更多推荐图书>></span></h3>

            <ul>
                <script language="javascript">
                    function resizeImage(obj){if(obj.height>55)obj.height=55;if(obj.width>60)obj.width=60; }
                </script>
                <?php
//                error_reporting(E_ALL & ~E_NOTICE);
                while($rowRecommedBook=mysqli_fetch_array($resRecommedBook)){
                    ?>
                    <li><a href="tushuchangxiao.php"> <img src="admin/<?php echo $rowRecommedBook['photo']; ?>" onload="resizeImage(this)" /></a>
                        <h5><span>名称：</span><a href="#"><?php echo chinesesubstr($rowRecommedBook['bookname'],12); ?></a></h5>
                        <p>作者:<?php echo $rowRecommedBook['author'];?></p>
                        <p>价格：<span><?php echo $rowRecommedBook['bookprice'];?></span></p>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
</div>
<div id="footer">
    <p>互联网信息服务备案编号：冀ICP备06001111号 技术支持：计算机系</p>
    <p>Copyright @2012-2019,All Rights Reserved  京ICP证041189号</p>
</div>
</body>
</html>
