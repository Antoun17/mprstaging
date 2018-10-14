<?php

$link = mysqli_connect("us-cdbr-iron-east-01.cleardb.net", "baac30b8c10ebe", "347a5eea", "heroku_3550e03eba1161b");


if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "UPDATE mpr_media t1, mpr_episode t2 SET t1.episode_id = t2.episode_id WHERE t1.media_url = t2.episode_url";

if(mysqli_query($link, $sql)){
    echo "Sync Complete";
} else{
    echo "ERROR: Could not execute $sql. " . mysqli_error($link);
}

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
