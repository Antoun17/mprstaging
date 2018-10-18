<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>

  <link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.min.css">


    <meta charset="utf-8">
    <meta name="Generator" content="Drupal 8 (https://www.drupal.org)">
    <meta name="MobileOptimized" content="width">
    <meta name="HandheldFriendly" content="true">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">

    <title>Shows Page</title>
</head>

<body>

<?php include("includes/nav.inc.php"); ?>

<main class="main-area">

  <div class="card-deck">
    <div class="card bg-primary">
      <div class="card-body text-center">
        <p class="card-text">Some text inside the first card</p>
        <p class="card-text">Some more text to increase the height</p>
        <p class="card-text">Some more text to increase the height</p>
        <p class="card-text">Some more text to increase the height</p>
      </div>
    </div>
  </div>


<?php
  // Create connection
  $conn = mysqli_connect("us-cdbr-iron-east-01.cleardb.net", "baac30b8c10ebe", "347a5eea", "heroku_3550e03eba1161b");
  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }
  ?>

        <div class="container">
              <div class="row equal">



<?php

            $sql = "SELECT `show_name`, `show_id`, `show_status`, `show_desc`,`show_url`,`show_insta`,`show_facebook`, `show_img` FROM `mpr_show` WHERE `show_status` = 'ACTIVE'";
            $result = mysqli_query($conn, $sql);
            ?>



             <?php foreach ($result as $row):?>
             <div class="card col-xs-12 col-sm-3">
               <a href="shows.php?show_id=<?php echo $row['show_id']; ?>">
                 <figure class="card-img-top img-fluid">
                 <img src="<?php echo $row['show_img']; ?>" alt="meow">
                 </figure>
                 <div class="card-block">
                   <h2> <a href="shows.php?show_id=<?php echo $row['show_id']; ?>"><?php echo $row['show_name']; ?></a></h2>
                   <p class="card-text collapse" id="viewdetails<?php echo $row['show_id']; ?>"><?php echo $row['show_desc']; ?></p>
                   <p><a class="btn btn-warning " data-toggle="collapse" data-target="#viewdetails<?php echo $row['show_id']; ?>">Show Info</a> <a href="shows.php?show_id=<?php echo $row['show_id']; ?>" class="btn btn-warning">Archives</a> </p>
                 <!-- .card-content -->
               </a>
             </div>
             </div>
         </div>
             <!-- .card -->
           <?php endforeach;

                         mysqli_close($conn);
           ?>


              <!-- .card -->

            </div>
            <!-- .cards -->

            <style>

            @media (min-width: 768px) {
              .row.equal {
                display: flex;
                flex-wrap: wrap;
              }
            }
            </style>

  </main>
  </body>





      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    </html>
