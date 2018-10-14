<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>

  <link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.min.css">

    <meta charset="utf-8">
    <meta name="Generator" content="Drupal 8 (https://www.drupal.org)">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <meta name="MobileOptimized" content="width">
    <meta name="HandheldFriendly" content="true">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">

    <title>Shows Page</title>
</head>

<body>


  <?php include("includes/nav.inc.php"); ?>



<main class="main-area">
<?php
  // Create connection
  $conn = mysqli_connect("us-cdbr-iron-east-01.cleardb.net", "baac30b8c10ebe", "347a5eea", "heroku_3550e03eba1161b");
  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }
  ?>



          <div class="centered">


            <?php

            if(isset($_GET["episode_id"])) {

              $episode_id_var = ($_GET["episode_id"]);

              $sql = "SELECT * FROM `mpr_episode` episodetbl WHERE episodetbl.`episode_id`=$episode_id_var LIMIT 1;";
              $result = mysqli_query($conn, $sql);


              foreach ($result as $row): ?>
              <h2>
              <?php echo $row['episode_title']; ?>
               -
               <?php echo $row['episode_date']; ?>
              </h2>
                <div class="container-fluid livestream" style="width: 100%; height: 100%;">
                <div class="container-fluid embed-responsive embed-responsive-16by9">
                <iframe allowfullscreen="true" class="embed-responsive-item" src="https://livestream.com/accounts/25937168/events/7713617/videos/<?php echo $row['episode_url']; ?>/player?enableInfoAndActivity=true&defaultDrawer=&autoPlay=true&mute=false"></iframe></div></div>
<?php
                 $show_id = $row['show_id'];
              endforeach;

                }

?>


<?php
            if (isset($_GET["show_id"])) {

            $show_id_var = ($_GET["show_id"]);

                $sql = "SELECT * FROM `mpr_show` showtbl, `mpr_episode` episodetbl WHERE showtbl.`show_status` = 'ACTIVE' and showtbl.`show_id`=episodetbl.`show_id` and showtbl.`show_id`=$show_id_var;";
                $result2 = mysqli_query($conn, $sql);
                $isfirst = 1;
                ?>



                 <?php foreach ($result2 as $row):
                   if($isfirst==1) {
                     echo "<center>";
                     echo "<P><h2>";
                     echo $row['show_name'];
                     echo "</h2><br>";
                     echo "<P>";
                     echo "</center>";
                    $isfirst = 0;?>
                    <h2>Episodes</h2>
                                <section class="cards">
                    <?php
                   }
?>
                 <div class="card">
                     <div class="card-content">
                       <h2> <a href="shows.php?episode_id=<?php echo $row['episode_id']; ?>&show_id=<?php echo $row['show_id']; ?>"><?php echo $row['episode_title']; ?></a> - <?php echo $row['episode_date']; ?>
                       <p class="card-text collapse" id="viewdetails<?php echo $row['episode_id']; ?>&show_id=<?php echo $row['show_id']; ?>"><?php echo $row['episode_description']; ?></p>
                       <p><a class="btn btn-warning " data-toggle="collapse" data-target="#viewdetails<?php echo $row['episode_id']; ?>">Show Info</a> </p>
                     <!-- .card-content -->
                 </div>
                    </div>

                 <!-- .card -->
               <?php endforeach;



            }
              ?>
               <center> <h2>Shows</h2> </center>

              </section>
		            <section class="cards">

<?php

            $sql = "SELECT `show_name`, `show_id`, `show_status`, `show_desc`,`show_url`,`show_insta`,`show_facebook`, `show_img` FROM `mpr_show` WHERE `show_status` = 'ACTIVE'";
            $result = mysqli_query($conn, $sql);
            ?>



             <?php foreach ($result as $row):?>

             <div class="card">
               <a href="shows.php?show_id=<?php echo $row['show_id']; ?>">
                <div class="card-content">
                   <h2> <a href="shows.php?show_id=<?php echo $row['show_id']; ?>"><?php echo $row['show_name']; ?></a></h2>
                   <p class="card-text collapse" id="viewdetails<?php echo $row['show_id']; ?>"><?php echo $row['show_desc']; ?></p>
                   <p><a class="btn btn-warning " data-toggle="collapse" data-target="#viewdetails<?php echo $row['show_id']; ?>">Show Info</a> <a href="shows.php?show_id=<?php echo $row['show_id']; ?>" class="btn btn-warning">Archives</a> </p>
                 <!-- .card-content -->
               </a>
             </div>
             </div>
             <!-- .card -->
           <?php endforeach;

                         mysqli_close($conn);
           ?>


              <!-- .card -->

            </section>
            <!-- .cards -->

          </div>
    <!-- .centered -->
  </main>
  </body>
    </html>


    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
