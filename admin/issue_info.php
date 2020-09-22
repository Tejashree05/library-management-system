<?php
   include "connection.php";
   include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>ADD ISSUE-INFORMTION</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
		.contain
      {
         width: 350px;
         height: 500px;
         margin: 50px auto;
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
   body
      {
         background-color: #b2deb2;
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

   <div class="contain">
      <h2 style="color:black; font-family: lucida Console; text-align: center;">Add Book Issue Information</h2>
   	<form class="book" action="" method="post">
      <input type="text" name="roll" class="form-control" placeholder="Roll No" required=""><br>
      <input type="text" name="username" class="form-control" placeholder="Username" required=""><br>
      <input type="text" name="bid" class="form-control" placeholder="Book-ID" required=""><br>
      <input type="text" name="approve" class="form-control" placeholder="Approval Status" required=""><br>
      <input type="text" name="issue" class="form-control" placeholder="Issue-date(yyyy-mm-dd)" required=""><br>
      <input type="text" name="return" class="form-control" placeholder="Returne-date(yyyy-mm-dd)" required=""><br>
      <button class="btn btn-default" type="submit" name="submit">Click here</button>
      </form>
   </div>

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
         { mysqli_query($db,"INSERT INTO `issue_book` VALUES('', '$_POST[roll]','$_POST[username]', '$_POST[bid]', '$_POST[approve]', '$_POST[issue]', '$_POST[return]');");

           mysqli_query($db,"UPDATE `books` SET quantity=quantity-1 where bid='$_POST[bid]' ;");
           
       ?>
       <script type="text/javascript">
         alert("Issued and updated Successful");
       </script>
       <?php
       
    }
    else
    {
        ?>
       <script type="text/javascript">
         alert("The user has already taken a book, books cannot be issued unless the book is returned.");
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