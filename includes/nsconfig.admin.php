<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("us-cdbr-iron-east-01.cleardb.net", "baac30b8c10ebe", "347a5eea", "heroku_3550e03eba1161b");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Escape user inputs for security
$show_name = mysqli_real_escape_string($link, $_REQUEST['show_name']);
$show_desc = mysqli_real_escape_string($link, $_REQUEST['show_desc']);
$show_status = mysqli_real_escape_string($link, $_REQUEST['show_status']);
$show_url = mysqli_real_escape_string($link, $_REQUEST['show_url']);
$show_insta = mysqli_real_escape_string($link, $_REQUEST['show_insta']);
$show_facebook = mysqli_real_escape_string($link, $_REQUEST['show_facebook']);
$show_twitter= mysqli_real_escape_string($link, $_REQUEST['show_twitter']);
$show_img= mysqli_real_escape_string($link, $_REQUEST['show_img']);

  $show_status = $_POST['showstatusdropdown'];
// attempt insert query execution
$sql = "INSERT INTO `mpr_show` (show_name, show_desc, show_status, show_url, show_insta, show_facebook, show_twitter, show_img) VALUES ('$show_name', '$show_desc', '$show_status', '$show_url','$show_insta','$show_facebook','$show_twitter','$show_img')";


if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// close connection
mysqli_close($link);
?>


<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<body>

<button onclick="history.go(-1);">Back </button>

</body>
</html>
