<?php

$link = mysqli_connect("localhost", "admin", "mprnyc1", "drupal");


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

$ulink = mysqli_connect("localhost", "admin", "mprnyc1", "drupal");

$select = "SELECT `episode_id` FROM `mpr_episode` LIMIT 1";


if($ulink === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$usql = "UPDATE `mpr_media` SET episode_id='$episode_id'";

if(mysqli_query($ulink, $usql)){
    echo "Records updated successfully.";
} else{
    echo "ERROR: Could not execute $usql. " . mysqli_error($link);
}

// close connection
mysqli_close($ulink);



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