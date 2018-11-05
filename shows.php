<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>

  <link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <meta charset="utf-8">
    <meta name="Generator" content="Drupal 8 (https://www.drupal.org)">
    <meta name="MobileOptimized" content="width">
    <meta name="HandheldFriendly" content="true">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">

    <title>Shows Page</title>
</head>

<body style="background: #161616;">

<?php include("includes/nav.inc.php"); ?>

<?php
  // Create connection
  $conn = mysqli_connect("us-cdbr-iron-east-01.cleardb.net", "baac30b8c10ebe", "347a5eea", "heroku_3550e03eba1161b");
  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }
  ?>



<?php

            $sql = "SELECT `show_name`, `show_id`, `show_status`, `show_desc`,`show_url`,`show_insta`,`show_facebook`, `show_img` FROM `mpr_show` WHERE `show_status` = 'ACTIVE'";
            $result = mysqli_query($conn, $sql);
            ?>

<div class="row" style="padding-top: 25px;">

<?php
  foreach ($result as $row){
    ?>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
    <a href="shows.php?show_id=<?php echo $row['show_id']; ?>"> </a>
      <div class="card" style="padding-top: 35px; padding-bottom: 35px;">
          <img src="<?php echo $row['show_img']; ?>" class="card-img-top img-adjusted">
          <div class="card-body">
            <h2> <a href="shows.php?show_id=<?php echo $row['show_id']; ?>"><?php echo $row['show_name']; ?></a></h2>
            <p class="card-text collapse" id="viewdetails<?php echo $row['show_id']; ?>"><?php echo $row['show_desc']; ?></p>
            <p><a class="btn btn-warning " data-toggle="collapse" data-target="#viewdetails<?php echo $row['show_id']; ?>">Show Info</a> <a href="shows.php?show_id=<?php echo $row['show_id']; ?>" class="btn btn-warning">Archives</a> </p>
          </div>
      </div>
      </div>
    <?php
}
?>

</div>


  </body>





      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    </html>
