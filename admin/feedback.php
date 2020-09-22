<?php
   include "connection.php";
   include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Feedback</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale-1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <style type="text/css">
    	
    	.form-control
    	{
    		height: 70px;
    		width: 960px;
    	}
    	.scroll
    	{
    		width: 100%;
    		height:400px;
    		overflow: auto;
    	}
    	.box2
    	{
    		width: 1000px;
    		height:600px;
    	    margin: 0px auto;
            background-color: black; 
            color: white;
            opacity: .7;
    	}
        body
        { 

            /*background-image: url("image/bg.jfif");
            background-image: no-repeat;
            background-size: 100% 100%;*/
            background-color: #b2deb2;
        }
    </style>
</head>
<body>
     <div class="box2"><br><br>
     	<p style="font-size: 35px; text-align: center">Students feedbacks <br><br>
     	<!--<p style="font-size: 20px; text-align: center">Please do comment below for any queries or information.   <br><br>
     	<form style="" action="" method="post">
     		<input class="form-control" type="text" name="comment" placeholder="comment here"><br>
     		<input class="btn btn-default" type="submit" name="submit" value="comment" style="width: 200px; height:35px;">
     	</form>
     <br><br>-->

     <div class="scroll">
		
		<?php
			if(isset($_POST['submit']))
			{
				$sql="INSERT INTO `comments` VALUES('', '$_POST[comment]');";
				if(mysqli_query($db,$sql))
				{
					$q="SELECT * FROM `comments` ORDER BY `comments`.`id` DESC";
					$res=mysqli_query($db,$q);

				echo "<table class='table table-bordered'>";
					while ($row=mysqli_fetch_assoc($res)) 
					{

						echo "<tr>";
							echo "<td>"; echo $row['comment']; echo "</td>";
						echo "</tr>";
					}
				echo "</table>";
				}

			}

			else
			{
				$q="SELECT * FROM `comments` ORDER BY `comments`.`id` DESC"; 
					$res=mysqli_query($db,$q);

				echo "<table class='table table-bordered'>";
					while ($row=mysqli_fetch_assoc($res)) 
					{
						echo "<tr>";
							echo "<td>"; echo $row['comment']; echo "</td>";
						echo "</tr>";
					}
				echo "</table>";
			}
		?>
       </div>
     </div>
</body>
</html>