<?php
   include "connection.php";
   include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>student registration</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale-1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<style type="text/css">
  	section
  	{
  		margin-top: -20px;
  	}
  </style>
</head>
<body>
	<section>
		<div class="reg_img">
			<br>
			    <h1 style="color: bisque; text-align: center; font-size: 35px;font-family: lucida Console;">Library management system</h1><br>
				<h1 style="color: bisque; text-align: center; font-size: 25px;">Enter details to Sign Up</h1>
			<div class="box2">
				<br>
				<form name="registration" action="" method="post">
					<div class="login">
					<input class="form-control" type="text" name="first" placeholder="First Name" required=""><br>
					<input class="form-control" type="text" name="last" placeholder="Last Name" required=""><br>
					<input class="form-control" type="text" name="username" placeholder="username" required=""> <br>
					<input class="form-control" type="password" name="password" placeholder="password" required=""><br>
					<input class="form-control" type="roll" name="roll" placeholder="roll no" required=""><br>
					<input class="form-control" type="text" name="email" placeholder="E-Mail" required=""><br>
					<input class="form-control" type="text" name="contact" placeholder="Phone" required=""><br>
					<input class="btn btn-default" type="submit" name="submit" value="Sign Up" style="color: black;width: 90px; height: 35px">
					</div>
				</form>
			</div>
		</div>
	</section>

	<?php

	   if(isset($_POST['submit']))
	   {
	   	  $count=0;
	   	  $sql="SELECT username from student";
	   	  $res=mysqli_query($db,$sql);

	   	  while($row=mysqli_fetch_assoc($res))
	   	  {
	   	  	if($row['username']==$_POST['username'])
	   	  	{
	   	  		$count=$count+1;
	   	  	}
	   	  }
        if($count==0)
         { mysqli_query($db,"INSERT INTO `STUDENT` VALUES('$_POST[first]', '$_POST[last]', '$_POST[username]', '$_POST[password]', '$_POST[roll]', '$_POST[email]', '$_POST[contact]');");

       ?>
       <script type="text/javascript">
       	alert("Registration successful");
       </script>
    <?php

    }
    else
    {
        ?>
       <script type="text/javascript">
       	alert("User name already exist");
       </script>
    <?php

    }

	}

	?>

</body>
</html>