<?php
	
	 $dbServer ="127.0.0.1";
	 $dbUser = "root";
	 $dbPassword = "123456";

	 $conn = mysqli_connect($dbServer,$dbUser,$dbPassword,"phptest") or die("Error " . mysqli_error($link)); 
	 mysqli_set_charset($conn,"utf8"); //---編碼問題----   重要!

	//consultation: 

	$query = "SELECT * FROM user" or die("Error in the consult.." . mysqli_error($link)); 

	//execute the query. 

	$result = mysqli_query($conn, $query); 

	//display information: 

	while($row = mysqli_fetch_array($result)) { 
	  echo $row["name"] ."  ". $row["account"]."  ". $row["password"]."  ". "<br>"; 
	}
?>