<?php

	/**
	 * 从数据库返回数据
	 */

	require "db.php";
	require 'config.php';
	header('Content-type: text/json');

	//连接数据库
	$conn = connect($config);
	if ( !$conn ) die('Problem connecting to the db.');

	//从数据库里面拿数据(coordinates)
	$stmt = get("datas", $conn);

	//变量声明 -为了数据(coordinates)格式转换
	$arr = array();
	$sum = array();

	//变量声明 -为了组合两种数据
	$datas = array();

	//筛选需要的数据(coordinates)
	foreach ($stmt as $data) {
		extract($data);
		$arr["x"]=$x;
		$arr["y"]=$y;
		$arr["count"]=$count;
		$sum[]=$arr;
	}
	$datas[0] = $sum;

	//拿数据(offset)
	$infos = get("info", $conn);

	//优化TODO- 当$infos为空的情况
	
	//筛选需要的数据(offset)
	foreach ($infos as $info) {
		extract($info);
	}

	$datas[1] = $margin;

	// 返回JSON数据格式
	// 索引0放置‘xy坐标',索引1放置'偏移量''
	echo json_encode($datas);
?>
