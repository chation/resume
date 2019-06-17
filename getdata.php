<?php
$conn = mysqli_connect('127.0.0.1','',''); // 上传到github 去掉了数据库密码
mysqli_select_db($conn,"myindex");
mysqli_query($conn,"set names 'utf8'");
if($_POST["type"] == "get"){
	$sql = "SELECT * FROM province";
	$res = $conn->query($sql);
	while($row = $res->fetch_assoc()){
		$province[] = $row;
	}
	foreach($province as $k=>$v){
		if(!$v["went_time"]){
			$province[$k]["went_time"] = "";
		}
		if(!$v["remark"]){
			$province[$k]["remark"] = "";
		}
		if(!$v["isgo"]){
			$province[$k]["flag"] = "还没有去过这个地方哦~";
		}else{
			$province[$k]["flag"] = "";
		}
	}

	$sql = "SELECT name FROM province WHERE isgo=1";
	$res = $conn->query($sql);
	while($row = $res->fetch_assoc()){
		$isgo[] = $row["name"];
	}

	$return_arr = array("province"=>$province, "isgo"=>$isgo);

	echo json_encode($return_arr);
}else if($_POST["type"] == "submit"){
	$sql = "UPDATE province SET isgo=1, went_time='".$_POST["time"]."', remark='".$_POST["remark"]."' WHERE name='".$_POST["name"]."'";
	$conn->query($sql);
	echo json_encode(array("msg"=>"添加成功！","code"=>1));
}

