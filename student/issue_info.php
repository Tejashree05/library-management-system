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
   
.img-circle
{
  margin-left: 10px;
}
    
	</style>
</head>

<body style="background-color: #b0c191; ">
  <!--------------------side navigation------------------------->
  <p style="font-size: 25px ;text-align: center"> <u>Note:</u>Students are requested to return the books on or before the last date, if faied then per day fine will be calculated as per the rules.</p>
	<div class="con">
	<h1 style="text-align: center">List of Books Issued</h1>
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
    </div>
    
</body>
</html>