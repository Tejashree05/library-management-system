<?php
   include "connection.php";
   include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>ISSUE INFORMATION</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
    .srch
    {
      padding-left: 800px;
    }
		.con
		{
			width:700px;
			margin: 0px auto;
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
    
	</style>
</head>

<body style="background-color: #b2deb2 ">
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
	<div class="con">
		<h3 style="font-size:40px; text-align: center">Book Issue Information</h3>
    
    <form class="navbar-form" method="post" name="form1" style="padding-left: 350px">
        <input class="form-control" type="text" name="roll" placeholder="Enter Roll No" required="">
        <input class="form-control" type="text" name="bid" placeholder="Enter bid" required="">
        <button style="background-color: lightblue" type="submit" name="submit2" class="btn btn-default">Delete</button>
     </form>
	
	<h2>List of Books Issued</h2>
	<?php

          $res=mysqli_query($db,"SELECT * FROM `issue_book`ORDER BY `issue_book`.`id` ASC;");

       echo "<table class='table table-bordered table-hover' >";
       echo"<tr style='background-color: lightblue;'>";
       //table header--------------------
       echo "<th>"; echo "id";   echo "</th>";
       echo "<th>"; echo "roll";   echo "</th>";
       echo "<th>"; echo "Username";   echo "</th>";
       echo "<th>"; echo "Book-ID";   echo "</th>";
       echo "<th>"; echo "Approval-status";   echo "</th>";
       echo "<th>"; echo "Issue-date";   echo "</th>";
       echo "<th>"; echo "Return-date";   echo "</th>";

       echo "</tr>"; 

       while($row=mysqli_fetch_assoc($res))
       {
    	echo "<tr>";
    	
      echo "<td>";  echo $row['id'];  echo "</td>";
      echo "<td>";  echo $row['roll'];  echo "</td>";
    	echo "<td>";  echo $row['username'];  echo "</td>";
    	echo "<td>";  echo $row['bid'];  echo "</td>";
    	echo "<td>";  echo $row['approve'];  echo "</td>";
    	echo "<td>";  echo $row['issue'];  echo "</td>";
    	echo "<td>";  echo $row['return'];  echo "</td>";

    	echo "</tr>";
    }
    echo"<table>";
    
    ?>
    
    <?php

      if(isset($_POST['submit']))
      {
           $count=0;
           $sql="SELECT username from issue_book";
           $res=mysqli_query($db,$sql);

           while($row=mysqli_fetch_assoc($res))
           {
            if($row['username']==$_POST['username'])
            {
               $count=$count+1;
            }
           }
        if($count==0)
         { 
          ?>
            <script type="text/javascript">
              alert("The user has already taken a book, books cannot be issued unless the book is returned.");
            </script>
            <?php
          }
          else
          {
             ?>
             

         ?>
       <script type="text/javascript">
         alert("issue Successful");
       </script>
    <?php
  }
    }
   ?>
   <?php
   if(isset($_POST['submit2']))
    {
      mysqli_query($db,"DELETE from issue_book where roll = '$_POST[roll]'; ");

       mysqli_query($db,"UPDATE `books` SET quantity=quantity+1 where bid='$_POST[bid]' ;");
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