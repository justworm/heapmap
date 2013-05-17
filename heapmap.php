<?php
	require "views/heapmap.view.php";
?>

<script type="text/javascript" src="scripts/heatmap.js"></script>
<script src="scripts/jquery-1.9.1.min.js"></script>

<script type="text/javascript">
	//从服务器获取数据
	$.get("data.php", function($data){
		arr=$data[0];
		window.data = {};

		//设置最大点击数
		window.data.max = 18;
		window.data.data =arr;

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
		document.getElementById("result").innerHTML = "创建与渲染此热图共花费 " + (((+new Date)-start)+'毫秒， 总计 ' + data.data.length + ' 数据点');
	});

</script>

	
</body>
</html>