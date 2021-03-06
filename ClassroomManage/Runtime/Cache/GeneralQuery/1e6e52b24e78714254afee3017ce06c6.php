<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>综合查询结果</title>
	<meta charset="utf-8" name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height" />

</head>
<body >
	<link rel="stylesheet" href="/ClassroomManage/ClassroomManage/Common/js/
	jquery.mobile-1.3.2.css">
	<script src="/ClassroomManage/ClassroomManage/Common/js/jquery-2.1.4.min.js"></script>
	<script src="/ClassroomManage/ClassroomManage/Common/js/jquery.mobile-1.3.2.js"></script>
	<script>
		var courseList = JSON.parse(sessionStorage.getItem("courseList"));
		var roomName = JSON.parse(sessionStorage.getItem("roomName"));

		$(document).ready(function(){
  			$("#tableTitle").html(roomName + "查询结果");
  			for (var i = 0;i <= courseList.length - 1; i++) {
  				var tr = "<tr><td >" + (i+1) + "</td><td>"
  						+ courseList[i]['courseName'] + "</td><td>"
						+ courseList[i]['startTime'] + "</td><td>"
						+ courseList[i]['endTime'] + "</td></tr>";
				$("#listTable tr:last").after(tr);
			}
		});

		function returnMain(){
        	sessionStorage.clear();
        	window.location.href="/classroomManage/index.php/main";
        }

	</script>
	<style type="text/css">
		.headcss{
			height:10%;
			font-size:20px;
			text-align: center;
		}
		.foot
		{
			bottom: 0;
			height: 11%;
		}
		.loginoutlink
		{
			width: 100%;
			margin-top: 0px;
			height: 100%;
		}
		.loginoutbtn
		{
			color: #fff;
			margin-top: 9px;
			font-size: 20px;
		}
	</style>

	<div data-role="page">
		<div class="headcss" data-role="header" data-position="fixed">
			<div style="margin-top: 18px;">综合查询</div>
		</div>

		<div data-role="content" class="contentStyle">

			<table id="listTable">
				<caption id="tableTitle" align="top"></caption>
				<tr style="max-width: 100%;min-width: 100%;">
				<th style="max-width: 25%;min-width: 25%;">序号</th>
				<th style="max-width: 25%;min-width: 25%;">课程名称</th>
				<th style="max-width: 25%;min-width: 25%;">上课时间</th>
				<th style="max-width: 25%;min-width: 25%;">下课时间</th>
				</tr>
			</table>
		</div>
		<div class="foot" data-role="footer"
		data-position="fixed"  ><!-- data-fullscreen="true" -->
			<a href="javascript:returnMain()" class="loginoutlink" data-transition="flow"
				data-role="button" data-inline="true" data-corners="false">
				<div class="loginoutbtn">返回主菜单</div>
			</a>
		</div>
	</div>

</body>
</html>