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
            <div class="row">
                <div class="col-sm-3">



<?php

            $sql = "SELECT `show_name`, `show_id`, `show_status`, `show_desc`,`show_url`,`show_insta`,`show_facebook`, `show_img` FROM `mpr_show` WHERE `show_status` = 'ACTIVE'";
            $result = mysqli_query($conn, $sql);
            ?>



             <?php foreach ($result as $row):?>

             <div class="card">
               <a href="shows.php?show_id=<?php echo $row['show_id']; ?>">
                 <figure class="thumbnail">
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
             <!-- .card -->
           <?php endforeach;

                         mysqli_close($conn);
           ?>


              <!-- .card -->

            </div>
          </div>
        </div>
            <!-- .cards -->
  </main>
  </body>


      <style>

      .row {
   display: flex;
   flex-wrap: wrap;
      }



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
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    </html>
