<?php
   include "connection.php";
   include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>student login</title>
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
		<div class="log_img">
			<br><br><br>
			<div class="box1">
				<br>
				<h1 style="color: black; text-align: center; font-size: 35px;font-family: lucida Console;">Library management system</h1>
				<h1 style="color: black; text-align: center; font-size: 25px;">User Registration Form</h1><br>
				<form name="login" action="" method="post">
					<div class="login">
					<input class="form-control" type="text" name="username" placeholder="username" required=""> <br>
					<input class="form-control" type="password" name="password" placeholder="password" required=""><br>
					<input class="btn btn-default" type="submit" name="submit" value="Login" style="color: black;width: 90px; height: 35px">
					</div>
				
				<p ><br>
					<br>
					<a href="update_password.php">Forgot password?</a><br>
					New to the website??<a href="registration.php">Sign Up</a>
				</p>
				</form>
			</div>
		</div>
	</section>

    <?php
    
     if(isset($_POST['submit']))
     {
     	$count=0;
     	$res=mysqli_query($db,"SELECT * FROM `student` WHERE username='$_POST[username]' && password='$_POST[password]';");

      $row=mysqli_fetch_assoc($res);

     	$count=mysqli_num_rows($res);
     	if($count==0)
     	{
     		?>
     		<script type="text/javascript">
     			alert("User name and password doesnot match.");
     		</script>
     		<?php
     	}
     	else
     	{
     		$_SESSION['login_user'] = $_POST['username'];
        $_SESSION['pic'] = $row['pic'];

     		?>
             <script type="text/javascript">
             	window.location="index.php"
             </script>
     		<?php
     	}
     }

    ?>

</body>
</html>