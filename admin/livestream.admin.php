<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">

<title>Media Assign Form</title>
<script src="/node_modules/jquery/dist/jquery.js"></script>
<link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>

<body>

<div class="container w-50 p-3" style="padding-top: 75px; background-color: #eee;">


  <h1>Restream Form</h1>


  <form action="/includes/lstream.admin.php" method="post">


    <?php

    $nconn = mysqli_connect("us-cdbr-iron-east-01.cleardb.net", "baac30b8c10ebe", "347a5eea", "heroku_3550e03eba1161b");

    if (!$nconn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sqlep = "SELECT * FROM `mpr_episode`";


    $result = mysqli_query($nconn, $sqlep); ?>

    <?php mysqli_close($conn); ?>

    <div class="dropdown"style="background-color: #eee; padding-top: 30px; padding-bottom: 30px;">
      <label>Video Select</label>
      <select name="episodeurl" id="episodeurl" onchange="setStreamSource()">

      <option> <?php echo 'https://livestream.com/accounts/25937168/events/7713617/player?width=640&height=360&enableInfoAndActivity=true&defaultDrawer=&autoPlay=true&mute=false' ?>

      <?php foreach ($result as $row):?>
      <option label="<?php echo $row['episode_title']?>"> <?php echo 'https://livestream.com/accounts/25937168/events/7713617/videos/' . 'player?width=640&height=360&enableInfoAndActivity=true&defaultDrawer=&autoPlay=true&mute=false';?></option>
      <?php endforeach;?>
      </select>
    </div>

    <div class="livestream">
    <iframe style="width: 845px;; height: 550px;" id="myStream" allowfullscreen="true" class="embed-responsive-item" src="" ></iframe>
    </div>
    <script>
    function setStreamSource() {
     var theSelect = document.getElementById('episodeurl');
     var theVideo = document.getElementById('myStream');
     var theUrl;

     theUrl = theSelect.options[theSelect.selectedIndex].value;
     theVideo.src = theUrl;
    }
    </script>

    <div class="form-group w-25 p-3"style="background-color: #eee;">
      <select name="livestreamstatus">
      <option value="LIVE">LIVE</option>
      <option value="RESTREAM">RESTREAM</option>
    </select>
    </div>


<div class="submitbuttons" style="padding-top: 30px;">
  <button type="submit" class="btn btn-primary">Submit</button>
  <button type="reset" class="btn btn-primary value=Reset">Reset</button>
</div>
</form>

</div>
</body>
</html>
