<?php
session_start();
include("db.php");
include("layout.php");
?>
<div>
  <ul class="nav navbar-nav">

    <li><a href="foodlist.php">Foodlist</a></li>
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
  <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
      <div class="panel panel-info">
        <div class="panel-heading">

          <h1>Add It!</h1>
        </div>
        <div class="panel-body">

          <form role="form" method="POST" action="addfood.php"> <!-- 跳至check.php-->
            <div class="form-group">
              <label for="foodname">Name:</label>
              <input type="text" class="form-control" id="foodname" name="foodname">
            </div>
            <div class="form-group">
              <label for="fp">Price:</label>
              <input type="number" class="form-control" id="fp" name="fp">
            </div>
            <div class="form-group">
              <label for="des">Description:</label>
              <input type="text" class="form-control" id="des" name="des">
            </div>
            <div class="form-group">
              <label for="sel1">選擇圖片代號:</label>
              <select class="form-control" id="pic" name="pic">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>吐司</option>
                <option>紅茶</option>
                <option>三明治</option>
                <option>漢堡</option>
                <option>米漢堡</option>
                <option>麥克雞塊</option>
                <option>飲料</option>
                <option>咖啡</option>
                <option>蘿蔔糕</option>
              </select>
            </div>
            <div class="form-group">
              <input type="submit" class="form-control" value="送出" >
            </div>
          </div>

        </div>
      </div>
      <div class="col-sm-4"></div>
    </div>
  </div>
</body>
</html>
