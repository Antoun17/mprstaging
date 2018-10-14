<?php

$link = mysqli_connect("us-cdbr-iron-east-01.cleardb.net", "baac30b8c10ebe", "347a5eea", "heroku_3550e03eba1161b");


if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Escape user inputs for security
$live_url = mysqli_real_escape_string($link, $_REQUEST['live_url']);
$stream_status = mysqli_real_escape_string($link, $_REQUEST['stream_status']);

$stream_status = $_POST['livestreamstatus'];

$live_url = $_POST['episodeurl'];


$sql = "INSERT INTO `mpr_live` (live_url, stream_status) VALUES ('$live_url', '$stream_status')";

if(mysqli_query($link, $sql)){
    echo "Stream Updated!";
} else{
    echo "ERROR: Could not execute $sql. " . mysqli_error($link);
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
