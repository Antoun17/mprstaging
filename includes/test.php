<?php

$link = mysqli_connect("us-cdbr-iron-east-01.cleardb.net", "baac30b8c10ebe", "347a5eea", "heroku_3550e03eba1161b");


if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Escape user inputs for security
$vidsrc = mysqli_real_escape_string($link, $_REQUEST['vidsrc']);

$media_url = $vidsrc;

$sql = "SELECT FROM `mpr_media` (media_url ) VALUES ('$media_url')";

if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not execute $sql. " . mysqli_error($link);
}

// close connection
mysqli_close($link);
?>
