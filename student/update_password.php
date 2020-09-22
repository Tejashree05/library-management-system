<?php
    include "connection.php";
    include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Update Password</title>

	<style type="text/css">
		body
		{
			
			height:650px;
			background-image: url("image/lms7.jpg");
			background-repeat: no-repeat;
		}
		.wrapper
		{
			width:400px;
			height: 400px;
			background-color:#e8ad76;
			margin: 150px auto;
			opacity: .7;
		}
		.form-control
		{
			width: 350px;
		}
	</style>
</head>
<body>
	<div class="wrapper">
	<div><br>
        <h1 style="color: black; text-align: center; font-size: 35px;font-family: lucida Console;">Change Password</h1>
    </div>
    <div style="padding-left:25px">
    <form action="" method="post">
    	<input class="form-control" type="text" name="username" placeholder="Username" required=""><br>
    	<input class="form-control" type="text" name="email" placeholder="E-mail" required=""><br>
    	<input class="form-control" type="text" name="password" placeholder="New Password" required=""><br>
    	<button class="btn btn-default" type="submit" name="submit">Save</button>
    </form>
    </div>
    </div>
    <?php
       if(isset($_POST['submit']))
       {
       	if(mysqli_query($db,"UPDATE student SET password='$_POST[password]' WHERE username='$_POST[username]' AND email='$_POST[email]' ;"))
       	{
       		?>
       		<script type="text/javascript">
       			alert("The password updated successfully.");
       		</script>

       		<?php
       	}
       }
    ?>
</body>
</html>