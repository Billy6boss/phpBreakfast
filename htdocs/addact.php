<?php
session_start();
include("db.php"); //連接伺服器


$_SESSION['addsucce'] = false;
$_SESSION['noword']=true;


 //從網頁裡post到的帳號
	$usr=$_POST['usr'];
	$pws=$_POST['pwd'];

	$sql = "INSERT INTO `classtest`.`user` (`id`, `account`, `password`, `name`) VALUES (NULL, '".$usr."', '".$pws."', '".$usr."')";


if ($usr=="" || $pws =="") {
	$_SESSION['noword']=false;
	header('Location: login.php');
}
else{
	$_SESSION['noword']=true;


	echo $sql."<br>";
$result = mysqli_query($conn,$sql); //回傳true 跟flase

if ($result) {

	echo "已成功新增帳號";
	$_SESSION['addsucce'] = true;

	header('Location: login.php');

}
else{
	$_SESSION['addsucce'] = false;

	echo "失敗";
}
}

?>