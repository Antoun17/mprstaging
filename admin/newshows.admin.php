<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<title>Google Calendar Form</title>
</head>
<body>
<div class="container w-50 p-3" style="padding-top: 75px; background-color: #eee;">

<h1>New Show Form</h1>

<?php
  // Create connection
  $conn = mysqli_connect("us-cdbr-iron-east-01.cleardb.net", "baac30b8c10ebe", "347a5eea", "heroku_3550e03eba1161b");
  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }

  $sql = "SELECT * FROM `mpr_show`";
  $result = mysqli_query($conn, $sql);
  mysqli_close($conn);
  ?>

<form action="/includes/nsconfig.admin.php" method="post">
  <div class="form-group w-50 p-3"style="background-color: #eee;">
    <label for="eventStartDate">Show Name</label>
    <input type="text" name="show_name">
  </div>
  <div class="form-group w-50 p-3"style="background-color: #eee;">
    <label for="eventEndDate">Show Description</label>
    <textarea name="show_desc"rows="4" cols="50">

    </textarea>
  </div>

  <div class="form-group w-25 p-3"style="background-color: #eee;">
    <select name="showstatusdropdown">
    <option value="INACTIVE">INACTIVE</option>
    <option value="ACTIVE">ACTIVE</option>
  </select>
  </div>

  <div class="form-group w-50 p-3"style="background-color: #eee;">
    <label for="eventEndDate">Show Image Url</label>
    <textarea name="show_img" rows="4" cols="50">

    </textarea>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
  <button type="reset" class="btn btn-primary value=Reset">Reset</button>

</form>

</div>
</body>
</html>
