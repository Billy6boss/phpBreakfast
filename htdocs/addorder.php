<?php
 session_start();
 include("db.php");
$id=$_SESSION['user_id'];
$nub = $_POST['number'];
$amo = $_POST['amount'];


$sql="INSERT INTO `order` (`id`, `food_id`, `amount`) VALUES ('".$id."', '".$nub."', '".$amo."');                                                                                                                                                                                                                                                                                                                                                                                                          ";
      
$result = mysqli_query($conn, $sql);
if ($result) {

echo "已成功送出";
header('Location: order.php');
}
else{
	echo "失敗";
}

?>