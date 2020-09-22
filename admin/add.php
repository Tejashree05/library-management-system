<?php
   include "connection.php";
   include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Books</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
		.srch
		{
			padding-left: 800px;
		}
    body {
      background-color: #b2deb2;
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
  }

.sidenav {
  height: 100%;
  margin-top: 50px;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #222;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.img-circle
{
  margin-left: 10px;
}

.book
{
  width: 400px;
  margin: 0px auto;
}

	</style>


</head>
<body>
  <!--------------------side navigation------------------------->
  <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div style="color:grey; margin-left: 55px; font-size:20px">
    <?php
    if(isset($_SESSION['login_user']))
    {
      echo "<img class='img-circle profile_img' height=130 width=130 src='image/lmsuser1.png'>";
      echo "</br>";
      echo "Welcome ".$_SESSION['login_user'];
      echo "</br></br>";
    }
    ?>
  </div>
  <a href="add.php">Add Books</a>
  <a href="issue_information.php">Issue Info</a>
  <a href="issue_info.php">Add Issue Info</a>
</div>

<div id="main">
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
  <div class="container">
    <h2 style="color:black; font-family: lucida Console; text-align: center;">Add Book</h2>
    <form class="book" action="" method="post">
      <input type="text" name="bid" class="form-control" placeholder="Book ID" required=""><br>
      <input type="text" name="name" class="form-control" placeholder="Book Name" required=""><br>
      <input type="text" name="authors" class="form-control" placeholder="Authors" required=""><br>
      <input type="text" name="edition" class="form-control" placeholder="Book Edition" required=""><br>
      <input type="text" name="status" class="form-control" placeholder="Status" required=""><br>
      <input type="text" name="quantity" class="form-control" placeholder="Quantity" required=""><br>
      <input type="text" name="department" class="form-control" placeholder="Departmant" required=""><br>
      <button class="btn btn-default" type="submit" name="submit">Click here</button>
    </form>
  </div>
  <?php
     if(isset($_POST['submit']))
     {
        if(isset($_SESSION['login_user']))
        {
          mysqli_query($db,"INSERT INTO books VALUES('$_POST[bid]','$_POST[name]','$_POST[authors]','$_POST[edition]','$_POST[status]','$_POST[quantity]','$_POST[department]' );");
          ?>
          <script type="text/javascript">
            alert("Successfully added the new book.");
          </script>

          <?php
        }
        else
        {
          ?>
          <script type="text/javascript">
            alert("Login to add a new book.");
          </script>
          <?php
        }
     }
  ?>
</div>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "#b2deb2";
}
</script>

</body>
</html>