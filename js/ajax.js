// JavaScript Document
var xmlHttp;
function S_xmlhttprequest(){
	if(window.ActiveXObject){
		xmlHttp=new ActiveXObject('Microsoft.XMLHTTP');
	}else if(window.XMLHttpRequest){
		xmlHttp=new XMLHttpRequest();
	}    
}
function checkuser(){
	S_xmlhttprequest();
	var yhm=document.zhuce.yhm.value;
	xmlHttp.open("GET","check.php?name="+yhm,true);
	xmlHttp.onreadystatechange=res;
	xmlHttp.send();
}
function res(){
    if(xmlHttp.readyState==4)
    {
        if(xmlHttp.status==200)
        {
            var result=xmlHttp.responseText;
            //用户名判断
            var checkyhm=/^[a-zA-Z]\w{5,19}$/;
            var yhm=document.zhuce.yhm.value;
            if(document.getElementById('usernameInput').value=="")
            {
                document.getElementById("usernameInput").setAttribute("placeholder","请输入您的用户名");
                document.getElementById('content1').innerHTML="<p><img src='images/wrong.png'/>用户名不能为空</p>";
            }
            else if(!checkyhm.test(yhm))
            {
                document.getElementById('content1').innerHTML="<p><img src='images/wrong.png' />用户名无法使用</p>";
            }
            else
            {
                if(result==false)
                {
                    document.getElementById('content1').innerHTML="<p><img src='images/wrong.png'/>用户名已经存在</p>";
                }
                else
                {
                    document.getElementById('content1').innerHTML="<p><img src='images/right.png'/>用户名可以使用</p>";
                }
            }
        }
    }
}