<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>查空教室结果</title>
	<meta charset="utf-8" name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height" />

</head>
<body >
	<link rel="stylesheet" href="/ClassroomManage/ClassroomManage/Common/js/
	jquery.mobile-1.3.2.css">
	<script src="/ClassroomManage/ClassroomManage/Common/js/jquery-2.1.4.min.js"></script>
	<script src="/ClassroomManage/ClassroomManage/Common/js/jquery.mobile-1.3.2.js"></script>
	<script>
		var classroomList = JSON.parse(sessionStorage.getItem("classroomList"));
		var buildingName = sessionStorage.getItem("buildingName");

		$(document).ready(function(){
  			$("#tableTitle").html(buildingName + "查询结果");
  			for (var i = 0;i <= classroomList.length - 1; i++) {
  				var tr = "<tr><td >" + (i+1) + "</td><td>"
						+ classroomList[i]['floor'] + "楼" + "</td><td>"
						+ classroomList[i]['roomNumber'] + "</td></tr>";
				$("#listTable tr:last").after(tr);
			}
		});

		function returnMain(){
        	sessionStorage.clear();
        	window.location.href="/classroomManage/index.php/main";
        }

	</script>
	<style type="text/css">
		td{
			text-align: center;max-width: 33%;min-width: 33%;
			color: #f60;
			opacity: 0.5;
			font-size: 18px;
		}
		.headcss{
			height:10%;
			font-size:20px;
			text-align: center;
		}
		#listTable{
			max-width: 100%;min-width: 100%;
		}
		.foot
		{
			bottom: 0;
			height: 10%;
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
			<div class="headcss">查询空教室</div>
		</div>

		<div data-role="content" class="contentStyle">

			<table id="listTable">
				<caption id="tableTitle" align="top"></caption>
				<tr style="max-width: 100%;min-width: 100%;">
				<th style="max-width: 33%;min-width: 33%;">序号</th>
				<th style="max-width: 33%;min-width: 33%;">楼层</th>
				<th style="max-width: 33%;min-width: 33%;">教室</th>
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