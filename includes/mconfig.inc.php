<?php

$link = mysqli_connect("us-cdbr-iron-east-01.cleardb.net", "baac30b8c10ebe", "347a5eea", "heroku_3550e03eba1161b");


if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Escape user inputs for security
$episode_title = mysqli_real_escape_string($link, $_REQUEST['episode_title']);
$task = mysqli_real_escape_string($link, $_REQUEST['task']);
$episode_description = mysqli_real_escape_string($link, $_REQUEST['episode_description']);
$show_id = mysqli_real_escape_string($link, $_REQUEST['show_id']);
$episode_date = mysqli_real_escape_string($link, $_REQUEST['episode_date']);
$episode_id = mysqli_real_escape_string($link, $_REQUEST['episode_id']);
$episode_status = mysqli_real_escape_string($link, $_REQUEST['episode_status']);

$episode_status = $_POST['showstatusdropdown'];

$arr = explode('|',$task);

$show_id = $arr[0];

//$episode_title = $arr[1];

// attempt insert query execution

$sql = "INSERT INTO `mpr_episode` (episode_title, episode_description, show_id, episode_date, episode_id, episode_status) VALUES ('$episode_title', '$episode_description', '$show_id', '$episode_date','$episode_id','$episode_status')";

if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not execute $sql. " . mysqli_error($link);
}

// close connection
mysqli_close($link);
?>

<?php

$sql = "UPDATE inventory t1, distribution t2 SET t1.status = t2.status WHERE t1.serial_number = t2.serial_number";

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
