<?php
    session_start(); //开启 Session
    $_SESSION = array(); // 删除所有 Session 变量
    if(isset($_COOKIE[session_name()])){//判断 cookie 中是否保存 SessionID
         setcookie(session_name(),'',time()-3600);//删除SessionID
    }
    session_destroy(); //彻底销毁 Session
	header("Location:index.php");
?>
