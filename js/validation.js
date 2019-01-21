// JavaScript Document
function check(){
		var yhm=document.zhuce.yhm.value;
		if(yhm=="")
		{
			alert("用户名不能为空");
			document.zhuce.yhm.focus();
			return false;
		}
		var checkyhm=/^[a-zA-Z]\w{5,19}$/;
		if(!checkyhm.test(yhm)){
			alert("用户名应由6-20位字母、数字或下划线组成，字母开头");
			document.zhuce.yhm.focus();
			document.zhuce.yhm.select();
			return false;
		}

		var dlmm=document.zhuce.dlmm.value;
		if(dlmm=="")
		{
			alert("登录密码不能为空");
			document.zhuce.dlmm.focus();
			return false;
		}

		var checkpwd=/^[a-zA-Z0-9]{6,20}$/;
		if(!checkpwd.test(dlmm)){
			alert("密码应由8-20位字母或数字组成");
			document.zhuce.dlmm.focus();
			document.zhuce.dlmm.select();
			return false;
		}

		var qrmm=document.zhuce.qrmm.value;
		if(qrmm=="")
		{
			alert("确认密码不能为空");
			document.zhuce.qrmm.focus();
			return false;
		}

		if(dlmm!=qrmm){
			alert("两次密码输入不一致，请重新输入");
			document.zhuce.dlmm.focus();
			document.zhuce.dlmm.select();
			return false;
		}

		var xydz=document.zhuce.xydz.value;
		if(xydz=="")
		{
			alert("邮箱地址不能为空");
			document.zhuce.xydz.focus();
			return false;
		}
		var yzm=document.zhuce.yzm.value;
		if(yzm=="")
		{
			alert("验证码不能为空");
			document.zhuce.yzm.focus();
			return false;
		}


		var checklxdh=/^1(?:3\d|4[4-9]|5[0-35-9]|6[67]|7[013-8]|8\d|9\d)\d{8}$/;
		if(!checklxdh.test(lxdh)){
			alert("手机号码不正确！");
			document.zhuce.lxdh.focus();
			document.zhuce.lxdh.select();
			return false;
		}
		var checkxydz=/^[A-Za-z\d]+([-_.][A-Za-z\d]+)*@([A-Za-z\d]+[-.])+[A-Za-z\d]{2,4}$/;
		if(!checkxydz.test(xydz)){
			alert("邮箱格式不正确！");
			document.zhuce.xydz.focus();
			document.zhuce.xydz.select();
			return false;
		}
		return true;
	}