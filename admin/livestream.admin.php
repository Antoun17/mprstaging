<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">

<title>Media Assign Form</title>
<script src="/node_modules/jquery/dist/jquery.js"></script>
<link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>

<body>


  <?php include("/includes/nav.inc.php"); ?>


<div class="container w-50 p-3" style="padding-top: 75px; background-color: #eee;">


  <h1>Media Assign Form</h1>


  <form action="/includes/mconfig.inc.php" method="post">


    <?php

    $nconn = mysqli_connect("us-cdbr-iron-east-01.cleardb.net", "baac30b8c10ebe", "347a5eea", "heroku_3550e03eba1161b");

    if (!$nconn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sqlep = "SELECT * FROM `mpr_episode` LIMIT 10";


    $result = mysqli_query($nconn, $sqlep); ?>

    <?php mysqli_close($conn); ?>


    <div class="dropdown"style="background-color: #eee; padding-top: 30px; padding-bottom: 30px;">
      <label>Video Select</label>
      <select name="episodeurl" id="episodeurl" onchange="setVideoSource()">
      <?php foreach ($result as $row):?>
      <option><?php echo $row['episode_url'];?></option>
      <?php endforeach;?>
      </select>
    </div>




    <video id="myVideo" width="100%" src="#" controls></video>


    <script>
    function setVideoSource() {
     var theSelect = document.getElementById('episodeurl');
     var theVideo = document.getElementById('myVideo');
     var theUrl;

     theUrl = theSelect.options[theSelect.selectedIndex].value;
     theVideo.src = 'https://livestream.com/accounts/25937168/events/7713617/videos/' + theUrl;
    }
    </script>

    <?php
      // Create connection
      $conn = mysqli_connect("us-cdbr-iron-east-01.cleardb.net", "baac30b8c10ebe", "347a5eea", "heroku_3550e03eba1161b");
      // Check connection
      if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
      }

    $sql = "SELECT `show_name`, `show_id` FROM `mpr_show`";

      $result = mysqli_query($conn, $sql);
      mysqli_close($conn);
      ?>

    <div class="form-group w-50 p-3" style="background-color: #eee; padding-top: 20px; padding-bottom: 40px;" >
      <label>Episode Date</label>
      <input type="date" class="form-control" name="episode_date">


      <div class="dropdown"style="background-color: #eee; padding-top: 30px; padding-bottom: 30px;">
        <label>Show Name</label>
        <select name="task">
        <?php foreach ($result as $row):?>
        <option value="<?php echo $row['show_id'] . "|" . $row['show_name'];?>"><?php echo $row['show_name'];?></option>
        <?php endforeach;?>
        </select>
      </div>

  <div class="form-group w-50 p-3"style="background-color: #eee;">
    <label>Episode Title</label>
    <input type="text" name="episode_title">
  </div>

  <div class="form-group w-50 p-3 "style="background-color: #eee;">
    <label for="description">Episode Description</label>
    <textarea name="episode_description" rows="10" cols="40"> </textarea>
  </div>

  <div class="form-group w-25 p-3"style="background-color: #eee;">
    <select name="showstatusdropdown">
    <option value="INACTIVE">INACTIVE</option>
    <option value="ACTIVE">ACTIVE</option>
  </select>
  </div>

<div class="submitbuttons" style="padding-top: 30px;">
  <button type="submit" class="btn btn-primary">Submit</button>
  <button type="reset" class="btn btn-primary value=Reset">Reset</button>
</div>

</form>

<form class="" action="/includes/msync.admin.php" method="post">
  <div class="submitbuttons" style="padding-top: 30px;">
    <button type="submit" class="btn btn-primary">Sync</button>
  </div>
</form>

</div>
</body>
</html>
