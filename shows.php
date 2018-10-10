<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>


    <meta charset="utf-8">
    <meta name="Generator" content="Drupal 8 (https://www.drupal.org)">
    <meta name="MobileOptimized" content="width">
    <meta name="HandheldFriendly" content="true">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">

    <title>Shows Page</title>
</head>

<body>


  <nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-fixed-top">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="navbarNavDropdown" class="navbar-collapse collapse">
          <a class="navbar-brand" href="/">
            <img class=" navbar-header mr-auto"src="/sites/default/files/Navbarlogo.png" width="85px" height="80px">
          </a>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link text-white btn-lg btn-warning"style="padding-top: 15px; padding-bottom: 15px; padding-right:10px; padding-left:10px; margin: 10px; border-color:#FAAF42;" href="/about">About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white btn-lg btn-warning " style="padding-top: 15px; padding-bottom: 15px; padding-right:10px; padding-left:10px; margin: 10px; border-color:#FAAF42;"href="/schedule">Schedule</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white btn-lg btn-warning " style="padding-top: 15px; padding-bottom: 15px; padding-right:10px; padding-left:10px; margin: 10px; border-color:#FAAF42;"href="/shows.php">Shows</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white btn-lg btn-warning" style="padding-top: 15px; padding-bottom: 15px; padding-right:10px; padding-left:10px; margin: 10px; border-color:#FAAF42;" href="/supportmpr">Donate/Sponsor</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white btn-lg btn-warning" style="padding-top: 15px; padding-bottom: 15px; padding-right:10px; padding-left:10px; margin: 10px; border-color:#FAAF42;" href="/shop">Shop</a>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
          <li style="padding-right: 10px;"><a href="/user/login">Login</a></li>

          <li><a href="/user/logout">Logout</a></li>
            </ul>

            <style>
            .navbar-header {
              width: 60%;
              height: auto;
            }
            img {
              width: 100%;
              height: auto;
            }
            </style>
        </div>
    </nav>

<main class="main-area">
<?php
$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$server = $url["us-cdbr-iron-east-01.cleardb.net"];
$username = $url["baac30b8c10ebe"];
$password = $url["347a5eea"];
$db = substr($url["heroku_3550e03eba1161b"], 1);

$conn = new mysqli($server, $username, $password, $db);
  ?>



          <div class="centered">


            <?php

            if(isset($_GET["episode_id"])) {

              $episode_id_var = ($_GET["episode_id"]);

              $sql = "SELECT * FROM `mpr_episode` episodetbl WHERE episodetbl.`episode_id`=$episode_id_var LIMIT 1;";
              $result = $conn->query($sql);


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
                $result2 = $conn->query($sql);
                $isfirst = 1;
                ?>



                 <?php foreach ($result2 as $row):
                   if($isfirst==1) {
                     echo "<P><h2>";
                     echo $row['show_name'];
                     echo "</h2><br>";
                     echo "<P>";
                    $isfirst = 0;?>
                    <center> <img src="<?php echo $row['show_img']; ?>" alt="meow" style="width: 45%;"></center><P><h2>Episodes</h2><P>
                                <section class="cards">
                    <?php
                   }
?>
                 <div class="card">
                 <figure class="thumbnail">
                 <img src="<?php echo $row['show_img']; ?>" alt="meow">
                 </figure>
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
              </section>
		            <section class="cards">

<?php

            $sql = "SELECT `show_name`, `show_id`, `show_status`, `show_desc`,`show_url`,`show_insta`,`show_facebook`, `show_img` FROM `mpr_show` WHERE `show_status` = 'ACTIVE'";
            $result = $conn->query($sql);
            ?>



             <?php foreach ($result as $row):?>

             <div class="card">
               <a href="shows.php?show_id=<?php echo $row['show_id']; ?>">
                 <figure class="thumbnail">
                 <img src="<?php echo $row['show_img']; ?>" alt="meow">
                 </figure>
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


      <style>


        body {font-family: sans-serif;}
        p {color: white;}

        h2 {
          font-size: 2em;
          color: #e74c3c;
        }
        .centered {
            margin: 0 auto;
            padding: 0 1em;

        }

        @media screen and (min-width: 52em) {
            .centered {
                padding-top: 35px;
                max-width: 82em;
            }
        }

        /*--------------------------------------------------------------
        Header styles minus menu
        --------------------------------------------------------------*/

        .masthead {
            background: #e74c3c;
            box-shadow: 3px 3px 8px hsl(0, 0%, 70%);
        }

        .site-title {
            margin: 0 0 1em;
            padding: 1em 0;
            font-size: 2em;
            font-weight: 300;
            text-align: center;
            color: black;
        }

        @media screen and (min-width: 44.44em) {
            .site-title {
                padding-top: 50px;
                font-size: 2em;
            }
        }

        @media screen and (min-width: 100em) {
            .site-title {
              padding-top: 50px;
                font-size: 2.5em;
            }
        }

        .site-title a {
            color: hsl(5, 45%, 95%);
            text-decoration: none;
        }

        .site-title a:hover {
            text-decoration: underline;
        }

        /* Card Based Layout - Base styles */
        body {
          background: #333333;
          line-height: 1.4;
        }

        .site-title {
          color: white;
        }

        .card {
          background: grey;
          margin-bottom: 2em;


        }

        .card a {
          color: white;
          text-decoration: none;
        }

        .card a:hover {
          box-shadow: 3px 3px 8px hsl(0, 0%, 70%);
        }

        .card-content {
          padding: 1.4em;
        }

        .card-content h2 {
          margin-top: 0;
          margin-bottom: .5em;
          font-weight: normal;
          color: white;

        }

        .card-content p {
          font-size: 95%;
        }

        img {
          width: 100%;
          height: auto;
        }
        /* Flexbox styles */
        @media screen and (min-width: 40em) {
          .cards {
            padding-top: 50px;
            margin-top: -1em;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
          }

          .card {
            margin-bottom: 1em;
            display: flex;
            flex: 0 1 calc(25% - 0.5em);
            width: calc(25% - 1em);
          }
        } /* mq 40em*/

        @media screen and (min-width: 60em) {
          .cards {
            padding-top: 50px;
            margin-top: inherit;
          }

          .card {
            margin-bottom: 2em;
            display: flex;
            flex: 0 1 calc(33% - 0.5em);
            /* width: calc(33% - 1em); */
          }
        } /* mq 60em*/
      </style>
    </html>
