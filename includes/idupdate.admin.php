<?php

$link = mysqli_connect("us-cdbr-iron-east-01.cleardb.net", "baac30b8c10ebe", "347a5eea", "heroku_3550e03eba1161b");


if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "UPDATE mpr_media t1, mpr_episode t2 SET t1.media_id = t2.episode_id WHERE t1.media_status = t2.episode_status";

if(mysqli_query($link, $sql)){
    echo "Updated Inventory.";
} else{
    echo "ERROR: Could not execute $sql. " . mysqli_error($link);
}

mysqli_close($link);

?>
