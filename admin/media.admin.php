<!DOCTYPE html>
<html lang="en">
<head>

//Drop down with show_name
//text box for ep title
//text box for ep desc
//date box for ep date
//text box for livestream id

//insert into ep table --> get primary key for record --> primay key = ep id
// update ep id in media table with primary key


<meta charset="UTF-8">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<title>Media Assign Form</title>
</head>
<body>

  <?php include("includes/nav.inc.php"); ?>


<div class="container w-50 p-3" style="padding-top: 75px; background-color: #eee;">


  <h1>Media Assign Form</h1>

<?php

$nconn = mysqli_connect("us-cdbr-iron-east-01.cleardb.net", "baac30b8c10ebe", "347a5eea", "heroku_3550e03eba1161b");

if (!$nconn) {
    die("Connection failed: " . mysqli_connect_error());
}
$vidsrc = mysqli_real_escape_string($nconn, $_POST['$vidsrc']);
$sqlep = "SELECT * FROM `mpr_media` where episode_id = 0 and media_type = 'video' ORDER BY media_id";


$result = mysqli_query($nconn, $sqlep); ?>

<form action="/includes/test.php" method="POST">
<div class="dropdown"style="background-color: #eee; padding-top: 30px; padding-bottom: 30px;">
  <label>Show Name</label>
  <select name="vidsrc">
  <?php foreach ($result as $row):?>
  <option value="<?php echo $media_url = $row["media_url"];?>"</option>
  <?php endforeach;?>
  </select>
</div>
</form>

<?php mysqli_close($conn); ?>

<video width="100%" src="<?php echo "http://d1uox2u1zwzv0e.cloudfront.net/" . $media_url; ?>" controls>



  <p>Your browser doesn't support HTML5 video. Here is a <a href="rabbit320.webm">link to the video</a> instead.</p>
  </video>

  <?php
    // Create connection
    $conn = mysqli_connect("us-cdbr-iron-east-01.cleardb.net", "baac30b8c10ebe", "347a5eea", "heroku_3550e03eba1161b");
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT `media_url` FROM `mpr_media`";

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    ?>

  <form action="/includes/meconfig.inc.php" method="post">

    <div class="form-group w-50 p-3" style="background-color: #eee; padding-top: 20px; padding-bottom: 40px;" >
      <label>Episode Date</label>
      <input type="date" class="form-control" name="episode_date">


   <div class="dropdown"style="background-color: #eee; padding-top: 30px; padding-bottom: 30px;">
     <label>Show Name</label>
     <select name="task">
     <?php foreach ($result as $row):?>
     <option><?php echo $row['media_url'];?></option>
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

</div>
</body>
</html>
