<?php /* Smarty version 2.6.30, created on 2018-04-19 05:53:38
         compiled from index.html */ ?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
	<meta charset="utf-8">
	<meta http--equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<title>登录</title>
</head>

<body onload="getCookie();">
	<div id="app">
		<div class="student_system">学 生 宿 舍 管 理 系 统</div>
		<div class="student_eng">STUDENT DORMITORY MANAGEMENT SYSTEM</div>

		<div class="student_bg">
			<!-- <div class="student_choose_role"></div>
			<div class="student_role-wrap">
				<div class="student_role" @click="isRole1">
					<img src="./css/img/BS_admin.png" alt="图">
					<span class="role">学&nbsp;&nbsp;&nbsp;生</span>
				</div>
				<div class="student_role" @click="isRole3">
					<img src="./css/img/BS_admin.png" alt="图">
					<span class="role">管理员</span>
				</div>
			</div> -->
			<!-- <div class="student_role-changewrap">
				<div class="student_changerole1" v-show="isShow1">
					<img src="./css/img/BS_chosen.png" alt="图">
				</div>
				<div class="student_changerole3" v-show="isShow3">
					<img src="./css/img/BS_chosen.png" alt="图">
				</div>
			</div> -->
			<div class="student_sbt">- 宿舍管理系统 -</div>

			<div class="bg-right">
				<form method="post">
					<div class="wel_login">欢迎登录</div>
					<div class="inp">
						<input type="text" placeholder="账号" name="no" id="login_code" required autofocus>
					</div>
					<div class="inp">
						<input type="password" placeholder="密码" name="password" id="login_password" required>
					</div>
					<div class="code-wrap">
						<input type="text" class="ver_code" name="CAPTCHA" id="checkcode" maxlength="4" placeholder="验证码" >
						<input type="image" class="codetu" src="background/image.php" alt="点击刷新" onclick="this.src='background/image.php?aa=random()'"
						/>
					</div>
					<div class="stu_cookie_wrap">
						<div class="stu_cookie">
							<input type="checkbox" class="stu_cookie_inp" value="None" id="checkbox">记住密码
						</div>
					</div>
					<button type="submit" class="stu_login" id="subLogin" onclick="login();">登录</button>
				</form>
			</div>
		</div>
	</div>
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/jquery.cookie.js"></script>
	<script src="js/jquery.base64.js"></script>
	<!-- <script src="./js/vue.js"></script>
	<script>
		new Vue({
			el: "#app",
			data: {
				isShow1: false,
				isShow2: false,
				isShow3: false,
			},
			methods: {
				isRole1: function () {
					this.isShow1 = true
					this.isShow3 = false
				},
				isRole3: function () {
					this.isShow1 = false
					this.isShow3 = true
				},
			}
		})
	</script> -->
	<script language="javascript" type="text/javascript">   
		function setCookie() { //设置cookie    
			var loginCode = $("#login_code").val(); //获取用户名信息    
			var pwd = $("#login_password").val(); //获取登陆密码信息    
			var checked = $("[name='checkbox']:checked");//获取“是否记住密码”复选框  

			if (checked) { //判断是否选中了“记住密码”复选框    
				$.cookie("login_code", loginCode);//调用jquery.cookie.js中的方法设置cookie中的用户名    
				$.cookie("pwd", $.base64.encode(pwd));//调用jquery.cookie.js中的方法设置cookie中的登陆密码，并使用base64（jquery.base64.js）进行加密    
			} else {
				$.cookie("pwd", null);
			}
		}
		function getCookie() { //获取cookie    
			var loginCode = $.cookie("login_code"); //获取cookie中的用户名    
			var pwd = $.cookie("pwd"); //获取cookie中的登陆密码    
			if (pwd) {//密码存在的话把“记住用户名和密码”复选框勾选住    
				$("#checkbox").attr("checked", "true");
			}
			if (loginCode) {//用户名存在的话把用户名填充到用户名文本框    
				$("#login_code").val(loginCode);
			}
			if (pwd) {//密码存在的话把密码填充到密码文本框    
				$("#login_password").val($.base64.decode(pwd));
			}
		}
		function login() {
			var userName = $('#login_code').value;
			if (userName == '') {
				alert("请输入用户名。");
				return;
			}
			var userPass = $('#login_password').value;
			if (userPass == '') {
				alert("请输入密码。");
				return;
			}
			//判断是否选中复选框，如果选中，添加cookie  
			if ($("[name='checkbox']").attr("checked", "true")) {
				//添加cookie    
				setCookie();
				// alert("记住密码登录。");    
				// window.location = "http://www.baidu.com";    
			}
			// else{    
			//     alert("不记密码登录。");    
			//     window.location = "http://www.baidu.com";    
			// }    
		}    
	</script>
</body>

</html>