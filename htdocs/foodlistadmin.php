<?php
session_start();
include("db.php");
include("layout.php");
@$flog=$_SESSION['loginFlog'];
@$name=$_SESSION['name'];

?>
			<div>
				<ul class="nav navbar-nav">

					<li class="active"><a href="foodlist.php">Foodlist</a></li>

					<?php
					$temp = '"請先登入在使用此功能"';
					$temp2 = '"你已經登入了喔 >.0 "';
					if ($flog) {
						echo "<li><a onClick='alert(".$temp2.")'>Login</a></li>";
						echo "<li><a href='addfoodlist.php'>Addfoodlist</a></li>";
						echo "<li><a href='order.php'>Order</a></li>";
					}else{
						echo "<li><a href='login.php'>Login</a></li>";
						echo "<li><a onClick='alert(".$temp.")'>Addfoodlist</a></li>";
						echo "<li><a onClick='alert(".$temp.")'>Order</a></li>";
					}
					?>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container">
		<ul class="top">
			<li class="menu">
				<div id="myCarousel" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
					<ol class="carousel-indicators">
						<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						<li data-target="#myCarousel" data-slide-to="1"></li>
						<li data-target="#myCarousel" data-slide-to="2"></li>
						<li data-target="#myCarousel" data-slide-to="3"></li>
						<li data-target="#myCarousel" data-slide-to="4"></li>
						<li data-target="#myCarousel" data-slide-to="5"></li>
						<li data-target="#myCarousel" data-slide-to="6"></li>
					</ol>

					<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox">
						<div class="item active">
							<img src="image/msl1.jpg" alt="Chania" width="750" height="240">
						</div>

						<div class="item">
							<img src="image/msl2.jpg" alt="Chania" width="750" height="240">
						</div>

						<div class="item">
							<img src="image/msl3.jpg" alt="Flower" width="750" height="240">
						</div>

						<div class="item">
							<img src="image/msl4.jpg" alt="Flower" width="750" height="240">
						</div>
						<div class="item">
							<img src="image/msl5.jpg" alt="Flower" width="750" height="240">
						</div>
						<div class="item">
							<img src="image/msl6.jpg" alt="Flower" width="750" height="240">
						</div>
						<div class="item">
							<img src="image/msl7.jpg" alt="Flower" width="750" height="240">
						</div>
					</div>

					<!-- Left and right controls -->
					<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</li>
			<li class="login">
				<?php

				if ($flog) {
					echo "<div class='fontset'>";
					echo "<h1>".$name." <br>歡迎回來!!</h1>";
					echo "<a href='logout.php'><button type='button' class='btn btn-info btn-md'>點我登出</button></a>";
					echo "</div>";
				}else{
					echo "<h1>你還沒登入呢!</h1>";
					echo "<a href='login.php'><button type='button' class='btn btn-info btn-md'>點我登入</button></a>";
					header('Location: foodlist.php');
				}

				?>
			</li>
		</ul>

		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10 ">
					<div class="flbg"><!-- <div class="col-md-4">
							<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
						</div> -->
						<?php

						$query = "SELECT * FROM food" or die("Error in the consult.." . mysqli_error($link));

						$result = mysqli_query($conn, $query);

						while($row = mysqli_fetch_array($result)) {
							echo "<div class='col-md-4'>
							 <div class='panel-group'>
							 <div class='panel panel-default'>
							 <div class='panel-heading'>
							 <form role='form' method='POST' action='delfood.php'>
							 <input type='hidden' name='fid' value='".$row["food_id"]."'>
							 <input type='submit' class='btn btn-primary btn-xs' value='X' >
							 </form>
							 <h4>代號:".$row["food_id"]."</h4>
							 <img src='../image/".$row["img"]."'  class='img-thumbnail'>
							 </div>
							 <form role='form' method='POST' action='updatefood.php'>
							 <label for='sel1'>選擇圖片代號:</label>
							 <select class='form-control' id='pic' name='pic'>";
							 $query2 = "SELECT name FROM food" or die("Error in the consult.." . mysqli_error($link));
							 $result2 = mysqli_query($conn, $query);
							 while($row2 = mysqli_fetch_array($result2)) {
							 	echo"<option>".$row2["name"]."</option>";
						}

							echo"
							</select>
							<input type='hidden' name='fid' value='".$row["food_id"]."'>
							 <div class='panel-body'>
							 Name:<input type='text' name='name' value='".$row["name"]."'>
							 <br>
							 Price:<input type='number' name='price' value='".$row["price"]."'>
							 <br>
							 Description:<input type='text' name='description' value='".$row["description"]."'>
							 <input type='submit' class='btn btn-default btn-block' value='儲存更改' >
							 </form>
							 </div>
							 </div>
							 </div>
							 </div>";
						}
						?>
						<!-- <div class='col-md-4'>
						<img src="image/1.jpg"  class="img-thumbnail">
						<h1>菜名龍蝦</h1>
						<h2>price:60</h2>
						<h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id porro deleniti dolore culpa, architecto corporis incidunt ea aliquam quidem est. Aspernatur temporibus dolores, nemo deserunt aliquam totam sunt aperiam optio.</h4>
					</div> -->
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>
	</div>
</body>
</html>