<?php

/**
 * 数据库相关操作
 */

//连接数据库
function connect($config){
	try {
		$conn = new \PDO('mysql:host=localhost;dbname=' . $config['database'],
						$config['username'],
						$config['password']);

		$conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

		return $conn;
	} catch(Exception $e) {
		return false;
	}
}

//获取一张表中的全部数据
function get($tableName, $conn)
{
	try {
		$result = $conn->query("SELECT * FROM $tableName ");

		return ( $result->rowCount() > 0 )
			? $result
			: false;
	} catch(Exception $e) {
		return false;
	}
}

//优化TODO 合并 

//往数据库插入x,y坐标
function insertCoordinates($tableName,$conn,$x,$y){
	if($x && $y){
		try {
			$result = $conn->prepare("INSERT INTO $tableName(x,y,count) VALUES(:x,:y,:count)");
			$result->execute(array(
				"x" => $x,
				"y" => $y,
				"count" => 2
				));

			return ( $result->rowCount() > 0 )
				? $result
				: false;
		} catch(Exception $e) {
			return false;
		}
	}else{
		return "no x,y data";
	}
}

//往数据库插入偏移量
function insertOffset($tableName,$conn,$offset){
	if($offset ){
		try {
			$result = $conn->prepare("INSERT INTO $tableName(margin) VALUES(:offset)");
			$result->execute(array(
				"offset" => $offset
				));

			return ( $result->rowCount() > 0 )
				? $result
				: false;
		} catch(Exception $e) {
			return false;
		}
	}else{
		return "no offset ";
	}
}

?>