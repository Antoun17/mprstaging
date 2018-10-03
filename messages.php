<?php
require __DIR__ . '/vendor/autoload.php';
// Change the following with your app details:
// Create your own pusher account @ https://app.pusher.com
$options = array(
   'cluster' => 'mt1',
   'encrypted' => true
 );
 $pusher = new Pusher\Pusher(
   '625925458b678e882996',
   '7542783946b168ea8f60',
   '613118',
   $options
 );
// Check the receive message
if(isset($_POST['message']) && !empty($_POST['message'])) {
  $data = $_POST['message'];
// Return the received message
if($pusher->trigger('my-channel', 'my-event', $data)) {
echo 'success';
} else {
echo 'error';
}
}
}
