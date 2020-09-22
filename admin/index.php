<?php
   session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		ONLINE LIBRARY MANAGEMENT SYSTEM
	</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale-1">

	<style type="text/css">
	nav
    {
    float: right;
    word-spacing: 20px;
    padding: 20px;
    }
    nav li
    {
    display: inline-block;
    line-height: 65px;
    }
	</style>
</head>

<body>
	<div class="wrapper">
	     <header>
	     	<div class="logo">
	     	<img src="image/logo.jpg" height=60px>
	     	<h1 style="color: black; font-size: 20px">OPEN BOOK LIBRARY</h1>
	     	</div>
            
            <?php
		if(isset($_SESSION['login_user']))
		{
			?>
				<nav>
					<ul>
						<li><a href="index.php">HOME</a></li>
						<li><a href="books.php">BOOKS</a></li>
						<li><a href="contact.php">CONTACT</a></li>
						<li><a href="logout.php">LOGOUT</a></li>
						<li><a href="feedback.php">FEEDBACK</a></li>
						<li><a href="registration.php">SIGN_UP</a></li>
					</ul>
				</nav>
			<?php
		}
		else
		{
			?>
				<nav>
					<ul>
						<li><a href="index.php">HOME</a></li>
						<li><a href="admin_login.php">LOGIN</a></li>
						<li><a href="contact.php">CONTACT</a></li>
						
					</ul>
				</nav>
	    	<?php
		}
			
		?>
	     </header>
	     <section>
	     	<div class="sec_img">
	     	<br><br><br><br><br>
		    <div class="box">
		    	<br><br><br>
		    	<h1 style="text-align: center; font-size: 30px">WELCOME TO THE LIBRARY</h1><br><br>
		    	<h1 style="text-align: center; font-size: 20px">OPENS AT: 9:00 a.m</h1><br><br>
		    	<h1 style="text-align: center; font-size: 20px">CLOSES AT: 5:00 p.m</h1><br>
		    </div>
		</div>
	     </section>
	     <footer>
	     	<br>
	     	<p style="color: black;text-align: center ;font-size: 30px">
	     		<b> He is wise who knows the sources of knowledge, where it is written and where it is to be found.</b>
	     	</p>
		
	     </footer>
	</div>

</body>
</html>