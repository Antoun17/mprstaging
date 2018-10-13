<?php

$link = mysqli_connect("us-cdbr-iron-east-01.cleardb.net", "baac30b8c10ebe", "347a5eea", "heroku_3550e03eba1161b");


if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$random = rand(0,100000);

$sql = "UPDATE mpr_media SET t1.media_id = $random";

if(mysqli_query($link, $sql)){
    echo "Updated Inventory.";
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
