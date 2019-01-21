<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>图片商城首页</title>
<link rel="stylesheet" type="text/css" href="css/changxiao.css" />
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
    <li><a href="tushuchangxiao.php">图书畅榜</a></li>
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
  <div id="right">
    <h3>白鹿原（茅盾文学奖获奖经典作品，权威未删节平装版)</h3>
    <div id="rleft"><img  src="images/book.gif" /><img class="img2" src="images/xbook.gif" /></div>
    <div id="rright">
      <p class="p2">原价：<span>￥32.00</span></p>
      <p class="p3">现价：￥22.0 </p>
      <p class="p4">作 者：<span>陈忠实</span>著</p>
      <p class="p5">出版社：<span>北京十月文艺出版社</span></p>
      <p>出版时间：2011-9-1</p>
      <p>购买数量：
        <input name="" type="text"  width="50" />
        件</p>
      <form id="form1" name="form1" method="post" action="">
        <label> <a href="gouwuche.php"><img src="images/images.jpg" /></a>
        </label>
      </form>
    </div>
    <div id="rfooter">
      <ul>
       
        <li><a href="#">内容简介</a></li>
        
      </ul>
      <p> 陈忠实的长篇小说《白鹿原》，以陕西关中平原上素有“仁义村”之称的白鹿村为背景，细腻地反映出白姓和鹿姓两大家族祖孙三代的恩怨纷争。全书浓缩着深沉的民族历史内涵，有令人震撼的真实感和厚重的史诗风格。1993年6月出版后，其畅销和广受海内外读者赞赏欢迎的程度为中国当代文学作品所罕见。1997年荣获中国长篇小说最高荣誉———第四届茅盾文学奖。后被改编成同名话剧、电影等多种形式。</p>
          <p> 陈忠实的长篇小说《白鹿原》，以陕西关中平原上素有“仁义村”之称的白鹿村为背景，细腻地反映出白姓和鹿姓两大家族祖孙三代的恩怨纷争。全书浓缩着深沉的民族历史内涵，有令人震撼的真实感和厚重的史诗风格。1993年6月出版后，其畅销和广受海内外读者赞赏欢迎的程度为中国当代文学作品所罕见。1997年荣获中国长篇小说最高荣誉———第四届茅盾文学奖。后被改编成同名话剧、电影等多种形式。</p>
           <p> 陈忠实的长篇小说《白鹿原》，以陕西关中平原上素有“仁义村”之称的白鹿村为背景，细腻地反映出白姓和鹿姓两大家族祖孙三代的恩怨纷争。全书浓缩着深沉的民族历史内涵，有令人震撼的真实感和厚重的史诗风格。1993年6月出版后，其畅销和广受海内外读者赞赏欢迎的程度为中国当代文学作品所罕见。1997年荣获中国长篇小说最高荣誉———第四届茅盾文学奖。后被改编成同名话剧、电影等多种形式。</p>
     
    </div>
  </div>
</div>
<div id="footer">
  <p>互联网信息服务备案编号：冀ICP备06001111号 技术支持：计算机系</p>
<p>Copyright @2012-2019,All Rights Reserved  京ICP证041189号</p>
</div>
</body>
</html>
