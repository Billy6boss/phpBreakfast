<?php
include("db.php"); //連接伺服器



//從網頁裡post到的帳號

$fid= $_POST['fid'];
$id = $_POST['id'];

$sql = "DELETE FROM `classtest`.`order` WHERE `order`.`id` = ".$id." AND `order`.`food_id` = ".$fid."";
echo $sql."<br>";
 $result = mysqli_query($conn,$sql); //回傳true 跟flase



 if ($result) {

echo "已成功刪除";
header('Location: order.php');
}
else{
	echo "失敗";
}

?>