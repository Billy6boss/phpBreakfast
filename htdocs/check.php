 <?php
	session_start();//啟用session
	include("db.php"); //連接伺服器

	$_SESSION['loginFlog'] = false;
	$_SESSION['succe'] = false;

	$usr=$_POST['usr']; //從網頁裡post到的帳號
	$pws=$_POST['pwd'];


	$query = "SELECT * FROM user WHERE account='".$usr."' and password ='".$pws."'";
	 //or die("Error in the consult.." . mysqli_error($link));

	 echo $query."<br>";

	$result = mysqli_query($conn, $query); //回傳true 跟flase

	if ($result) {

		if (mysqli_num_rows($result)>0) { //有找到1比一以上資料
			echo "登入成功!!";

			$row = mysqli_fetch_array($result);//抓出來
			$_SESSION['succe'] = false;
			$_SESSION['loginFlog'] = true; //foodlist.php
			$_SESSION['name'] = $row["name"];
			$_SESSION['user_id'] = $row["id"];

			header('Location: foodlist.php'); //轉跳

		}else{
			echo "登入失敗!!";
			$_SESSION['succe'] = true;
			header('Location: login.php');
		}
	}else{
		echo "語法錯誤!!";
		header('Location: login.php');
	}



?>