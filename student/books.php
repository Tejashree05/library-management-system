<?php
   include "connection.php";
   include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
  <title>Books</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style type="text/css">
    .srch
    {
      padding-left: 600px;
    }
    .con1
    {
      height:100%;
      width: 900px;
      margin: 0px auto;
    }
    body
    {
      background-color: #b0c191;
    }


  </style>

</head>
<body>

  <!-----------------------------------search bar--------------------------------->
  <br><br><br>
  <div class="con1">
  <div class="srch">
    <form class="navbar-form" method="post" name="form1">
        <input class="form-control" type="text" name="search" placeholder="search" required="">
        <button style="background-color: lightblue" type="submit" name="submit" class="btn btn-default">
          <span class="glyphicon glyphicon-search"></span>
        </button>
    </form>
  </div>
  <h2>List of Books</h2>
  <?php

       if(isset($_POST['submit']))
       {
          $q=mysqli_query($db,"SELECT * from  books where name like '%$_POST[search]%' ");
          if(mysqli_num_rows($q)==0)
          {
            ?><br><br>
              <h2 style="color: black; padding-left: 100px">No matches found,try again later.</h2>
              <?php
          }
          else
          {
             echo "<table class='table table-bordered table-hover' >";
             echo"<tr style='background-color: lightblue;'>";
              //table header--------------------
             echo "<th>"; echo "ID";   echo "</th>";
             echo "<th>"; echo "Book name";   echo "</th>";
             echo "<th>"; echo "Authors name";   echo "</th>";
             echo "<th>"; echo "Edition";   echo "</th>";
             echo "<th>"; echo "Status";   echo "</th>";
             echo "<th>"; echo "Quantity";   echo "</th>";
             echo "<th>"; echo "Department";   echo "</th>";
             echo "</tr>"; 

             while($row=mysqli_fetch_assoc($q))
             {
             echo "<tr>";
             echo "<td style='background-color: bisque'>";  echo $row['bid'];  echo "</td>";
             echo "<td>";  echo $row['name'];  echo "</td>";
             echo "<td>";  echo $row['authors'];  echo "</td>";
             echo "<td>";  echo $row['edition'];  echo "</td>";
             echo "<td>";  echo $row['status'];  echo "</td>";
             echo "<td>";  echo $row['quantity'];  echo "</td>";
             echo "<td>";  echo $row['department'];  echo "</td>";

             echo "</tr>";
             }
             echo"<table>";
          }
       }
          /*no button is pressed*/
       else
       {
          $res=mysqli_query($db,"SELECT * FROM `books` ORDER BY `books`.`bid` ASC;");

       echo "<table class='table table-bordered table-hover' >";
       echo"<tr style='background-color: lightblue;'>";
       //table header--------------------
       echo "<th>"; echo "ID";   echo "</th>";
       echo "<th>"; echo "Book name";   echo "</th>";
       echo "<th>"; echo "Authors name";   echo "</th>";
       echo "<th>"; echo "Edition";   echo "</th>";
       echo "<th>"; echo "Status";   echo "</th>";
       echo "<th>"; echo "Quantity";   echo "</th>";
       echo "<th>"; echo "Department";   echo "</th>";
    echo "</tr>"; 

    while($row=mysqli_fetch_assoc($res))
    {
      echo "<tr>";
      echo "<td style='background-color: bisque'>";  echo $row['bid'];  echo "</td>";
      echo "<td>";  echo $row['name'];  echo "</td>";
      echo "<td>";  echo $row['authors'];  echo "</td>";
      echo "<td>";  echo $row['edition'];  echo "</td>";
      echo "<td>";  echo $row['status'];  echo "</td>";
      echo "<td>";  echo $row['quantity'];  echo "</td>";
      echo "<td>";  echo $row['department'];  echo "</td>";

      echo "</tr>";
    }
    echo"<table>";
       }
    ?>
    </div>
    </div>
</body>
</html>