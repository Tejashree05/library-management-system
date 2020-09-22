<?php
   include "connection.php";
   include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Info</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
		.srch
		{
			padding-left:550px;
		}
    body
    {
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
  .con2
  {
     width: 900px;
     margin: 0px auto;

  }
  body
  {
   
    background-color:  #b0c191;
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


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "#b0c191";
}
</script>

	<!-----------------------------------search bar--------------------------------->
<div class="con2">
	<div class="srch">
		<form class="navbar-form" method="post" name="form1">
				<input class="form-control" type="text" name="search" placeholder="username of student" required="">
				<button style="background-color: lightblue" type="submit" name="submit" class="btn btn-default">
					<span class="glyphicon glyphicon-search"></span>
				</button>
		</form>
	</div>
	<h2>List of Students</h2>
	<?php

       if(isset($_POST['submit']))
       {
          $q=mysqli_query($db,"SELECT first,last,username,roll,email,contact FROM `student` where username like '%$_POST[search]%' ");
          if(mysqli_num_rows($q)==0)
          {
              echo "No such user found!!!!!  Try again.";
          }
          else
          {
             echo "<table class='table table-bordered table-hover' >";
             echo"<tr style='background-color: lightblue;'>";
              //table header--------------------
             echo "<th>"; echo "First-name";   echo "</th>";
             echo "<th>"; echo "Last-name";   echo "</th>";
             echo "<th>"; echo "User-name";   echo "</th>";
             echo "<th>"; echo "roll";   echo "</th>";
             echo "<th>"; echo "email";   echo "</th>";
             echo "<th>"; echo "Contact-no";   echo "</th>";
             echo "</tr>"; 

             while($row=mysqli_fetch_assoc($q))
             {
    	       echo "<tr>";
    	       echo "<td>";  echo $row['first'];  echo "</td>";
    	       echo "<td>";  echo $row['last'];  echo "</td>";
    	       echo "<td>";  echo $row['username'];  echo "</td>";
    	       echo "<td>";  echo $row['roll'];  echo "</td>";
    	       echo "<td>";  echo $row['email'];  echo "</td>";
    	       echo "<td>";  echo $row['contact'];  echo "</td>";

    	       echo "</tr>";
             }
             echo"<table>";
          }
       }
          /*no button is pressed*/
       else
       {
          $res=mysqli_query($db,"SELECT first,last,username,roll,email,contact FROM `student`;");

       echo "<table class='table table-bordered table-hover' >";
       echo"<tr style='background-color: lightblue;'>";
       //table header--------------------
       echo "<th>"; echo "First-name";   echo "</th>";
       echo "<th>"; echo "Last-name";   echo "</th>";
       echo "<th>"; echo "User-name";   echo "</th>";
       echo "<th>"; echo "roll";   echo "</th>";
       echo "<th>"; echo "email";   echo "</th>";
       echo "<th>"; echo "Contact-no";   echo "</th>";
       echo "</tr>"; 

    while($row=mysqli_fetch_assoc($res))
    {
    	echo "<tr>";
    	
    	echo "<td>";  echo $row['first'];  echo "</td>";
    	echo "<td>";  echo $row['last'];  echo "</td>";
    	echo "<td>";  echo $row['username'];  echo "</td>";
    	echo "<td>";  echo $row['roll'];  echo "</td>";
    	echo "<td>";  echo $row['email'];  echo "</td>";
    	echo "<td>";  echo $row['contact'];  echo "</td>";

    	echo "</tr>";
    }
    echo"<table>";
       }
    ?>
    </div>
</body>
</html>