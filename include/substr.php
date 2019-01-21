<?php
/**
 * Created by PhpStorm.
 * User: wan11
 * Date: 2018-09-10
 * Time: 09:39
 */

////使用数据库查询语句
//$sql = "select * from tb_type";
////通过result返回结果
//$result = mysqli_query($conn,$sql);
//
//while($row=mysqli_fetch_array($result))
//{
//    echo $row["typeid"];echo "&nbsp";
//    echo $row["typename"];echo "&nbsp";
//    echo chineseSubstr($row[2],100);
//    echo "<br>";
//}
//
//$num = mysqli_num_rows($result);
//echo "一共有 $num 个类别";
//
//定义函数
/**
 * @param $str
 * @param $length
 * @return string
 */
function chineseSubstr($str, $length)
{
    if($length<strlen($str))
    {
        for($i=0;$i<$length;$i++)
        {
            //中文大于0xa0
            if(ord(substr($str,$i,1))>0xa0 )
            {
                $tempstr=$tempstr.substr($str,$i,3);
                $i+=2;
            }
            else
            {
                $tempstr=$tempstr.substr($str,$i,1);
            }
        }

        $tempstr.="...";
    }
    else
        {
            $tempstr=$str;

        }
    return $tempstr;
}