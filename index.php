<?php
require "views/index.view.php";
?>

<script src="scripts/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="scripts/heatmap.js"></script>
<script>
	//load 被监测网站的快照
	//优化TODO -去除重复load
	$("#frame").attr("src", "http://localhost/xampp/justworm/myHeatmap/demo.php");
	

	//获取偏移量
	//为了使得热图与快照一一对应
	$.get("data.php", function($data){
		$("#frame").css("padding-left",$data[1]+"px");
	});
	
	//从服务器获取数据
	$.get("data.php", function($data){
		//所有点击的坐标数据
		arr=$data[0];

		//转换格式
		window.data = {};
		window.data.data =arr;
		//设置最大点击数
		window.data.max = 18;
		
		//开始时间
		var start = +new Date;

		//创建热图
		var heatmapInstance = h337.create({
			"element":document.getElementById("heatmapArea"), 
			"radius":25,
			"visible":true,
			"legend": {
				"title": "Mouse Events",
				"position": "br",
				"offset": 10
			}
		});

		heatmapInstance.store.setDataSet(data); 

		// 返回统计信息   
		document.getElementById("result").innerHTML = "共花费 " + (((+new Date)-start)+'毫秒， 总计 ' + data.data.length + ' 数据点');
	});

</script>
</body>
</html>
