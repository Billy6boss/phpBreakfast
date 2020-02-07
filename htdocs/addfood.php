<?php
  include("db.php"); //連接伺服器



$fname=$_POST['foodname']; //從網頁裡post到的帳號
$fp=$_POST['fp'];
$des=$_POST['des'];
$pic=$_POST['pic'];


$sql = "INSERT INTO `classtest`.`food` (`food_id`, `name`, `price`, `description`, `img`)
 VALUES (NULL, '".$fname."', '".$fp."', '".$des."', '".$pic.".jpg');";
echo $sql."<br>";
$result = mysqli_query($conn,$sql); //回傳true 跟flase

  if ($result) {

echo "已成功送出";
header('Location: foodlist.php');
}
else{
	echo "失敗";
}

?>



