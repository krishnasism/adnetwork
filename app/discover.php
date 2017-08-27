<?php
    session_start();
    if(!isset($_SESSION['username']))
    {
        header("location:login.php");
    }
    require($_SERVER['DOCUMENT_ROOT'].'/adnetwork/classes/db.php');

 ?>
<!DOCTYPE html>

<html lang="en">

    <head>
        <meta charset="utf-8"/>
        <meta content="initial-scale=1, width=device-width" name="viewport"/>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>


        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <link href="css/styles.css" rel="stylesheet"/>


        <title>AdNet:Login</title>

    </head>

    <body>
   <?php include $_SERVER['DOCUMENT_ROOT'].'/adnetwork/navbar/loggedinnav.php'; ?>
   <h1 align="center">Discover</h1>
   <hr>

   <div class="row">
  <div class="col-sm-8" style="margin-left: 10px">
    <?php
       $db_operation = new Database_Operations();
       $conn = $db_operation->connect();

      $query = mysqli_query($conn,"SELECT * FROM adverts") or die(mysqli_error($conn));
      $exists = mysqli_num_rows($query);
      $i = 0;
      if($exists>0)
        {
            while($row = mysqli_fetch_assoc($query))
            {
              print("<i><h2>  <a href=\"app.php?".$row['name']."\">".$row['name']."</a></h2></i>");
              print("<h4>".$row['owner']."</h4>");
              print("<p>".$row['description']."</p>");
              print("<hr>");
            }
        }

    ?>
  </div>
  <div class="col-sm-4" style="margin-left: 10px">
  </div>


</div>

    </body>
   </html>
