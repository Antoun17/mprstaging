<!DOCTYPE html>
<html lang="en" dir="ltr">

  <title>Archive (Under Construction)</title>
  <head>


    <meta charset="utf-8">
    <meta name="Generator" content="Drupal 8 (https://www.drupal.org)">
    <meta name="MobileOptimized" content="width">
    <meta name="HandheldFriendly" content="true">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">

    <link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.min.css">


  </head>
  <body>


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

            $sql = "SELECT `show_name`, `show_id`, `show_status`, `show_desc`,`show_url`,`show_insta`,`show_facebook`, `show_img` FROM `mpr_show` WHERE `show_status` = 'ACTIVE' ORDER BY `show_name` ASC";
            $result = mysqli_query($conn, $sql); ?>

            <?php foreach ($result as $row): ?>

              <div class="row">
              <div class="col-4">
                <div class="list-group" id="myList" role="tablist">
              <ul>
                  <li><a class="list-group-item list-group-item-action"  href="#<?php echo $row['show_id']; ?>" role="tab"> <?php echo $row['show_name']; ?></a></li>
              </ul>
              </div>
            </div>



                    <?php

              $sql = "SELECT `show_name`, `show_id`, `show_status`, `show_desc`,`show_url`,`show_insta`,`show_facebook`, `show_img` FROM `mpr_show` WHERE `show_status` = 'ACTIVE'";
              $result = mysqli_query($conn, $sql);
              ?>



               <?php foreach ($result as $row):?>


                     <div class="tab-content">
                       <div class="tab-pane fade" id="<?php echo $row['show_id']; ?>">

                         <div class="col-md-3" style="height: 200px; width: 200px;">
                           <div class="card card-inverse card-success text-center">
                             <img class="card-img-top" src="<?php echo $row['show_img']; ?>" alt="Card image cap">
                             <div class="card-block">
                               <h4 class="card-title"><?php echo $row['episode_title'];?></h4>
                               <p class="card-text"><?php echo $row['episode_description']; ?></p>
                               <a href="archive.php?episode_id=<?php echo $row['episode_id']; ?>&show_id=<?php echo $row['show_id']; ?>" class="btn btn-primary">Learn More</a>
                             </div>
                           </div>
                         </div>

                        </div>
                     </div>
               </div>



               <!-- .card -->
             <?php endforeach;?>

          <?php endforeach;

mysqli_close($conn);

          ?>


          <script>
          $('#myList a').on('click', function (e) {
            e.preventDefault()
            $(this).tab('show')

            $('#myList a[href="#<?php echo $row['show_id']; ?>"]').tab('show') // Select tab by name


          })
          </script>

    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
