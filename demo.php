<?php
require 'views/header.php';
require "views/demo.view.php";
require 'views/footer.php';
?>

<script src="scripts/jquery-1.9.1.min.js"></script>
<script>

	//发屏幕信息(offset)给服务器保存
	var offset = ($("html").width()-$("body").width())/2;
	$.ajax({url:"store.php?marginleft="+ offset, async:false});


	// 绑定鼠标事件
	// 鼠标一点击，就把坐标信息x,y发去服务器
	$("body").on("click",function(evt){		

		//pageX与client的区别？
		$.ajax({url:"store.php?x="+evt.pageX+"&y="+evt.pageY,async:false});
		//$.ajax({url:"store.php?x="+evt.clientX+"&y="+evt.clientY,async:false});
	});

</script>
</body>
</html>
