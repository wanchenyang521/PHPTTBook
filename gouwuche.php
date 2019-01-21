<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>图片商城首页</title>
    <link rel="stylesheet" type="text/css" href="css/gouwuche.css" />
</head>
<body>
<?php
include "header.php";
?>
<script language="javascript">
    function resizeImage(obj){if(obj.height>50)obj.height=50;if(obj.width>50)obj.width=50; }
</script>
<div id="content"> <img src="images/gouwuche.jpg"  />
    <form action="changegwc.php" method="post" onsubmit="return slyz()">
        <table width="1000" border="1" bordercolor='#006600' bgcolor="#FFFFFF"  cellspacing="0" >
            <tr >
                <th width="214" >商品名称</th>
                <th width="252">商品价格</th>
                <th width="261">商品数量</th>
                <th width="255">操作</th>
            </tr>
            <?php
            session_start();
            $arr=$_SESSION['mybook'];
            if(!is_array($arr)){
                echo "<script>alert('您还没有选购图书，请选择图书');</script>";
                echo "<script>location.href='index.php';</script>";
            }
            else{
                $total=0;
                foreach($arr as $book)
                {
                    $bookid=$book['bookid'];
                    $bookname=$book['bookname'];
                    $booknum=$book['booknum'];
                    include "include/conn.php";
                    $sql="select * from tb_book where bookid=$bookid";
                    $res=mysqli_query($conn,$sql);
                    $row=mysqli_fetch_array($res);
                    ?>
                    <tr >
                        <td style="border-top:1px #F60 solid;"><p><img src="admin/<?php echo $row['photo']; ?>" width="44" height="59" onload="resizeImage(this)"/>
                                <a href="#"><?php echo $bookname; ?></a></p></td>
                        <td style="border-top:1px #F60 solid;">￥<?php
                            if($row['vipprice']<10){
                                $price=number_format($row['bookprice']*$row['vipprice']/10,2);
                            }
                            else{
                                $price=number_format($row['bookprice']*$row['vipprice']/100,2);
                            }
                            echo $price;
                            $total+=$price*$booknum;
                            ?> </td>
                        <!-- <td style="border-top:1px #F60 solid;"><input type="sl" name="textfield" id="textfield"  value=""/></td>-->
                        <td style="border-top:1px #F60 solid;"><input type="text" name="<?php echo $bookid; ?>" id="textfield"  value="<?php echo $booknum; ?>" onblur="slyz()"/></td>
                        <td style="border-top:1px #F60 solid; border-right:0px"><a href="delgwc.php?bookid=<?php echo $bookid;?>">取消商品</a></td>
                    </tr>
                    <?php
                }
            }
            ?>
        </table>
        <div id="ft">
            <p>
                <span class="p1"><input type="submit" value="修改商品数量" /></span>
                <span class="p1"><a href="delgwc2.php">清空购物车</a> </span>
                <span class="p2" > 商品金额总计：￥<?php echo number_format($total,2);?></span>
            </p>
        </div>
        <input class="i1" name="ok" value="" type="submit" style="background:url(images/jiesuan.jpg) no-repeat; border:0px; width:150px; height:50px;  "   />
        <a href="index.php"> <img src="images/gouwu.jpg" class="i1"/> </a>
    </form>
</div>
</body>
</html>
