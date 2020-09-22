<?php
    include "connection.php";
    include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<style type="text/css">
		.wrapper
		{
			width:350px;
			height: 500px;
			margin: 55px auto;
			background-color: bisque;

		}
	</style>
</head>
<body style="background-color: #b0c191; ">
	<div class="container">
		<!--<form action="" method="post">
			<button class="btn btn-default" style="float: right;" name="submit1">
				Edit
			</button>
		</form>-->
        <div class="wrapper">
		 <?php

		   $q=mysqli_query($db,"SELECT *FROM student where username='$_SESSION[login_user]' ;");

		 ?>	<br><br>
		 <?php
		    $row=mysqli_fetch_assoc($q);
		    echo "<div style='text-align:center'>
		          <img class='img-circle profile-img' height=160 width=160 src='image/lmsuser1.png'></div>";
		 ?>
		  <div style="text-align:center ;font-size: 18px"><b>Welcome <?php echo $_SESSION['login_user']; ?></b></div>
		  <?php
		      echo "<table class='table table-bordered'>";
		      echo "<tr>";
		        echo "<td>";
		           echo "<b> First Name: </b>";
		        echo "</td>";

		        echo "<td>";
		           echo $row['first'];
		        echo "</td>";
		      echo "</tr>";

		      echo "<tr>";
		        echo "<td>";
		           echo "<b> Last Name: </b>";
		        echo "</td>";

		        echo "<td>";
		           echo $row['last'];
		        echo "</td>";
		      echo "</tr>";

		      echo "<tr>";
		        echo "<td>";
		           echo "<b> User Name: </b>";
		        echo "</td>";

		        echo "<td>";
		           echo $row['username'];
		        echo "</td>";
		      echo "</tr>";

		      echo "<tr>";
		        echo "<td>";
		           echo "<b> Password: </b>";
		        echo "</td>";

		        echo "<td>";
		           echo $row['password'];
		        echo "</td>";
		      echo "</tr>";

		      echo "<tr>";
		        echo "<td>";
		            echo "<b> Roll-No: </b>";
		        echo "</td>";

		        echo "<td>";
		           echo $row['roll'];
		        echo "</td>";
		      echo "</tr>";

		      echo "<tr>";
		        echo "<td>";
		           echo "<b> E-mail: </b>";
		        echo "</td>";

		        echo "<td>";
		           echo $row['email'];
		        echo "</td>";
		      echo "</tr>";

		      echo "<tr>";
		        echo "<td>";
		           echo "<b> Contact: </b>";
		        echo "</td>";

		        echo "<td>";
		           echo $row['contact'];
		        echo "</td>";
		      echo "</tr>";

		      
		      echo "</table>";
		  ?>
		</div>
	</div>

</body>
</html>