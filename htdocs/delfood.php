<?php
include("db.php"); //連接伺服器



//從網頁裡post到的帳號

$fid= $_POST['fid'];

$sql = " DELETE FROM `food` WHERE `food_id` = ".$fid."";
echo $sql."<br>";
$result = mysqli_query($conn,$sql); //回傳true 跟flase



 if ($result) {

echo "已成功刪除";
header('Location: foodlist.php');
}
else{
	echo "失敗";
}

?>