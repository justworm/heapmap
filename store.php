<?php
	/**
	 * 往数据库存储数据
	 */
	
	require 'db.php';
	require 'config.php';

	//连接数据库
	$conn = connect($config);
	if ( !$conn ) die('Problem connecting to the db.');

	//验证是不是拿到了表单的数据
	if ( $_SERVER['REQUEST_METHOD'] === 'GET' ) {

		//有鼠标点击事件的情况
		//存储鼠标点击x,y坐标信息
		if( !empty($_GET["x"] ) && !empty( $_GET["y"] )){
			insertCoordinates("datas",$conn,$_GET["x"],$_GET["y"]);
		}

		//优化TODO：理论上只应该发生一次
		//存储html与body偏移量信息，即0 auto值带来的偏移量
		if( !empty($_GET["marginleft"] ) ){
			insertOffset("info",$conn,$_GET["marginleft"]);
		}	
	}

?>