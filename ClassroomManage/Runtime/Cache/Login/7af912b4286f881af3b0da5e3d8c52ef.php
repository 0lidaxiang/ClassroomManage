<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8" name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height" />
	<link rel="stylesheet" href="/ClassroomManage/ClassroomManage/Common/js/
	jquery.mobile-1.3.2.css">
	<script src="/ClassroomManage/ClassroomManage/Common/js/jquery-2.1.4.min.js"></script>
	<script src="/ClassroomManage/ClassroomManage/Common/js/jquery.mobile-1.3.2.js"></script>
	<!-- // <script type="text/javascript" src="cordova-2.6.0.js" charset="utf-8"></script> -->

	<script type="text/javascript">
		// 页面载入时
		$(document).ready(function(){
			// 检查浏览器是否支持localStorage
	    	if(window.localStorage){
	    		// 若已经存在登录用户，则直接跳转到主界面
	    		if (localStorage.getItem("userName") != null){
					// alert("已经存在！");
					sessionStorage.clear();
					window.location.href="/classroomManage/index.php/main";
				}
	    	}
	    	else{
	    		alert("浏览暂不支持localStorage.无法使用!");
	    		return;
	    	}
		});

		// 重置按钮，将会清空两个输入框的值
		function reset(){
			$("#userName").val("");
			$("#password").val("");
		}

		// 检查用户名和密码是否全都输入
		function login() {
			var userName = $.trim($("#userName").val());
			var password = $.trim($("#password").val());

			if (userName == ""|| password == "") {
				alert("用户名或密码没有输入！");
			}
			else{
				var parms={
			        "userName":userName,
			        "password":password,
	    		};

	    		$.ajax({
				        type:"post",
				        url:"/classroomManage/index.php/login",
				        data:parms,

				        success:function(responseData){
				            //fortest: alert(responseData);
				            if(responseData==0){
				            	localStorage.setItem("userName",userName);
				            	sessionStorage.clear();
				                window.location.href="/classroomManage/index.php/main";
				            } if(responseData==3){
				                alert("用户名或密码错误!");
				                history.go(0);
				            }
				        }
			    });

			}
		};

		// 在页面加载前，这里用了jquery里的css()方法，它可以直接操作某个元素或标签的属性
		$(document).on("pagebeforecreate",function(){
			var h = $(document.body).outerHeight(true)
			h = h / 6;
			$("#content1").css(
				{'position':'relative','top':h+'px'}
			);
		}
		);
	</script>

	<style type="text/css">
		.headcss{
			height:67px;
			font-size:20px;
			text-align: center;
		}
		.footcss{
			height:20%;
		}

		#userName{
			font-size: 20px;
			height: 25px;
		}
		#password{
			font-size: 20px;
			height: 25px;
		}
		#passwordDiv{
			margin-top:3%;
		}
		#resetbtn{
			height:50%;
			width:100%;
		}
		#loginbtn{
			height:50%;
			width:100%;
		}
		.fontSize28css{
			font-size: 20px;
			text-align:center;
		}
		.fontSize32css{
			font-size: 24px;
			text-align:center;
		}
	</style>
</head>

<body>
	<!-- jquery-mobile样式页面 -->
	<div class="pagecss" data-role="page" >
		<!-- 页面顶部 -->
		<div class="headcss" data-role="header">
			<div style="margin-top: 23px;">NJCIT教室管理系统</div>
		</div>

		<!-- 页面内容 -->
		<div data-role="content" id="content1" >
			<form id="formLogin" method="post" action="LoginAction.act">
				<div >
					<input name="userName" id="userName" placeholder="UserName"/>
				</div>

				<div id="passwordDiv">
					<input name="password" id="password" type="password"  placeholder="Password"/>
				</div>

			</form>
		</div>

		<!-- 页面底部 -->
		<div class="footcss" data-role="footer"  data-fullscreeen="true" data-position="fixed">
			<a id="resetbtn"  data-corners="false" href="javascript:reset()" data-role="button" >
				<span class="fontSize32css">重置</span>
			</a>
			<a id="loginbtn" class="fontSize24css" data-corners="false" href="javascript:login()" data-role="button">
				<span class="fontSize32css">登录</span>
			</a>
		</div>
	</div>
</body>
</html>